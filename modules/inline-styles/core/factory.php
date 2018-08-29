<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Inline_Styles\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Modules\Inline_Styles\Styles;
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Object Factory class
 *
 * @package Speed Demon / Inline Styles
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * Inline object
	 */
	protected function createInline() {
		return Styles\Inline::instance($this->plugin);
	}



	/**
	 * Relative object
	 */
	protected function createRelative($base) {
		return new Styles\Relative($base);
	}



	/**
	 * Parser object
	 */
	protected function createParser() {
		return Styles\Parser::instance($this->plugin);
	}



}