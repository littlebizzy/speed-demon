<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Inline_Styles\Styles;

/**
 * Relative class
 *
 * @package Speed Demon / Inline Styles
 * @subpackage Styles
 */
class Relative {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Base URL
	 */
	private $base;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($base) {
		$this->base = $base;
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Convert URLs to absolute
	 */
	public function absolute($content) {
		$result = preg_replace_callback('/url\((.*?)\)/i', [$this, 'replace'], $content);
		return empty($result)? $content : $result;
	}



	/**
	 * Matched strings
	 */
	public function replace($matches) {
		return 'url("'.$this->convert($matches[1]).'")';
	}



	// Internal
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Convert relative to absolute URLs
	 *
	 * Inspired by this code:
	 * http://www.gambit.ph/converting-relative-urls-to-absolute-urls-in-php/
	 */
	private function convert($rel) {

		// Triming
		$rel = trim($rel);
		$rel = trim($rel, "'");
		$rel = trim($rel, '"');
		$rel = trim($rel);

		// Base URL components
		$base = @parse_url($this->base);
		if (empty($base) || !is_array($base))
			return $rel;

		// Base vars: $scheme, $host, $path
		extract($base);

		// Relative URL
		if (0 === strpos($rel,"//"))
			return $scheme . ':' . $rel;

		// Check if already is an absolute URL
		$result = @parse_url($rel, PHP_URL_SCHEME);
		if (!empty($result))
			return $rel;

		// Queries and anchors
		if ('#' == $rel[0] || '?' == $rel[0])
			return $this->base.$rel;

		// Remove non-directory element from path
		$path = preg_replace('#/[^/]*$#', '', $path);

		// Destroy path if relative url points to root
		if ('/' == $rel[0])
			$path = '';

		// First absolute URL
		$abs = $host.$path. '/'.$rel;

		// Replace '//' or  '/./' or '/foo/../' with '/'
		$abs = preg_replace("/(\/\.?\/)/", "/", $abs);
		$abs = preg_replace("/\/(?!\.\.)[^\/]+\/\.\.\//", "/", $abs);

		// Absolute URL is ready!
		return $scheme.'://'.$abs;
	}



}