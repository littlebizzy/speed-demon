<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Xml_Rpc;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Disable XML-RPC
 */
class Module {



	/**
	 * Module prefix
	 */
	const PREFIX = 'dsbxml';



	/**
	 * External object/key
	 */
	private $key;
	private $modules;



	/**
	 * Constructor
	 */
	public function __construct($key, $modules) {

		// Properties
		$this->key = $key;
		$this->modules = $modules;

		// Initialization
		add_action('init', [$this, 'init'], -999);
	}



	/**
	 * Start the module functionality
	 */
	public function init() {

		// Last minute check
		if (!$this->modules->enabled($this->key))
			return;

		// Start
		new Disable;
	}



}