<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Remove_Query_Strings;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Remove Query Strings
 */
class Module {



	/**
	 * Module prefix
	 */
	const PREFIX = 'rmqrst';



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

		// Filters
		add_filter('style_loader_src',  [$this, 'loader']);
		add_filter('script_loader_src', [$this, 'loader']);
	}



	/**
	 * Start the loader filter
	 */
	public function loader($src) {

		// Last minute check
		if (!$this->modules->enabled($this->key))
			return $src;

		// Local cache
		static $filter;
		if (!isset($filter))
			$filter = new Core\Filter(self::PREFIX);

		// Process filter
		return $filter->run($src);
	}



}