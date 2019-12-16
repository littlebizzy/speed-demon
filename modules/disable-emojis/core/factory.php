<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Emojis\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules\Disable_Emojis\Emojis;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Disable Emojis
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Actions object
	 */
	protected function createActions() {
		return new Emojis\Actions($this->plugin);
	}


	/**
	 * Filters object
	 */
	protected function createFilters() {
		return new Emojis\Filters($this->plugin);
	}



}