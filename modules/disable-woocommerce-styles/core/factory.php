<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_WooCommerce_Styles\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;
use \LittleBizzy\SpeedDemon\Modules\Disable_WooCommerce_Styles\Styles;

/**
 * Object Factory class
 *
 * @package Speed Demon / Disable WooCommerce Styles
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * A Gutenberg detector instance
	 */
	protected function createFilter() {
		return Styles\Filter::instance($this->plugin);
	}



}