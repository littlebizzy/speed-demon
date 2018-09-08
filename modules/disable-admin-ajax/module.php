<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Admin_Ajax;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable Admin-AJAX
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dsadax';
	const MODULE_NAMESPACE = __NAMESPACE__;



	/**
	 * Run the core module
	 */
	protected function onConstruct() {

		// Check module
		if (!$this->enabled()) {
			return;
		}

		// Check AJAX context and server referer var
		if (!defined('DOING_AJAX') || empty($_SERVER['HTTP_REFERER']))
			return;

		// Run the module
		Core\Core::instance();
	}



}