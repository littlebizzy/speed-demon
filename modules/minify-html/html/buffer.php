<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Minify_Html\Html;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Buffer class
 *
 * @package Speed Demon / Minify HTML
 * @subpackage HTML
 */
class Buffer extends Helpers\Singleton {



	/**
	 * Parsing arguments
	 */
	private $args;



	/**
	 * Start buffering
	 */
	public function start($args) {
		$this->args = $args;
		@ob_start([$this, 'output']);
	}



	/**
	 * Ouput buffer operations
	 */
	public function output($buffer) {

		// XML test
		$test = strtolower(substr(ltrim($buffer), 0, 5));
		if ($test == '<?xml') {
			return $buffer;
		}

	 	// Performs the HTML parsing
		$buffer = $this->plugin->factory->parser($this->args)->parse($buffer);

		// Done
		return $buffer;
	}



}