<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Modules class
 *
 * @package Speed Demon
 * @subpackage Core
 */
final class Modules extends Helpers\Singleton {



	/**
	 * Modules keys and declarations
	 */
	private $keys = [

		'remove-query-strings' => [
			'constants' => 'RMQRST_FILE'
		],

		'disable-xml-rpc' => [
			'classes' 	=> ['\LB_Disable_XML_RPC', '\LittleBizzy\DisableXMLRPC\LB_Disable_XML_RPC'],
		],

		'disable-embeds' => [
			'constants' => '\LittleBizzy\DisableEmbeds\FILE',
			'classes' 	=> '\LittleBizzy\DisableEmbeds\Core\Core',
		],

		'disable-emojis' => [
			'constants' => '\LittleBizzy\DisableEmojis\FILE',
			'classes' 	=> ['\LB_Disable_Emojis', '\LittleBizzy\DisableEmojis\Core\Core'],
		],

		'index-autoload' => [
			'constants' => 'IDXALD_FILE',
			'classes'	=> '\IDXALD_Alter',
		],

		'delete-expired-transients' => [
			'constants' => '\LittleBizzy\DeleteExpiredTransients\FILE',
			'classes'	=> '\LittleBizzy\DeleteExpiredTransients\Core\Core',
		],

		'disable-post-via-email' => [
			'constants' => '\LittleBizzy\DisablePostViaEmail\FILE',
			'classes'	=> '\LittleBizzy\DisablePostViaEmail\Core\Core',
		],

		'inline-styles' => [
			'default'	=> false,
			'constants' => '\LittleBizzy\InlineStyles\FILE',
			'classes'	=> '\LittleBizzy\InlineStyles\Core\Core',
		],

		'disable-admin-ajax' => [
			'default'	=> false,
			'constants' => '\LittleBizzy\DisableAdminAJAX\FILE',
			'classes'	=> '\LittleBizzy\DisableAdminAJAX\DisableAJAXCheck',
		],

		'disable-cart-fragments' => [
			'constants' => '\LittleBizzy\DisableCartFragments\FILE',
			'classes'	=> '\LittleBizzy\DisableCartFragments\Core\Core',
		],

		'disable-jquery-migrate' => [
			'constants' => '\LittleBizzy\DisableJQueryMigrate\FILE',
			'classes'	=> '\LittleBizzy\DisableJQueryMigrate\Core\Core',
		],

		'header-cleanup' => [
			'constants' => '\LittleBizzy\HeaderCleanup\FILE',
			'classes'	=> '\LittleBizzy\HeaderCleanup\Core\Core',
		],

		'minify-html' => [
			'constants' => '\LittleBizzy\MinifyHTML\FILE',
			'classes'	=> '\LittleBizzy\MinifyHTML\Core\Core',
		],

		'disable-gutenberg' => [
			'constants' => '\LittleBizzy\DisableGutenberg\FILE',
			'classes'	=> '\LittleBizzy\DisableGutenberg\Core\Core',
		],

		'disable-woocommerce-status' => [
			'default'	=> false,
			'constants' => 'DWCSTS_VERSION',
			'classes'	=> '\DWCSTS',
		],

		'disable-woocommerce-styles' => [
			'default'	=> false,
			'constants' => 'DWCSTY_FILE',
			'classes'	=> '\DWCSTY_Core_Filter',
		],
	];



	/**
	 * Run all modules
	 */
	protected function onConstruct() {

		// Enum all modules
		foreach ($this->keys as $key => $const) {

			// Check module availability
			if ($this->enabled($key)) {

// Debug point
//error_log($key);

				// Create instance
				$this->plugin->factory->module($key, $this);
			}
		}
	}



	/**
	 * Check if the plugin already exists or is disabled via constant
	 */
	public function enabled($key) {

		// Check module disabled mode
		if (!isset($this->keys[$key]) ||
			$this->invalidated($key)) {

// Debug point
//error_log('invalidated: '.$key);

			// Invalidated
			return false;
		}

		// Check defined constants
		if (!empty($this->keys[$key]['constants'])) {

			// Cast to array
			$constants = is_array($this->keys[$key]['constants'])? $this->keys[$key]['constants'] : [$this->keys[$key]['constants']];
			foreach ($constants as $constant) {

				// Check existence
				if (defined($constant)) {

// Debug point
//error_log('constant '.$constant.' - key: '.$key);

					// Disabled
					return false;
				}
			}
		}

		// Check existing classes
		if (!empty($this->keys[$key]['classes'])) {

			// Cast to array
			$classes = is_array($this->keys[$key]['classes'])? $this->keys[$key]['classes'] : [$this->keys[$key]['classes']];
			foreach ($classes as $class) {

				//  Check existence
				if (class_exists($class)) {

// Debug point
//error_log('class '.$class.' - key: '.$key);

					// Disabled
					return false;
				}
			}
		}

		// Enabled
		return true;
	}



	/**
	 * Specific module invalidation
	 */
	private function invalidated($key) {

		// Initialize
		$invalidated = false;

		// Prepare constant name
		$name = explode('-', $key);
		$name = array_map('strtoupper', $name);
		$name = implode('_', $name);

		// Invalidated on constant existence and false value
		if (defined($name)) {
			$invalidated = !constant($name);

		// Invalidated if default property is false
		} elseif (isset($this->keys[$key]['default'])) {
			$invalidated = !$this->keys[$key]['default'];
		}

		// Done
		return $invalidated;
	}



	/**
	 * Access to the plugin object using a public
	 * method due the protected property declaration
	 */
	public function plugin() {
		return $this->plugin;
	}



}