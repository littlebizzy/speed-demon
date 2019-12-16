<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Cart_Fragments;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable Cart Fragments
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dscfrg';
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