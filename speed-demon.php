<?php
/*
Plugin Name: Speed Demon
Plugin URI: https://www.littlebizzy.com/plugins/speed-demon
Description: Performance hacks for WordPress
Version: 2.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
GitHub Plugin URI: littlebizzy/speed-demon
Primary Branch: master
*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Disable WordPress.org updates for this plugin
add_filter( 'gu_override_dot_org', function( $overrides ) {
    $overrides[] = 'speed-demon/speed-demon.php';
    return $overrides;
}, 999 );

// Load settings page
require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';

// Load enabled modules
$modules = get_option('speed_demon_enabled_modules', array());

foreach ($modules as $module) {
    $module_file = plugin_dir_path(__FILE__) . "modules/$module/$module.php";
    if (file_exists($module_file)) {
        require_once $module_file;
    }
}

// Ref: ChatGPT
