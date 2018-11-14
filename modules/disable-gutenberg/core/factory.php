<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Gutenberg\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;
use \LittleBizzy\SpeedDemon\Modules\Disable_Gutenberg\Gutenberg;

/**
 * Object Factory class
 *
 * @package Speed Demon / Disable Gutenberg
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * A Gutenberg detector instance
	 */
	protected function createDetector() {
		return Gutenberg\Detector::instance($this->plugin);
	}



	/**
	 * Create Disabler object
	 */
	protected function createDisabler() {
		return new Gutenberg\Disabler($this->plugin->factory->detector);
	}



}