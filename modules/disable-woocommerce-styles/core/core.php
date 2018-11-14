<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_WooCommerce_Styles\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable WooCommerce Styles
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Works only in the front-end
		if (is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) {
			return;
		}

		// Factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Handles WP Print Styles hook
		add_action('wp_print_styles', [$this, 'onWPPrintStyles'], PHP_INT_MAX);
	}



	/**
	 * WP Print Styles setup hook
	 */
	public function onWPPrintStyles() {

		// Check module already enabled
		if ($this->plugin->enabled()) {

			// Filter styles
			$this->plugin->factory->filter();
		}
	}



}