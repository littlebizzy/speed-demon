<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Modules class
 *
 * @package Speed Demon
 * @subpackage Core
 */
final class Modules extends Helpers\Singleton {



	/**
	 * Declare the plugin modules
	 */
	private $modules = [
		'remove-query-strings' 			=> ['constants' => 'RMQRST_FILE'],
		'disable-xml-rpc'				=> ['classes' => ['\LittleBizzy\DisableXMLRPC\LB_Disable_XML_RPC', '\LB_Disable_XML_RPC']],
		/*'disable-embeds'				=> null,
		'disable-emojis'				=> null,
		'index-autoload'				=> null,
		'delete-expired-transients'		=> null,
		'disable-post-via-email'		=> null, */
	];



	/**
	 * Run all modules
	 */
	protected function onConstruct() {

		// Enum all modules
		foreach ($this->modules as $key => $const) {

			// Check module availability
			if ($this->enabled($key)) {

				// Create instance
				$this->plugin->factory->module($key, $this);
			}
		}
	}



	/**
	 * Check if the plugin already exists or is disabled via constant
	 */
	public function enabled($key) {

		// Check module disabled mode
		if (!isset($this->modules[$key]) || $this->invalidated($key)) {
			return false;
		}

		// Check defined constants
		if (!empty($this->modules[$key]['constants'])) {

			// Cast to array
			$constants = is_array($this->modules[$key]['constants'])? $this->modules[$key]['constants'] : [$this->modules[$key]['constants']];
			foreach ($constants as $constant) {

				// Check existence
				if (defined($constant)) {
					return false;
				}
			}
		}

		// Check existing classes
		if (!empty($this->modules[$key]['classes'])) {

			// Cast to array
			$classes = is_array($this->modules[$key]['classes'])? $this->modules[$key]['classes'] : [$this->modules[$key]['classes']];
			foreach ($classes as $class) {

				//  Check existence
				if (class_exists($class)) {
					return false;
				}
			}
		}

		// Ok
		return true;
	}



	/**
	 * Specific module invalidation
	 */
	private function invalidated($key) {

		// Prepare constant name
		$name = explode('-', $key);
		$name = array_map('strtoupper', $name);
		$name = implode('_', $name);

		// Invalidated on existence and false value
		return defined($name) && !constant($name);
	}



}