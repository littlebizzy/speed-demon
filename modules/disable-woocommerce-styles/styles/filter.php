<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_WooCommerce_Styles\Styles;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Filter class
 *
 * @package Speed Demon / Disable WooCommerce Styles
 * @subpackage Styles
 */
class Filter extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {
		$this->restrict();
	}



	/**
	 * Restrict WC styles basend on this plugin constants
	 */
	private function restrict() {

		// Initialize
		$replacement = array();

		// WP Styles object
		$styles = wp_styles();
		if (empty($styles->queue) || !is_array($styles->queue))
			return;

		// Process constants
		$names = $this->values('DISABLE_WOOCOMMERCE_STYLES_NAMES', 'select2');
		$prefixes = $this->values('DISABLE_WOOCOMMERCE_STYLES_PREFIXES', 'woocommerce,wc');

		// Enum queued styles
		foreach ($styles->queue as $handler) {

			// Check prefixes
			$prefixed = false;
			foreach ($prefixes as $prefix) {
				if (0 === strpos($handler, $prefix.'-') ||
					0 === strpos($handler, $prefix.'_')) {
					$prefixed = true;
					break;
				}
			}

			// Exception
			if ($prefixed) {
				continue;
			}

			// Check names
			$match = false;
			foreach ($names as $name) {
				if ($name == $handler) {
					$match = true;
					break;
				}
			}

			// Exception
			if ($match) {
				continue;
			}

			// Add valid handler
			$replacement[] = $handler;
		}

		// Switch
		wp_styles()->queue = $replacement;
	}



	/**
	 * Sanitize target values
	 */
	private function values($constant, $default) {

		// Initialize
		$result = array();

		// Check values
		$values = defined($constant)? constant($constant) : $default;

		// Cast to array
		$values = array_map('trim', explode(',', $values));

		// Enum values
		foreach ($values as $value) {

			// Check content
			if ('' !== $value) {
				$result[] = $value;
			}
		}

		// Done
		return $result;
	}



}