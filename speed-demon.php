<?php
/*
Plugin Name: Speed Demon
Plugin URI: https://www.littlebizzy.com/plugins/speed-demon
Description: A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.
Version: 1.3.1
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Prefix: SPDDMN
*/

// Plugin namespace
namespace LittleBizzy\SpeedDemon;

// Aliased namespaces
use LittleBizzy\SpeedDemon\Notices;

// Block direct calls
if (!function_exists('add_action'))
	die;

// Plugin constants
const FILE = __FILE__;
const PREFIX = 'spddmn';
const VERSION = '1.3.1';

// Loader
require_once dirname(FILE).'/helpers/loader.php';

// Admin Notices
Notices\Admin_Notices::instance(__FILE__);

/**
 * Admin Notices Multisite check
 * Uncomment "return;" to disable this plugin on Multisite installs
 */
if (false !== Notices\Admin_Notices_MS::instance(__FILE__)) { /* return; */ }

// Run the main class
Helpers\Runner::start('Core\Core', 'instance');
