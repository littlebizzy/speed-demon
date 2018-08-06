<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * AutoLoader class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
final class Loader {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Single class instance
	 */
	private static $instance;



	/**
	 * Namespace vendor and package
	 */
	private $vendor;
	private $package;



	/**
	 * Plugin root path
	 */
	private $root;



	/**
	 * Loaded files
	 */
	private $loaded = [];



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create instance and try to load the class
	 */
	public static function register($name = null) {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self;

		// Check request
		if (!empty($name))
			self::$instance->load($name);
	}



	/**
	 * Constructor
	 */
	private function __construct() {

		// Split current namespace
		$namespace = explode('\\', __NAMESPACE__);
		if (count($namespace) < 2)
			return;

		// Vendor and package values
		$this->vendor = $namespace[0];
		$this->package = $namespace[1];

		// Physical path
		$const = '\\'.$this->vendor.'\\'.$this->package.'\\FILE';
		if (defined($const)) {
			$pluginFile = constant($const);
			$this->root = dirname($pluginFile);
		}
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Load by namespace
	 */
	public function load($name) {

		// Check plugin path
		if (!isset($this->root))
			return;

		// Check vendor
		$namespace = explode('\\', $name);
		if ($this->vendor != $namespace[0])
			return;

		// Remove vendor
		array_shift($namespace);

		// Check package
		if ($this->package == $namespace[0])
			array_shift($namespace);

		// Load associated file
		$path = $this->root.'/'.implode('/', str_replace('_', '-', array_map('strtolower', $namespace))).'.php';
		if (!in_array($path, $this->loaded)) {
			$this->loaded[] = $path;
			if (file_exists($path))
				require_once $path;
		}
	}



}

// Autoload in throw exceptions mode
spl_autoload_register(__NAMESPACE__.'\Loader::register', true);