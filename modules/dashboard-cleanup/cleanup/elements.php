<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Dashboard_Cleanup\Cleanup;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Elements class
 *
 * @package Dashboard Cleanup
 * @subpackage Cleanup
 */
final class Elements extends Helpers\Singleton {

	/**
	 * Removes the thank you footer text
	 */
	public function footerText($text) {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_THANKS_FOOTER') &&
			!DASHBOARD_CLEANUP_THANKS_FOOTER
		) {
			return $text;
		}

		//  OnlyRemoves the thank you message
		if (false !== ($pos = strpos($text, '<span id="footer-thankyou">')) && false !== ($pos2 = strpos($text, '</span>', $pos)) ) {
			$text = substr($text, 0, $pos).substr($text, $pos2 + 7);
		}

		// Done
		return $text;
	}

	/**
	 * Removes the WP.org logo and shortcut links (top left of the screen)
	 */
	public function WPORGShortcutLinks() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WP_ORG_SHORTCUT_LINKS') &&
			!DASHBOARD_CLEANUP_WP_ORG_SHORTCUT_LINKS
		) {
			return;
		}

		// Done
		remove_action('admin_bar_menu', 'wp_admin_bar_wp_menu');
	}

	/**
	 * Removes the Link Manager menu item, enabled it or disabled
	 * This behaviour is controlled in wp_options table record link_manager_enabled (values 0 or 1)
	 */
	public function linkManagerMenu() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_LINK_MANAGER_MENU') &&
			!DASHBOARD_CLEANUP_LINK_MANAGER_MENU
		) {
			return;
		}

		// Globals
		global $submenu;

		// Check first the submenu (fast method)
		if (empty($submenu) || !is_array($submenu) || !isset($submenu['link-manager.php'])) {
			return;
		}

		// Remove submenus
		unset($submenu['link-manager.php']);

		// Check menu
		global $menu;
		if (empty($menu) || !is_array($menu)) {
			return;
		}

		// Find the Links item in main menu
		foreach ($menu as $index => $data) {

			// Check data
			if (empty($data) || !is_array($data)) {
				continue;
			}

			// Check links handler
			if (!empty($data[1]) && 'manage_links' == $data[1]) {
				unset($menu[$index]);
				return;
			}
		}
	}

	/**
	 * Removes Add new plugin Featured and Favorites tab, and set Popular as the default tab
	 */
	public function addPluginTabs($tabs) {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_ADD_PLUGIN_TABS') &&
			!DASHBOARD_CLEANUP_ADD_PLUGIN_TABS
		) {
			return $tabs;
		}

		// Check tabs value
		if (!empty($tabs) && is_array($tabs)) {
			unset($tabs['featured']);
			unset($tabs['favorites']);
		}

		// Set Popular as default
		if (empty($_GET['tab'])) {
			global $tab;
			$tab = 'popular';
		}

		// Done
		return $tabs;
	}

	/**
	 * Removes Add new theme Featured and Favorites tab,
	 * also sets Popular as the default tab using redirection
	 */
	public function addThemeTabs() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_ADD_THEME_TABS') &&
			!DASHBOARD_CLEANUP_ADD_THEME_TABS
		) {
			return;
		}

		// Check current theme install screen
		$currentScreen = get_current_screen();
		if (empty($currentScreen) || empty($currentScreen->id) || 'theme-install' != $currentScreen->id) {
			return;
		}

		// Redirects for not allowed tabs
		if (empty($_GET['browse']) || in_array($_GET['browse'], ['featured', 'favorites'])) {
			$url = admin_url('theme-install.php?browse=popular');
			wp_redirect($url);
			die;
		}

		// Enqueue inline styles
		add_action('admin_print_styles', [$this, 'styleThemeTabs']);
	}

	/**
	 * Alter the tabs menu hiding elements
	 */
	public function styleThemeTabs() {
		$css = 'ul.filter-links a[data-sort="featured"], ul.filter-links a[data-sort="favorites"] { display: none; }';
		echo '<style type="text/css">'.$css.'</style>'."\n";
	}

	/**
	 * Remove top admin bar search icon/field
	 */
	public function removeAdminTopSearch() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_DISABLE_SEARCH') &&
			!DASHBOARD_CLEANUP_DISABLE_SEARCH
		) {
			return;
		}

		// Remove WP hook handler
		remove_action('admin_bar_menu', 'wp_admin_bar_search_menu', 4);
	}

	/**
	 * Removes Import and Export items from the Tools menu
	 */
	public function adminMenu() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_IMPORT_EXPORT_MENU') &&
			!DASHBOARD_CLEANUP_IMPORT_EXPORT_MENU
		) {
			return;
		}

		// Globals
		global $submenu;

		// Check tools menu
		if (empty($submenu['tools.php']) || !is_array($submenu['tools.php'])) {
			return;
		}

		// Enum items
		foreach ($submenu['tools.php'] as $index => $item) {

			// Check file reference
			if (!empty($item[2])) {

				// Import
				if ('import.php' == $item[2]) {
					$indexImport = $index;

				// Export
				} elseif ('export.php' == $item[2]) {
					$indexExport = $index;
				}
			}
		}

		// Late removing
		if (isset($indexImport)) {
			unset($submenu['tools.php'][$indexImport]);
		}

		// Late removing
		if (isset($indexExport)) {
			unset($submenu['tools.php'][$indexExport]);
		}
	}

	/**
	 * Removes admin notice for css files on theme editor screen
	 */
	public function themeEditor() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_CSS_ADMIN_NOTICE') &&
			!DASHBOARD_CLEANUP_CSS_ADMIN_NOTICE
		) {
			return;
		}

		// Check current theme editor screen
		$currentScreen = get_current_screen();
		if (empty($currentScreen) || empty($currentScreen->id) || 'theme-editor' != $currentScreen->id) {
			return;
		}

		// Check current editing file
		if (empty($_GET['file']) || preg_match('/\.css$/', $_GET['file'])) {
			add_action('admin_print_styles', [$this, 'styleThemeEditor']);
		}
	}

	/**
	 * Alter the tabs menu hiding elements
	 */
	public function styleThemeEditor() {
		$css = '.wrap > #message.notice-info.notice { display: none; }';
		echo '<style type="text/css">'.$css.'</style>'."\n";
	}
}