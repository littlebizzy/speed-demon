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
		'suggestions_message' 			=> '%plugin% recommends the following free plugins:',
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
		'message' => 'Sorry! For performance reasons, WordPress Multisite is not supported by <strong>%plugin%</strong>. Achieve top speed and security with a <a href="https://www.littlebizzy.com/hosting?utm_source=multisite" target="_blank">dedicated Nginx VPS</a> for every site.',

	], // End of admin-notices-ms



]; // End of main array
