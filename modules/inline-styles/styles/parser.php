<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Inline_Styles\Styles;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Parser class
 *
 * @package Speed Demon / Inline Styles
 * @subpackage Styles
 */
class Parser extends Helpers\Singleton {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Enabled mode
	 */
	private $enabled = false;



	/**
	 * Allowed URL's
	 */
	private $allowed;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		/* Check context */

		// Admin
		if (is_admin())
			return;

		// CRON
		if (defined('DOING_CRON') && DOING_CRON)
			return;

		// XML-RPC request
		if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST)
			return;

		// Command line
		if ((defined('WP_CLI') && WP_CLI) ||
			(defined('PHPUNIT_TEST') && PHPUNIT_TEST) ||
			'cli' == @php_sapi_name())
			return;

		// Done
		$this->enabled = true;
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Init output buffering
	 */
	public function start() {

		// Check mode
		if (!$this->enabled)
			return;

		// Buffering
		ob_start([$this, 'output']);
	}



	/**
	 * Handles the output buffer
	 */
	public function output($buffer) {

		// Allowed stylesheet src's
		$this->allowed = $this->plugin->factory->inline->allowed();

		// Check every stylesheet link
		$buffer = preg_replace_callback('/<link[^>]*(rel[\s|\t]*=[\s|\t]*[\'"]stylesheet[\'"]|type[\s|\t]*=[\s|\t]*[\'"]text\/css[\'"])[^>]*>/is', [$this, 'replace'], $buffer);

		// Done
		return $buffer;
	}



	/**
	 * Check and remove unallowed stylesheets
	 */
	public function replace($matches) {

		// Init
		$approved = true;

		// Entire link
		$link = $matches[0];

		// Check href
		if (!preg_match('/[\s|\t]+href[\s|\t]*=[\s|\t]*[\'"](.*?)[\'"]/is', $link, $url)) {
			$approved = false;

		// With URL
		} else {

			// Decode URL
			$url = $url[1];
			$url = str_replace('&#038;', '&', $url);
			$url = str_replace('&#039;', "'", $url);

			// Check URL
			if (empty($url)) {
				$approved = false;

			// Check allowed URL's
			} elseif (!in_array($url, $this->allowed)) {

				// Abort unallowed wp-content URL's
				if (false !== stripos($url, '/wp-content/'))
					$approved = false;
			}
		}

		// Done
		return $approved? $link : '';
	}



}