<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable Embeds
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dsbebd';
	const NAMESPACE = __NAMESPACE__;



	/**
	 * Run the core module
	 */
	public function onConstruct() {
		if ($this->enabled()) {
			Core\Core::instance($this);
		}
	}



}