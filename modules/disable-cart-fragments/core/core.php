<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Cart_Fragments\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable Cart Fragments
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {
		add_action('wp_enqueue_scripts', [$this, 'dequeue'], 11);
	}



	/**
	 * Remove script from queue
	 */
	public function dequeue() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Check wp-config constant for exceptions
		if (defined('DISABLE_CART_FRAGMENTS') && !is_bool(DISABLE_CART_FRAGMENTS) && is_page()) {
			$ids = array_map('intval', explode(',', DISABLE_CART_FRAGMENTS));
			if (in_array((int) get_the_ID(), $ids))
				return;
		}

		// Dequeue script
		wp_dequeue_script('wc-cart-fragments');
	}



}