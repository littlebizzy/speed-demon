<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Admin_Ajax\Core;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Core class
 *
 * @package Speed Demon / Disable Admin-AJAX
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Decompose referer
		$parts = @parse_url($_SERVER['HTTP_REFERER']);
		if (empty($parts) || !is_array($parts) || empty($parts['host']) || empty($parts['path']))
			return;

		// Local domain
		$local = @parse_url(home_url('/'));
		if (empty($local) || !is_array($local) || empty($local['host']))
			return;

		// Extract domains
		$refererDomain = ('www.' == substr($parts['host'], 0, 4))? substr($parts['host'], 4) : $parts['host'];
		$localDomain   = ('www.' == substr($local['host'], 0, 4))? substr($local['host'], 4) : $local['host'];

		// Exit for different domains
		if ($refererDomain != $localDomain)
			return;

		// Avoid WP admin referer calls
		if (false !== stripos($parts['path'], '/wp-admin/'))
			return;

		// This is the end
		wp_die('0', 400);
	}



}