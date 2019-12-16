<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Index_Autoload\Core;

/**
 * Alter class
 *
 * @package Speed Demon / Index Autoload
 * @subpackage Core
 */
final class Alter {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Single class instance
	 */
	private static $instance;



	/**
	 * WPDB object reference
	 */
	private $wpdb;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance() {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self;

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 * Set a WPDB object reference
	 */
	private function __construct() {
		global $wpdb;
		$this->wpdb =& $wpdb;
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Check if index currently exists
	 */
	public function check() {

		// First check
		if (!$this->exists()) {

			// Create it
			$this->add();

		// Force to re-generate even if the index exists
		} elseif (defined('INDEX_AUTOLOAD_REGENERATE') && INDEX_AUTOLOAD_REGENERATE) {

			// Remove and create it
			$this->drop();
			$this->add();
		}
	}



	/**
	 * Remove the index
	 */
	public function remove() {
		if ($this->exists())
			$this->drop();
	}



	// Internal
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Check if the target index exists
	 */
	private function exists() {

		// Retrieve indexes
		$indexes = $this->wpdb->get_results('SHOW INDEX FROM '.esc_sql($this->wpdb->options));
		if (empty($indexes) || !is_array($indexes))
			return false;

		// Enum and check
		foreach ($indexes as $index) {

			// Check properties
			if (!is_object($index) || !isset($index->Key_name) || !isset($index->Column_name))
				continue;

			// Check index key and column values
			if ('autoload' == $index->Key_name && 'autoload' == $index->Column_name)
				return true;
		}

		// Not exists
		return false;
	}



	/**
	 * Attemp to create the autoload index
	 */
	private function add() {
		$this->wpdb->query('ALTER TABLE '.esc_sql($this->wpdb->options).' ADD INDEX autoload (autoload)');
	}



	/**
	 * Removes the autoload index
	 */
	private function drop() {
		$this->wpdb->query('ALTER TABLE '.esc_sql($this->wpdb->options).' DROP INDEX autoload');
	}



}