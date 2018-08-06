<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Remove Query Strings module
	 */
	protected function createModuleRemoveQueryStrings() {
		return new Modules\Remove_Query_Strings\Module;
	}



}