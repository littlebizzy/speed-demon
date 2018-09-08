<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Header_Cleanup\Core;

/**
 * Cleaner class
 *
 * @package Speed Demon / Header Cleanup
 * @subpackage Core
 */
final class Cleaner {



	/**
	 * Action hooks for removal
	 */
	private $actionsToRemove = [

		// RSD
		['wp_head', 'rsd_link'],

		// WP Generator + WooCommerce Generator
		['wp_head', 'wp_generator'], // WP & WC
		['wp_head', 'wc_generator_tag'], // WC > 2.1

		// Windows Live Writer
		['wp_head', 'wlwmanifest_link'],

		// Shortlinks
		['wp_head', 'wp_shortlink_wp_head'],

		// Relational links
		['wp_head', 'start_post_rel_link'],	 // Deprecated 3.3.0
		['wp_head', 'parent_post_rel_link'], // Deprecated 3.3.0
		['wp_head', 'index_rel_link'],		 // Deprecated 3.3.0
		['wp_head', 'adjacent_posts_rel_link'],
		['wp_head', 'adjacent_posts_rel_link_wp_head'],

		// All feeds/RSS links
		['wp_head', 'feed_links', 2],
		['wp_head', 'feed_links_extra', 3],

		// WP-JSON REST API link
		['wp_head', 'rest_output_link_wp_head'],

		// Default DNS prefetch
		['wp_head', 'wp_resource_hints', 2],
	];



	/**
	 * Constructor
	 */
	public function __construct() {

		// Remove WP actions
		foreach ($this->actionsToRemove as $action) {
			remove_action($action[0], $action[1], isset($action[2])? $action[2] : 10);
		}

		// WC hooks
		add_action('get_header', [$this, 'removeWCGenerator']);
		add_action('woocommerce_init', [$this, 'removeWCGenerator']);
	}



	/**
	 * Remove generator from WooCommerce old versions
	 */
	public function removeWCGenerator() {

		// Generator WC function
		remove_action('wp_head', 'wc_generator_tag'); // WC >= 2.1.0

		// Generator method depending on the global WC object
		if (isset($GLOBALS['woocommerce']) && is_object($GLOBALS['woocommerce']))
			remove_action('wp_head', [$GLOBALS['woocommerce'], 'generator']); // WC < 2.1.0
	}



}