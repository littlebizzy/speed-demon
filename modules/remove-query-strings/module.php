<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Remove_Query_Strings;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Module class
 *
 * @package Speed Demon
 * @subpackage Remove Query Strings
 */
class Module extends Helpers\Module {



	/**
	 * Module constants
	 */
	const FILE = __FILE__;
	const PREFIX = 'rmqrst';
	const MODULE_NAMESPACE = __NAMESPACE__;



	/**
	 * Add filters on module constructor
	 */
	protected function onConstruct() {
		add_filter('style_loader_src',  [$this, 'loader']);
		add_filter('script_loader_src', [$this, 'loader']);
	}



	/**
	 * Start the loader filter
	 */
	public function loader($src) {

		// Last minute check
		if (!$this->enabled())
			return $src;

		// Local cache
		static $filter;
		if (!isset($filter))
			$filter = new Core\Filter(self::PREFIX);

		// Process filter
		return $filter->run($src);
	}



}