<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_WooCommerce_Status\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable WooCommerce Status
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Handles WP dashboard setup hook
		add_action('wp_dashboard_setup', [$this, 'onWPDashboardSetup']);
	}



	/**
	 * WP dashboard setup hook
	 */
	public function onWPDashboardSetup() {

		// Check module already enabled
		if ($this->plugin->enabled()) {

			// Removes WC dashboard status metabox
			remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal');
		}
	}



}