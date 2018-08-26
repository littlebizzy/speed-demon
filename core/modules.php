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
	 * Modules keys and declarations
	 */
	private $keys = [

		'remove-query-strings' => [
			'constants' => 'RMQRST_FILE'
		],

		'disable-xml-rpc' => [
			'classes' 	=> ['\LittleBizzy\DisableXMLRPC\LB_Disable_XML_RPC', '\LB_Disable_XML_RPC'],
		],

		'disable-embeds' => [
			'constants' => '\LittleBizzy\DisableEmbeds\FILE',
			'classes' 	=> '\LittleBizzy\DisableEmbeds\Core\Core',
		],

		/* 'disable-emojis'				=> null,
		'index-autoload'				=> null,
		'delete-expired-transients'		=> null,
		'disable-post-via-email'		=> null, */
	];



	/**
	 * Run all modules
	 */
	protected function onConstruct() {

		// Enum all modules
		foreach ($this->keys as $key => $const) {

			// Check module availability
			if ($this->enabled($key)) {

// Debug point
//error_log($key);

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
		if (!isset($this->keys[$key]) ||
			$this->invalidated($key)) {
			return false;
		}

		// Check defined constants
		if (!empty($this->keys[$key]['constants'])) {

			// Cast to array
			$constants = is_array($this->keys[$key]['constants'])? $this->keys[$key]['constants'] : [$this->keys[$key]['constants']];
			foreach ($constants as $constant) {

				// Check existence
				if (defined($constant)) {
					return false;
				}
			}
		}

		// Check existing classes
		if (!empty($this->keys[$key]['classes'])) {

			// Cast to array
			$classes = is_array($this->keys[$key]['classes'])? $this->keys[$key]['classes'] : [$this->keys[$key]['classes']];
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