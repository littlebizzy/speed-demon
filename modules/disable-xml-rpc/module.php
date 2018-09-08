<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Xml_Rpc;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable XML-RPC
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'dsbxml';
	const MODULE_NAMESPACE = __NAMESPACE__;



	/**
	 * Wait to start on WP init hook
	 */
	protected function onConstruct() {
		add_action('init', [$this, 'init'], PHP_INT_MAX);
	}



	/**
	 * Start the module functionality
	 */
	public function init() {

		// Last minute check
		if (!$this->enabled()) {
			return;
		}

		// Start
		new Core\XMLRPC;
	}



}