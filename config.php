<?php

return [



	/**
	 * Admin notices configuration
	 */
	'admin-notices' => [

		/**
		 * Rate Us
		 * The %plugin% mark reflects the plugin name
		 */
		'days_before_display_rate_us' 	=> 2, // 2 days delay
		'days_dismissing_rate_us' 	=> 180, // 6 months reappear
		'rate_us_url'			=> 'https://wordpress.org/support/plugin/speed-demon-littlebizzy/reviews/?rate=5#new-post',
		'rate_us_url2'			=> 'https://www.facebook.com/groups/littlebizzy/',
		'rate_us_url3'			=> 'https://www.littlebizzy.com/services/speed-boost?utm_source=wpnotice',
		'rate_us_url4'			=> 'https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices#Disable_Nag_Notices',
		'rate_us_message' 		=> 'Thanks for using <strong>%plugin%</strong>. Please support our free work by rating this plugin with 5 stars on <a href="%url%" target="_blank">WordPress.org</a>.<br><br>You may also join our free <a href="%url2%" target="_blank">Facebook group</a> to post any questions or comments!<br><br>Cheers, Jesse<br><br>P.S. Use coupon code <code>SPEED20</code> to get $20 off our popular <a href="%url3%" target="_blank">Speed Boost</a> service at LittleBizzy.com.<br><br><small><em><a href="%url4%" target="_blank">Hide these notices</a></em></small>',

		/**
		 * Plugin suggestions
		 * The %plugin% mark reflects the plugin name
		 */
		'days_dismissing_suggestions' 	=> 180, // 6 months reappear
		'suggestions_message' 			=> "<strong>Speed Demon</strong> has no settings page. Instead, use the following defined constants to control functionality (default settings are shown below) by copying into your wp-config file (or using our free Custom Functions plugin) and changing their settings as desired (the more functions you can enable, the better performance you might achieve). These functions are powerful, but they follow all WordPress coding standards. <strong>If any given function crashes your site, it is either because your server does not support PHP 7+ (the current standard version for WordPress) or because you have a plugin or theme installed that does not follow best coding practices, so do us a favor and do not send us hate mail (or negative reviews) because of your horrible web hosting or terribly coded plugin or theme.</strong> You can also try testing things out first on a staging site first, if you want to be extra careful (though most sites are fine). In an emergency you can recover your crashed website by logging in to SFTP and deleting the plugin folder (wp-content/plugins/speed-demon-littlebizzy)<br><br>define('DELETE_EXPIRED_TRANSIENTS', true);<br>define('DELETE_EXPIRED_TRANSIENTS_HOURS', '6');<br>define('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME', '10');<br>define('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS', '50');<br>define('DISABLE_ADMIN_AJAX', false);<br>define('DISABLE_CART_FRAGMENTS', true);<br>define('DISABLE_EMBEDS', true);<br>define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'none');<br>define('DISABLE_EMOJIS', true);<br>define('DISABLE_GUTENBERG', true);<br>define('DISABLE_JQUERY_MIGRATE', true);<br>define('DISABLE_POST_VIA_EMAIL', true);<br>define('DISABLE_WOOCOMMERCE_STATUS', false);<br>define('DISABLE_WOOCOMMERCE_STYLES', false);<br>define('DISABLE_WOOCOMMERCE_STYLES_NAMES', 'select2');<br>define('DISABLE_WOOCOMMERCE_STYLES_PREFIXES', 'wc,woocommerce');<br>define('DISABLE_XML_RPC', true);<br>define('HEADER_CLEANUP', true);<br>define('INDEX_AUTOLOAD', true);<br>define('INDEX_AUTOLOAD_REGENERATE', false);<br>define('INLINE_STYLES', false);<br>define('MINIFY_HTML', true);<br>define('MINIFY_HTML_INLINE_STYLES', true);<br>define('MINIFY_HTML_INLINE_STYLES_COMMENTS', true);<br>define('MINIFY_HTML_REMOVE_COMMENTS', true);<br>define('MINIFY_HTML_REMOVE_CONDITIONALS', true);<br>define('MINIFY_HTML_REMOVE_EXTRA_SPACING', true);<br>define('MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING', false);<br>define('MINIFY_HTML_REMOVE_LINE_BREAKS', true);<br>define('MINIFY_HTML_INLINE_SCRIPTS', false);<br>define('MINIFY_HTML_INLINE_SCRIPTS_COMMENTS', false);<br>define('MINIFY_HTML_UTF8_SUPPORT', true);<br>define('REMOVE_QUERY_STRINGS', true);<br>define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version');<br><br><br><br>%plugin% recommends the following free plugins:",
		'suggestions'					=> [

			'cf-littlebizzy' => [
				'name' => 'CloudFlare',
				'desc' => 'Easily connect your WordPress website to free optimization features from CloudFlare, including one-click options to purge cache and enable dev mode.',
				'filename' => 'cloudflare.php',
			],

			'force-https-littlebizzy' => [
				'name' => 'Force HTTPS',
				'desc' => 'Redirects all HTTP requests to the HTTPS version and fixes all insecure static resources without altering the database (also works with CloudFlare).',
				'filename' => 'force-https.php',
			],

			'server-status-littlebizzy' => [
				'name' => 'Server Status',
				'desc' => 'Useful statistics about the server OS, CPU, RAM, load average, memory usage, IP address, hostname, timezone, disk space, PHP, MySQL, caches, etc.',
				'filename' => 'server-status.php',
			],

			'custom-functions-littlebizzy' => [
				'name' => 'Custom Functions',
				'desc' => 'Enables the ability to input custom WordPress functions such as filters in a centralized place to avoid the dependence on a theme functions.php file.',
				'filename' => 'custom-functions.php',
			],

			'duplicate-post-littlebizzy' => [
				'name' => 'Duplicate Post',
				'desc' => 'Easily duplicate (clone) any post, custom post, or page which are then saved in Draft mode, saving you tons of time and headache (no settings page).',
				'filename' => 'duplicate-post.php',
			],

		], // End of suggestions

	], // End of admin-notices



	'admin-notices-ms' => [

		/**
		 * Custom message
		 * The %plugin% mark reflects the plugin name
		 */
		'message' => 'For performance reasons, <strong>%plugin%</strong> does not support Multisite. For best results, always place your WordPress website on a <a href="https://www.littlebizzy.com/hosting?utm_source=multisite" target="_blank">dedicated Nginx server</a>.',

	], // End of admin-notices-ms



]; // End of main array
