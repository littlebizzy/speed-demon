<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Delete_Expired_Transients;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Delete Expired Transients
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dlextr';
	const MODULE_NAMESPACE = __NAMESPACE__;



	/**
	 * Run the core module
	 */
	protected function onConstruct() {
		if ($this->enabled()) {
			Core\Core::instance($this);
		}
	}



}