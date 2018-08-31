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

		// Create module factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Module initialization
		add_action('init', [$this, 'init']);

		// Declare action to be fired from the cron hook
		add_action('idxald_index_check', [$this, 'check']);

		// Cron check
		$this->cron();
	}



	/**
	 * WP init hook
	 */
	public function init() {

		// Create registrar object and set hooks handler
		$this->plugin->factory->registrar->setHandler($this);
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
	public function onUninstall() {

		// Remove the index
		$this->plugin->factory->alter->remove();

		// Removes option and cron hook
		delete_option('idxald_timestamp');
		wp_clear_scheduled_hook('idxald_index_check');
	}



}