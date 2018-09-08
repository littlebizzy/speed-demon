<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_jQuery_Migrate\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable jQuery Migrate
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo-constructor
	 */
	protected function onConstruct() {

		// Exit if the context is not the frontend area
		if ( is_admin() ||
			(defined('DOING_CRON') && DOING_CRON) ||
			(defined('DOING_AJAX') && DOING_AJAX) ||
			(defined('XMLRPC_REQUEST') && XMLRPC_REQUEST)) {
			return;
		}

		// Scripts loader hook
		add_action('wp_default_scripts', [$this, 'defaultScripts']);
	}



	/**
	 * Default scripts hook
	 */
	public function defaultScripts(&$scripts) {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Check the jQuery registry
		if (!isset($scripts->registered['jquery'])) {
			return;
		}

		// Check dependencies and if jQuery Migrate exists
		$script = $scripts->registered['jquery'];
		if (empty($script->deps) || !is_array($script->deps) || !in_array('jquery-migrate', $script->deps)) {
			return;
		}

		// Remove jQuery Migrate dependency
		$scripts->registered['jquery']->deps = array_diff($script->deps, ['jquery-migrate']);
	}



}