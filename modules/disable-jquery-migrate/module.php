<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_jQuery_Migrate;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable jQuery Migrate
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dsjqmg';
	const MODULE_NAMESPACE = __NAMESPACE__;



	/**
	 * Run the core module
	 */
	public function onConstruct() {
		if ($this->enabled()) {
			Core\Core::instance($this);
		}
	}



}