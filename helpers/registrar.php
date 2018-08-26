<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Registrar class
 *
 * To create an instance of this class, you need to add
 * this function in your custom factory class:
 *
 * 	protected function createRegistrar() {
 *		 return new Helpers\Registrar($this->plugin);
 * 	}
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Registrar {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin object
	 */
	private $plugin;



	/**
	 * Handler object
	 */
	private $handler;



	/**
	 * Temp instance
	 */
	private static $instance;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($plugin) {
		$this->plugin = $plugin;
	}



	/**
	 * Set the plugin hooks handler
	 */
	public function setHandler($handler) {

		// Set object
		$this->handler = $handler;

		// Check activation support
		if (method_exists($this->handler, 'onActivation'))
			register_activation_hook($this->plugin->file, array($this->handler, 'onActivation'));

		// Check deactivation support
		if (method_exists($this->handler, 'onDeactivation'))
			register_deactivation_hook($this->plugin->file, array($this->handler, 'onDeactivation'));

		// Check uninstall support, points to a local static method
		if (method_exists($this->handler, 'onUninstall')) {
			self::$instance = $this;
			register_uninstall_hook($this->plugin->file, array('\\'.__CLASS__, 'onUninstall'));
		}
	}



	// WP Hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin uninstall wrapper
	 */
	public static function onUninstall() {
		self::$instance->handler->onUninstall();
	}



}