<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/*
	 * Return modules object instance
	 */
	protected function createModules() {
		return Modules::instance($this->plugin);
	}



	/**
	 * Create specific module from its key
	 */
	protected function createModule($key, $modules) {

		// Prepare class key
		$class = explode('-', strtolower($key));
		$class = array_map('ucfirst', $class);
		$class = implode('_', $class);

		// Compose path and create a new instance
		$path = '\\LittleBizzy\\SpeedDemon\\Modules\\'.$class.'\\Module';

		// Done
		return new $path($key, $modules, $this->plugin->version);
	}



}