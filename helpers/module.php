<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 * Emulates the Plugin class but for modules
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Module extends Plugin {



	/**
	 * External object/key
	 */
	private $key;
	private $modules;



	/**
	 * Constructor
	 */
	public function __construct($key, $modules) {

		// Module properties
		$this->key = $key;
		$this->modules = $modules;

		// Plugin properties from constants
		$this->file = static::FILE;
		$this->root = dirname($this->file);
		$this->prefix = static::PREFIX;
		$this->version = $modules->plugin()->version;
		$this->packageNamespace = '\\'.static::MODULE_NAMESPACE.'\\';

		// Module constructor
		$this->onConstruct();
	}



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {}



	/**
	 * Respond if this module is still enabled
	 * because the invalidation constants can be declared
	 * at any point of the WP config/plugins/theme execution.
	 */
	public function enabled() {
		return $this->modules->enabled($this->key);
	}



	/**
	 * Access to the modules plugin object
	 */
	public function plugin() {
		return $this->modules->plugin();
	}



}