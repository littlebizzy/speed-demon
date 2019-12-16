<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Post_Via_Email\Core;

/**
 * Core class
 *
 * @package Speed Demon / Disable Post Via Email
 * @subpackage Core
 */
final class Core {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Single class instance
	 */
	private static $instance;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance($plugin = null) {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self($plugin);

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct($plugin) {

		/**
		 * Disable post via email using wp-load.php filter
		 */
		add_filter('enable_post_by_email_configuration', '__return_false', PHP_INT_MAX);
	}



}