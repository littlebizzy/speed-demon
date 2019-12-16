<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Emojis\Emojis;

/**
 * Emojis class
 *
 * @package Speed Demon / Disable Emojis
 * @subpackage Emojis
 */
class Emojis {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin/module object
	 */
	protected $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($plugin) {
		$this->plugin = $plugin;
		add_action('init', [$this, 'init']);
	}



	/**
	 * Declared for overwriting
	 */
	public function init() {}



	// Util
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Remove actions of filters
	 */
	protected function remove($type, $items) {

		// Enum all items
		foreach ($items as $func => $hooks) {

			// Allowed hooks
			foreach ($hooks as $hook) {

				// Check priority
				$tag = is_array($hook)? $hook[0]: $hook;
				$priority = (is_array($hook) && isset($hook[1]))? $hook[1] : 10;

				// Actions
				if ('actions' == $type) {
					remove_action($tag, $func, $priority);

				// Filters
				} elseif ('filters' == $type) {
					remove_filter($tag, $func, $priority);
				}
			}
		}
	}



}