<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Inline_Styles\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Inline Styles
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Factory object
		$this->plugin->factory = new Factory($this->plugin);

		// WP loaded hook
		add_action('wp_loaded', [$this, 'loaded'], PHP_INT_MAX);
	}



	/**
	 * Output parser object
	 */
	public function loaded() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Start parsing the whole HTML
		$this->plugin->factory->parser->start();

		// Print styles hook
		add_action('wp_print_styles', [$this, 'styles'], PHP_INT_MAX);
	}



	/**
	 * Handle the print styles hook
	 */
	public function styles() {
		$this->plugin->factory->inline->transform();
	}



}