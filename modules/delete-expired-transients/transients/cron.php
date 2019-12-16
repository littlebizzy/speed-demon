<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Delete_Expired_Transients\Transients;

/**
 * Cron class
 *
 * @package Speed Demon / Delete Expired Transients
 * @subpackage Transients
 */
class Cron {



	// Constants
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Hours period
	 */
	const HOURS = 6;



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin factory object
	 */
	private $factory;



	/**
	 * Plugin info object
	 */
	private $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($factory, $plugin) {

		// Plugin properties
		$this->factory = $factory;
		$this->plugin = $plugin;

		// Cron actions
		$this->initialize();
	}



	/**
	 * Start cron checks
	 */
	private function initialize() {

		// Schedules filter
		add_filter('cron_schedules', [$this, 'schedules']);

// Debug
//$this->onSchedule();return;

		// Generation check
		if (!wp_next_scheduled($this->plugin->prefix.'_clean'))
			wp_schedule_event(time(), $this->plugin->prefix.'_interval', $this->plugin->prefix.'_clean');

		// Generation hook
		add_action($this->plugin->prefix.'_clean', [$this, 'onSchedule']);
	}



	// WP Hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Add custom schedule
	 */
	public function schedules($schedules) {

		// Define period
		$hours = defined('DELETE_EXPIRED_TRANSIENTS_HOURS')? (int) DELETE_EXPIRED_TRANSIENTS_HOURS : self::HOURS;

		// Check custom period
		if (!empty($hours)) {
			$schedules[$this->plugin->prefix.'_interval'] = [
				'interval' => $hours * HOUR_IN_SECONDS,
				'display'  => __('Delete Expired Transients in '.$hours.' hours'),
			];
		}

		// Done
		return $schedules;
	}



	/**
	 * Start the clean procedure
	 */
	public function onSchedule() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Check external object cache
		if (wp_using_ext_object_cache())
			return;

		// Remove expired transients
		$this->factory->transients->cleanExpired();
	}



}