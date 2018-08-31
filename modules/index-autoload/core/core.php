<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Index_Autoload\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Index Autoload
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo-constructor
	 */
	protected function onConstruct() {
		$this->init();
		$this->hooks();
		$this->cron();
	}



	/**
	 * Initialization
	 */
	private function init() {

		// Create module factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Create registrar object and set hooks handler
		$this->plugin->factory->registrar->setHandler($this);
	}



	/**
	 * Hookable actions
	 */
	private function hooks() {

		// Declare action to be fired from the cron hook
		add_action('idxald_index_check', [$this, 'check']);
	}



	/**
	 * Check cron event
	 */
	private function cron() {

		// Check timestamp
		$timestamp = (int) get_option('idxald_timestamp');
		if (empty($timestamp) || (time() - $timestamp) > 86400) {

			// Clean old plugin data
			if (empty($timestamp)) {
				delete_option('index_autoload_active');
				wp_clear_scheduled_hook('index_autoload_cron');
			}

			// Updates timestamp
			update_option('idxald_timestamp', time(), true);

			// Check schedule
			if (false === wp_next_scheduled('idxald_index_check'))
				wp_schedule_single_event(time() + 30, 'idxald_index_check');
		}
	}



	/**
	 * Calls the Alter object check method
	 */
	public function check() {
		$this->plugin->factory->alter->check();
	}



	/**
	 * Remove cron action hook on plugin deactivation
	 */
	public function onDeactivation() {
		wp_clear_scheduled_hook('idxald_index_check');
	}



	/**
	 * Removes the index on uninstall and also
	 * deletes the timestamp option record
	 */
	public static function onUninstall() {

		// Remove the index
		Alter::instance()->remove();

		// Removes option and cron hook
		delete_option('idxald_timestamp');
		wp_clear_scheduled_hook('idxald_index_check');
	}



}