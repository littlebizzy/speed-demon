<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Remove_Query_Strings\Core;

/**
 * Filter class
 *
 * @package Speed Demon
 * @subpackage Remove Query Strings
 */
class Filter {



	/**
	 * Module prefix
	 */
	private $prefix;



	/**
	 * Handle URL loader filter
	 */
	public function __construct($prefix) {
		$this->prefix = $prefix;
	}



	/**
	 * Process query strings
	 */
	public function run($src) {

		// Decomposes URL
		if (false !== ($url = @parse_url($src))) {

			// Check result array
			if (!empty($url) && is_array($url) && !empty($url['query'])) {

				// Extract arguments
				@parse_str($url['query'], $args);
				if (!empty($args) && is_array($args)) {

					// Remove arguments without value
					foreach ($args as $arg => $value) {
						if ('' === trim(''.$value))
							$src = remove_query_arg($arg, $src);
					}

					// Load unwanted args
					$unwanted = apply_filters($this->prefix.'_unwanted_args', $this->unwanted(), $src);
					if (empty($unwanted) || !is_array($unwanted))
						return $src;

					// Enum URL args
					foreach ($args as $arg => $value) {

						// Check removable arg
						if (in_array($arg, $unwanted)) {

							// Remove avoiding agressive arg removing
							$src = remove_query_arg($arg, $src);
						}
					}
				}
			}
		}

		// Done
		return $src;
	}



	/**
	 * Check the constant REMOVE_QUERY_STRINGS_ARGS
	 * Example: define('REMOVE_QUERY_STRINGS_ARGS', 'ver,test,w');
	 */
	private function unwanted() {

		// Local cache
		static $unwanted;
		if (isset($unwanted))
			return $unwanted;

		// Inspect wp-config.php constant
		if (defined('REMOVE_QUERY_STRINGS_ARGS')) {

			// Initialize user args
			$args = [];

			// Extract arguments
			$const = explode(',', REMOVE_QUERY_STRINGS_ARGS);
			foreach ($const as $arg) {
				$arg = trim($arg);
				if ('' !== $arg)
					$args[] = $arg;
			}
		}

		// Set result
		$unwanted = empty($args)? $this->defaultArgs() : $args;

		// Done
		return $unwanted;
	}



	/**
	 * Default remove query string args
	 */
	private function defaultArgs() {
		return ['ver', 'version', 'v'];
	}



}