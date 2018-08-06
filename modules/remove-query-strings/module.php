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
	 * Constructor
	 */
	public function __construct() {
		add_filter('style_loader_src',  [$this, 'loader']);
		add_filter('script_loader_src', [$this, 'loader']);
	}



	/**
	 * Start the loader filter
	 */
	public function loader($src) {

		// Local cache
		static $filter;
		if (!isset($filter))
			$filter = new Filter(self::PREFIX);

		// Process filter
		return $filter->run($src);
	}



}