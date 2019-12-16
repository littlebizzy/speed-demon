<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Delete_Expired_Transients\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules\Delete_Expired_Transients\Transients;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Delete Expired Transients
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Actions object
	 */
	protected function createCron() {
		return new Transients\Cron($this, $this->plugin);
	}


	/**
	 * Filters object
	 */
	protected function createTransients() {
		return new Transients\Transients;
	}



}