<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable Embeds
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Face constructor
	 */
	protected function onConstruct() {

		// Init factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Allowed sources from constant
		$this->plugin->allowed = $this->plugin->factory->allowed();

		// Create registrar object and set hooks handler
		$this->plugin->factory->registrar->setHandler($this);

		// Start the hooks object
		$this->plugin->factory->hooks();
	}



	// Registrar events
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin activation
	 */
	public function onActivation() {
		add_filter('rewrite_rules_array', [$this->plugin->factory->cleaner, 'rules']);
		flush_rewrite_rules();
	}



	/**
	 * Plugin deactivation
	 */
	public function onDeactivation() {
		add_filter('rewrite_rules_array', [$this->plugin->factory->cleaner, 'rules']);
		flush_rewrite_rules();
	}



}