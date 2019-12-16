<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Minify_Html\Core;

/**
 * Options class
 *
 * @package Speed Demon / Minify HTML
 * @subpackage Core
 */
class Options {



	/**
	 * Parsing arguments
	 */
	private $args;



	/**
	 * Minify decision
	 */
	private $minify;



	/**
	 * Initializing
	 */
	public function __construct() {

		/**
		 * Decides if enable plugin functionality
		 * Enabled by default, can be deactivated via constant
		 */
		$this->args['enabled'] = !defined('MINIFY_HTML') || MINIFY_HTML;

		/**
		 * Decides if replace extra spaces in HTML and espaces between tags (except in styles, javascript code, and the content of textarea and pre tags)
		 * Enabled by default, can be deactivated via constant
		 */
		$this->args['spacing'] = !defined('MINIFY_HTML_REMOVE_EXTRA_SPACING') || MINIFY_HTML_REMOVE_EXTRA_SPACING;

		/**
		 * Decides if remove line breaks in HTML (except in styles, javascript code, and the content of textarea and pre tags)
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['lineBreaks'] = !defined('MINIFY_HTML_REMOVE_LINE_BREAKS') || MINIFY_HTML_REMOVE_LINE_BREAKS;

		/**
		 * Defines the regexp pattern modifiers for proper UTF8 support
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['utf8Support'] = !defined('MINIFY_HTML_UTF8_SUPPORT') || MINIFY_HTML_UTF8_SUPPORT;

		/**
		 * Decides if remove HTML comments (including HTML comments inside the pre tag but leaving the textarea comments)
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['comments'] = !defined('MINIFY_HTML_REMOVE_COMMENTS') || MINIFY_HTML_REMOVE_COMMENTS;

		/**
		 * Decides if minify inline styles between <style></style> tags removing extra espaces and line breaks
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['styles'] = !defined('MINIFY_HTML_INLINE_STYLES') || MINIFY_HTML_INLINE_STYLES;

		/**
		 * Decides if remove inline styles comments
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['stylesComments'] = !defined('MINIFY_HTML_INLINE_STYLES_COMMENTS') || MINIFY_HTML_INLINE_STYLES_COMMENTS;

		/**
		 * Decides if minify inline scripts between <script></script> tags, removing extra espaces and line breaks
		 * Disabled by default, it can be enabled via constant
		 */
		$this->args['scripts'] = defined('MINIFY_HTML_INLINE_SCRIPTS') && MINIFY_HTML_INLINE_SCRIPTS;

		/**
		 * Decides if remove inline scripts comments
		 * Disabled by default, it can be enabled via constant
		 */
		$this->args['scriptsComments'] = defined('MINIFY_HTML_INLINE_SCRIPTS_COMMENTS') && MINIFY_HTML_INLINE_SCRIPTS_COMMENTS;

		/**
		 * Decides if remove conditional tags like
		 * <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
		 * Enabled by default, it can be deactivated via constant
		 */
		$this->args['conditionals'] = !defined('MINIFY_HTML_REMOVE_CONDITIONALS') || MINIFY_HTML_REMOVE_CONDITIONALS;

		/**
		 * Decides if removes self-closing markup for HTML5 documents
		 * Disabled by default, it can be enabled via constant
		 */
		$this->args['selfClosing'] = defined('MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING') && MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING;

		// Minify or not decision
		$this->minify = $this->args['enabled'] && (
		 				$this->args['spacing'] || $this->args['lineBreaks'] || $this->args['comments'] ||
						$this->args['styles'] || $this->args['scripts'] || $this->args['conditionals'] || $this->args['selfClosing']);
	}



	/**
	 * Returns minify decision
	 */
	public function minify() {
		return $this->minify;
	}



	/**
	 * Retrieve parsing arguments
	 */
	public function args() {
		return $this->args;
	}



}