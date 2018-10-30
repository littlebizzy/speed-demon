<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Minify_Html\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Minify HTML
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Check context
		if ($this->front()) {

			// Factory object
			$this->plugin->factory = new Factory($this->plugin);

			// WP loaded hook
			add_action('wp_loaded', [$this, 'loaded'], PHP_INT_MAX);
		}
	}



	/**
	 * Check options in order to start buffering
	 */
	public function loaded() {
		$options = $this->plugin->factory->options;
		if ($options->minify()) {
			$this->plugin->factory->buffer->start($options->args());
		}
	}



	/**
	 * Check front context
	 */
	private function front() {

		// Admin
		if (is_admin()) {
			return false;
		}

		// Installing processes
		if (defined('WP_INSTALLING') && WP_INSTALLING) {
			return false;
		}

		// Avoid CRON requests
		if (defined('DOING_CRON') && DOING_CRON) {
			return false;
		}

		// XML-RPC request
		if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) {
			return false;
		}

		// No WP-Cli allowed
		if (defined('WP_CLI') && WP_CLI) {
			return false;
		}

		// Login page
		global $pagenow;
		if (!empty($pagenow) && 'wp-login.php' == $pagenow) {
			return false;
		}

		// Allow
		return true;
	}



}