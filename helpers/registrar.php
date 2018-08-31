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



	/**
	 * Plugin object
	 */
	private $plugin;



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

		// Check activation support
		if (method_exists($handler, 'onActivation'))
			register_activation_hook($this->plugin->file, [$handler, 'onActivation']);

		// Check deactivation support
		if (method_exists($handler, 'onDeactivation'))
			register_deactivation_hook($this->plugin->file, [$handler, 'onDeactivation']);

		// Check uninstall support
		if (method_exists($handler, 'onUninstall')) {
			register_uninstall_hook($this->plugin->file, ['\\'.get_class($handler), 'onUninstall']);
		}
	}



}