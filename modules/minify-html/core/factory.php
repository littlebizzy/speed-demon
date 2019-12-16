<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Minify_Html\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules\Minify_Html\Html;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Minify HTML
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Options object
	 */
	protected function createOptions() {
		return new Options;
	}



	/**
	 * Buffer instance
	 */
	protected function createBuffer() {
		return Html\Buffer::instance($this->plugin);
	}



	/**
	 * Parser object
	 */
	protected function createParser($args) {
		return new Html\Parser($args);
	}



}