<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Plugin class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Plugin {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Basic plugin data
	 */
	private $file;
	private $root;
	private $prefix;
	private $version;
	private $packageNamespace;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Set basic plugin data
	 */
	public function __construct() {

		// Vendor path
		$namespace = explode('\\', __NAMESPACE__);
		$this->packageNamespace = '\\'.implode('\\', array_slice($namespace, 0, 2)).'\\';

		// Set data
		$this->file 	= constant($this->packageNamespace.'FILE');
		$this->root 	= dirname($this->file);
		$this->prefix 	= constant($this->packageNamespace.'PREFIX');
		$this->version 	= constant($this->packageNamespace.'VERSION');
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Magic GET method
	 */
	public function __get($name) {
		return $this->$name;
	}



}