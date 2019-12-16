<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Xml_Rpc\Core;

/**
 * XMLRPC class
 *
 * @package Speed Demon
 * @subpackage Disable XML-RPC
 */
class XMLRPC {



	/**
	 * Constructor
	 */
	public function __construct() {

		// Header check
		$this->header();

		// WP Hooks
		$this->hooks();
	}



	/**
	 * Set disabled header for any XML-RPC requests
	 */
	private function header() {

		// Check script filename server var
		if (empty($_SERVER['SCRIPT_FILENAME']) ||
			'xmlrpc.php' !== basename($_SERVER['SCRIPT_FILENAME'])) {
			return;
		}

		// Prepare header
		$header = 'HTTP/1.1 403 Forbidden';

		// Done
		header($header);
		die($header);
	}



	/**
	 * Handle involved WP hooks
	 */
	private function hooks() {

		// Remove RSD link from head
		remove_action('wp_head', 'rsd_link');

		// Disable XML-RPC API
		add_filter('xmlrpc_enabled', '__return_false');

		// Force to uncheck pingbck and trackback options
		add_filter('pre_option_default_ping_status', '__return_zero');
		add_filter('pre_option_default_pingback_flag', '__return_zero');

		// Hide options on Discussion page
		add_action('admin_enqueue_scripts', [$this, 'enqueue']);
	}



	/**
	 * Hide Discussion options with CSS
	 */
	public function enqueue( $hook ) {
		if ('options-discussion.php' == $hook) {
			wp_add_inline_style('dashboard', '.form-table td label[for="default_pingback_flag"], .form-table td label[for="default_pingback_flag"] + br, .form-table td label[for="default_ping_status"], .form-table td label[for="default_ping_status"] + br { display: none; }');
		}
	}



}