<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Emojis;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable Emojis
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dsbemj';
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