<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Dashboard_Cleanup;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Dashboard Cleanup
 */
class Module extends Helpers\Module {

    /**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dbcu';
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