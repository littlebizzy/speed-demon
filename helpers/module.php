<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Module {



	/**
	 * External object/key
	 */
	protected $key;
	protected $modules;



	/**
	 * Current module namespace
	 */
	protected $moduleNamespace;



	/**
	 * Constructor
	 */
	public function __construct($key, $modules) {

		// Set properties
		$this->key = $key;
		$this->modules = $modules;

		// Current names
		$this->moduleNamespace = __NAMESPACE__;

		// Module constructor
		$this->onConstruct();
	}



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {}



}