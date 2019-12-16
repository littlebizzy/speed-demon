<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Emojis\Emojis;

/**
 * Actions class
 *
 * @package Speed Demon / Disable Emojis
 * @subpackage Emojis
 */
class Actions extends Emojis {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Involved actions
	 */
	private $actions = [
		'print_emoji_detection_script' => [
			['wp_head', 7],
			'admin_print_scripts',
			'embed_head', // Unsupported by the original plugin
		],
		'print_emoji_styles' => [
			'wp_print_styles',
			'admin_print_styles',
		],
	];



	// WP hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Handle the WP init hook
	 */
	public function init() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Remove actions
		$this->remove('actions', $this->actions);
	}



}