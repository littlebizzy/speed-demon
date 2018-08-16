<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Modules class
 *
 * @package Speed Demon
 * @subpackage Core
 */
final class Modules extends Helpers\Singleton {



	/**
	 * Declare the plugin modules
	 */
	private $modules = [
		'remove-query-strings' 			=> 'RMQRST_FILE',
		/* 'disable-xml-rpc'			=> null,
		'disable-embeds'				=> null,
		'disable-emojis'				=> null,
		'index-autoload'				=> null,
		'delete-expired-transients'		=> null,
		'disable-post-via-email'		=> null, */
	];



	/**
	 * Run all modules
	 */
	protected function onConstruct() {

		// Enum all modules
		foreach ($this->modules as $key => $const) {

			// Check module availability
			if ($this->enabled($key)) {

				// Create instance
				$this->plugin->factory->module($key, $this);
			}
		}
	}



	/**
	 * Check if the plugin already exists or is disabled via constant
	 */
	public function enabled($key) {

		// Original plugin constant
		if (isset($this->modules[$key]) && defined($this->modules[$key]))
			return false;

		// Prepare const
		$const = explode('-', $key);
		$const = array_map('strtoupper', $const);
		$const = implode('_', $const);

		// Check const
		if (defined($const) && !constant($const))
			return false;

		// Ok
		return true;
	}



}