<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Embeds;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Disable Embeds
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Hooks object
	 */
	protected function createHooks() {
		return new Embeds\Hooks($this->plugin);
	}



	/**
	 * Cleaner object
	 */
	protected function createCleaner() {
		return Embeds\Cleaner::instance($this->plugin);
	}



	/**
	 * Allowed object
	 */
	protected function createAllowed() {
		return new Embeds\Allowed;
	}



	/**
	 * Registrar object (needs real plugin object)
	 */
	protected function createRegistrar() {
		return new Helpers\Registrar($this->plugin->plugin());
	}



}