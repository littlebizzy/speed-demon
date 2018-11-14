<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Gutenberg\Gutenberg;

/**
 * Disabler class
 *
 * @package Speed Demon / Disable Gutenberg
 * @subpackage Gutenberg
 */
class Disabler {



	/**
	 * Plugin hooks
	 */
	private $hooksByPlugin = [

		// gutenberg.php
		['action', 'admin_menu', 					'gutenberg_menu'],
		['action', 'admin_notices', 				'gutenberg_build_files_notice'],
		['action', 'admin_notices', 				'gutenberg_wordpress_version_notice'],
		['action', 'admin_init', 					'gutenberg_redirect_demo'],
		['action', 'admin_init', 					'gutenberg_add_edit_link_filters'],
		['action', 'admin_print_scripts-edit.php', 	'gutenberg_replace_default_add_new_button'],
		['filter', 'replace_editor', 				'gutenberg_init'],
		['filter', 'body_class', 					'gutenberg_add_responsive_body_class'],
		['filter', 'admin_url', 					'gutenberg_modify_add_new_button_url'],

		// lib/client-assets.php
		['action', 'wp_enqueue_scripts', 			'gutenberg_register_scripts_and_styles', 5],
		['action', 'admin_enqueue_scripts', 		'gutenberg_register_scripts_and_styles', 5],
		['action', 'wp_enqueue_scripts', 			'gutenberg_common_scripts_and_styles'],
		['action', 'admin_enqueue_scripts', 		'gutenberg_common_scripts_and_styles'],

		// lib/compat.php
		['filter', 'wp_refresh_nonces', 			'gutenberg_add_rest_nonce_to_heartbeat_response_headers'],
		['action', 'admin_enqueue_scripts', 		'gutenberg_check_if_classic_needs_warning_about_blocks'],

		// lib/rest-api.php
		['action', 'rest_api_init', 				'gutenberg_register_rest_routes'],
		['action', 'rest_api_init', 				'gutenberg_add_taxonomy_visibility_field'],
		['filter', 'rest_request_after_callbacks', 	'gutenberg_filter_oembed_result'],
		['filter', 'registered_post_type', 			'gutenberg_register_post_prepare_functions'],
		['filter', 'register_post_type_args', 		'gutenberg_filter_post_type_labels'],

		// lib/meta-box-partial-page.php
		['action', 'do_meta_boxes', 				'gutenberg_meta_box_save', 1000],
		['action', 'submitpost_box', 				'gutenberg_intercept_meta_box_render'],
		['action', 'submitpage_box', 				'gutenberg_intercept_meta_box_render'],
		['action', 'edit_page_form', 				'gutenberg_intercept_meta_box_render'],
		['action', 'edit_form_advanced', 			'gutenberg_intercept_meta_box_render'],
		['filter', 'redirect_post_location', 		'gutenberg_meta_box_save_redirect'],
		['filter', 'filter_gutenberg_meta_boxes', 	'gutenberg_filter_meta_boxes'],

		// lib/register.php
		['action', 'edit_form_top', 				'gutenberg_remember_classic_editor_when_saving_posts'],
		['filter', 'redirect_post_location', 		'gutenberg_redirect_to_classic_editor_when_saving_posts'],
		['filter', 'get_edit_post_link', 			'gutenberg_revisions_link_to_editor'],
		['filter', 'wp_prepare_revision_for_js', 	'gutenberg_revisions_restore'],
		['filter', 'display_post_states', 			'gutenberg_add_gutenberg_post_state'],

		// lib/plugin-compat.php
		['filter', 'rest_pre_insert_post', 			'gutenberg_remove_wpcom_markdown_support'],
	];



	/**
	 * Constructor
	 */
	public function __construct($detector) {

		// Disable default mode
		if ($detector->byDefault()) {
			add_filter('use_block_editor_for_post_type', '__return_false', 100);
		}

		// Plugin mode
		if ($detector->byPlugin()) {
			$this->hooks($this->hooksByPlugin);
		}
	}



	/**
	 * Remove Gutenberg plugin hooks
	 */
	private function hooks($hooks) {

		// Enum all hooks
		foreach ($hooks as $hook) {

			// Remove action
			if ('action' == $hook[0]) {
				if (4 == count($hook)) {
					remove_action($hook[1], $hook[2], $hook[3]);
				} else {
					remove_action($hook[1], $hook[2]);
				}

			// Remove filter
			} elseif ('filter' == $hook[0]) {
				remove_filter($hook[1], $hook[2]);
			}
		}
	}



}