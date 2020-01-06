<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Dashboard_Cleanup\Cleanup;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * WooCommerce class
 *
 * @package Dashboard Cleanup
 * @subpackage Cleanup
 */
final class Woocommerce extends Helpers\Singleton {

	/**
	 * Removes the 'Connect your store' WC admin notice
	 */
	public function connectStore($default) {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_CONNECT_STORE') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_CONNECT_STORE
		) {
			return $default;
		}

		// Done
		return true;
	}

	/**
	 * Removes the 'Products Block' WC admin notice
	 */
	public function productsBlock($default, $notice) {

		// Check proper notice
		if ('wootenberg' != $notice) {
			return $notice;
		}

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_PRODUCTS_BLOCK') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_PRODUCTS_BLOCK
		) {
			return $notice;
		}

		// Done
		return false;
	}

	/**
	 * Removes footer message `If you like WooCommerce please leave us a...`
	 */
	public function footerText($default) {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_FOOTER_TEXT') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_FOOTER_TEXT
		) {
			return $default;
		}

		// Done
		return false;
	}

	/**
	 * Removes Marketplace Suggestions on `Get More Options` product tab
	 */
	public function marketplaceSuggestions($default) {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_MARKETPLACE_SUGGESTIONS') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_MARKETPLACE_SUGGESTIONS
		) {
			return $default;
		}

		// Done
		return false;
	}

	/**
	 * Detect the WC settings page to grayout the suggestions checkbox
	 */
	public function grayedoutSuggestions() {

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_MARKETPLACE_SUGGESTIONS') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_MARKETPLACE_SUGGESTIONS
		) {
			return;
		}

		// Check current theme install screen
		$currentScreen = get_current_screen();
		if (empty($currentScreen) || empty($currentScreen->id) || 'woocommerce_page_wc-settings' != $currentScreen->id) {
			return;
		}

		// Enqueue inline styles
		add_action('admin_print_footer_scripts', [$this, 'grayedoutSuggestionsScript']);
	}

	/**
	 * Disables suggestions checkbox and add greyout style to wrapper label
	 */
	public function grayedoutSuggestionsScript() {
		$js = "jQuery(document).ready(function($) { ";
		$js .= "$('#woocommerce_show_marketplace_suggestions').prop('checked', false).prop('disabled', true).closest('label').css({ color: '#ccc', 'font-style': 'italic' });";
		$js .= "$('#woocommerce_allow_tracking').prop('checked', false).prop('disabled', true).closest('label').css({ color: '#ccc', 'font-style': 'italic' });";
		$js .= "});";
		echo '<script type="text/javascript">'.$js.'</script>'."\n";
	}

	/**
	 * Returns a fake tracker last sent timestamp in order to disable tracking
	 */
	public function trackerSendTime($default) {

// Debug point
//error_log('tracker before');

		// Last minute check
		if (
			defined('DASHBOARD_CLEANUP_WOOCOMMERCE_TRACKER') &&
			!DASHBOARD_CLEANUP_WOOCOMMERCE_TRACKER
		) {
			return $default;
		}

// Debug point
//error_log('tracker after');

		// Done
		return strtotime('+1 year');
	}
}