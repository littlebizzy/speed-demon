<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Index_Autoload\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Index Autoload
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Alter object
	 */
	protected function createAlter() {
		return Alter::instance();
	}



	/**
	 * Registrar object (needs real plugin object)
	 */
	protected function createRegistrar() {
		return new Helpers\Registrar($this->plugin->plugin());
	}



}