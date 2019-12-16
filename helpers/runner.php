<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Runner class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Runner {



	/**
	 * Start the main plugin class
	 */
	public static function start($who, $method = null) {

		// Plugin object
		$plugin = new Plugin;

		// Function call
		if (!isset($method)) {
			call_user_func_array($plugin->packageNamespace.$who, [$plugin]);

		// Initialized object
		} elseif (is_object($who)) {
			$who->$method($plugin);

		// Static method
		} else {
			call_user_func_array(array($plugin->packageNamespace.$who, $method), [$plugin]);
		}
	}



}