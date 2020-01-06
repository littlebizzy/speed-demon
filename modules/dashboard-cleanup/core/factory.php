<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Dashboard_Cleanup\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;
use \LittleBizzy\SpeedDemon\Modules\Dashboard_Cleanup\Cleanup;

/**
 * Object Factory class
 *
 * @package Speed Demon / Disable Gutenberg
 * @subpackage Core
 */
class Factory extends Helpers\Factory {

    /**
	 * Cleanup Elements object
	 */
	protected function createElements() {
		return Cleanup\Elements::instance($this->plugin);
	}

	/**
	 * Cleanup Dashboard object
	 */
	protected function createDashboard() {
		return Cleanup\Dashboard::instance($this->plugin);
	}

	/**
	 * Cleanup Woocommerce object
	 */
	protected function createWoocommerce() {
		return Cleanup\Woocommerce::instance($this->plugin);
	}
}