<?php

/**
 * DO NOT MODIFY THE CLASS CODE!
 * Just change the [PluginNamespace] value below
 * Define the settings in the ../config.php file
 */

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Notices;

/**
 * Admin Notices MultiSite class
 *
 * @package WordPress Plugin
 * @subpackage Admin Notices MultiSite
 */
final class Admin_Notices_MS {



	// Configuration
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Custom message
	 */
	private $message;



	// Internal properties (do not touch from here)
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Caller plugin file
	 */
	private $plugin_file;



	/**
	 * Single class instance
	 */
	private static $instance;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance($plugin_file = null) {

		// Avoid direct calls
		if (!function_exists('add_action'))
			die;

		// Single install
		if (!is_multisite())
			return false;

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self($plugin_file);

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct($plugin_file = null) {

		// Main plugin file
		$this->plugin_file = isset($plugin_file)? $plugin_file : __FILE__;

		// Admin notices both in admin and network admin
		add_action('admin_notices', [$this, 'adminNoticesMS']);
		add_action('network_admin_notices', [$this, 'adminNoticesMS']);
	}



	// WP Hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * The admin notice message
	 */
	public function adminNoticesMS() {

		// Check notice message
		if (!$this->config())
			return;

		// Collect plugin data
		$plugin_data = get_plugin_data($this->plugin_file);

		// Display notice
		?><div class="notice notice-error">

			<p><?php echo str_replace('%plugin%', $plugin_data['Name'], $this->message); ?></p>

		</div><?php
	}



	// Configuration
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Load configuration array
	 */
	private function config() {

		// Load configuration configuration file
		$config = @include dirname(dirname(__FILE__)).'/config.php';
		if (empty($config) || !is_array($config) ||	empty($config['admin-notices-ms']) || !is_array($config['admin-notices-ms']))
			return false;

		// Just the admin-notices-ms part
		$config = $config['admin-notices-ms'];

		// Check message value
		if (empty($config['message']))
			return false;

		// Set property
		$this->message = $config['message'];

		// Done
		return true;
	}



}