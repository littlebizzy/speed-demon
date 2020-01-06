<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Helpers;

/**
 * Context class
 *
 * @package WordPress Plugin
 * @subpackage Helpers
 */
class Context {



	// Areas
	private $ajax;
	private $admin;
	private $front;

	// Front
	private $cron;
	private $xmlrpc;

	// Special
	private $cli;
	private $installing;



	/**
	 * Constructor
	 */
	public function __construct() {
		$this->settings();
	}



	/**
	 * Reload settings
	 */
	public function reload() {
		$this->settings();
	}



	/**
	 * Context settings
	 */
	private function settings() {

		// CLI mode
		$this->cli = defined('WP_CLI') && WP_CLI;

		// WP Installing
		$this->installing = defined('WP_INSTALLING') && WP_INSTALLING;

		// AJAX request
		$this->ajax = !($this->cli || $this->installing) && is_admin() && defined('DOING_AJAX') && DOING_AJAX;

		// Admin area
		$this->admin = !($this->cli || $this->installing) && is_admin() && !$this->ajax;

		// CRON request
		$this->cron =  !($this->cli || $this->installing) && !$this->admin && !$this->ajax && defined('DOING_CRON') && DOING_CRON;

		// XML-RPC request
		$this->xmlrpc =  !($this->cli || $this->installing) && !$this->admin && !$this->ajax && defined('XMLRPC_REQUEST') && XMLRPC_REQUEST;

		// Front context
		$this->front = !($this->cli || $this->installing) && !($this->admin || $this->ajax || $this->cron || $this->xmlrpc);
	}



	/**
	 * AJAX context state
	 */
	public function ajax() {
		return $this->ajax;
	}



	/**
	 * Admin context state
	 */
	public function admin() {
		return $this->admin;
	}



	/**
	 * Front context state
	 */
	public function front() {
		return $this->front;
	}



	/**
	 * Cron request mode
	 */
	public function cron() {
		return $this->cron;
	}



	/**
	 * XML-RPC request mode
	 */
	public function xmlrpc() {
		return $this->xmlrpc;
	}



	/**
	 * WP Installing mode
	 */
	public function installing() {
		return $this->installing;
	}



	/**
	 * CLI mode
	 */
	public function cli() {
		return $this->cli;
	}



	/**
	 * Determines if Gutenberg is the current editor
	 * This method should be called using the admin_enqueue_scripts hook:
	 * https://wordpress.stackexchange.com/questions/309862/check-if-gutenberg-is-currently-in-use
	 */
	public function gutenberg() {

		// Gutenberg by plugin
		if (has_filter('replace_editor', 'gutenberg_init')) {
			return true;
		}

		// Gutenberg by version (>= 5.0)
		if (function_exists('is_gutenberg_page') && is_gutenberg_page()) {
			return true;
		}

		// No Gutenberg
		return false;
	}



}