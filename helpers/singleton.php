<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Singleton class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
abstract class Singleton {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin object
	 */
	protected $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	final public static function instance($plugin = null) {

		// Local instance
		static $instance = null;

		// Check instance
		if (!isset($instance))
			$instance = new static($plugin);

		// Done
		return $instance;
	}



	/**
	 * Constructor
	 */
	protected function __construct($plugin) {

		// Copy plugin object
		$this->plugin = $plugin;

		// Custom constructor
		$this->onConstruct();
	}



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {}



	/**
	 * Disallow clone use and overwriting
	 */
	final private function __clone() {}



}