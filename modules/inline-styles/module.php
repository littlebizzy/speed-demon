<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Inline_Styles;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Inline Styles
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'ilnsty';
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