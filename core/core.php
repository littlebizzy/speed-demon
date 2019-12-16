<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Attemp to run all modules
		$this->plugin->factory->modules();
	}



}