<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory base class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Factory {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin object
	 */
	protected $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($plugin) {
		$this->plugin = $plugin;
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Magic GET method
	 */
	public function __get($name) {
		$method = 'create'.ucfirst($name);
		return method_exists($this, $method)? $this->{$method}() : null;
	}



	/**
	 * Magic CALL method
	 */
	public function __call($name, $args = null) {
		$method = 'create'.ucfirst($name);
		$args = (!empty($args) && is_array($args))? $args[0] : null;
		return method_exists($this, $method)? $this->{$method}($args) : null;
	}



}