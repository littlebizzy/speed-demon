<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Factory object
		$this->factory = new Factory($this->plugin);

		// Remove query strings
		if ($this->module('RMQRST_FILE', 'REMOVE_QUERY_STRINGS'))
			$this->factory->moduleRemoveQueryStrings();
	}



	/**
	 * Check if the plugin already exists or is disabled via constant
	 */
	private function module($plugin, $disable) {
		return !(defined($plugin) || (defined($disable) && constant($disable)));
	}



}