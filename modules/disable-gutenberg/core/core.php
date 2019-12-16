<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Gutenberg\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable Gutenberg
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Remove the "Try Gutenberg" dashboard widget
		remove_action('try_gutenberg_panel', 'wp_try_gutenberg_panel');

		// Plugin loaded hook
		add_action('plugins_loaded', [$this, 'onPluginsLoaded']);
	}



	/**
	 * All plugins loaded hook
	 */
	public function onPluginsLoaded() {

		// Check module already enabled
		if ($this->plugin->enabled()) {

			// Check Gutenberg as a plugin or default editor
			if ($this->plugin->factory->detector->detected()) {

				// Disable actions and hooks
				$this->plugin->factory->disabler();
			}
		}
	}



}