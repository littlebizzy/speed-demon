<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Embeds;

/**
 * Hooks class
 *
 * @package Speed Demon / Disable Embeds
 * @subpackage Embeds
 */
class Hooks {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin object
	 */
	private $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct($plugin) {

		// Plugin object
		$this->plugin = $plugin;

		// Init hook
		add_action('init', [$this, 'init'], PHP_INT_MAX);
	}



	/**
	 * WP init action
	 */
	public function init() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Actions and filters
		$this->handle();

		// Remove from query vars
		$this->plugin->factory->cleaner->queryVar();

		// Check allowed sources
		if ($this->plugin->allowed->detected()) {

			// Disallow oEmbed cache
			$this->plugin->factory->cleaner->oembedCache();

			// Process detected exceptions
			add_filter('oembed_providers',  [$this, 'providers']);
			add_filter('pre_oembed_result', [$this, 'preResults'], 10, 2);

		// No exceptions
		} else {

			// Remove from content
			$this->plugin->factory->cleaner->contentFilter();

			// Alter Tiny MCE plugins
			add_filter('tiny_mce_plugins', [$this->plugin->factory->cleaner, 'tinyMCE']);
		}
	}



	/**
	 * Handle hooks
	 */
	private function handle() {

		// Remove content feed filter
		remove_filter('the_content_feed', 			'_oembed_filter_feed_content');

		// Abort embed libraries loading
		remove_action('plugins_loaded', 			'wp_maybe_load_embeds', 0);

		// No auto-embedding support
		add_filter('pre_option_embed_autourls', 	'__return_false');

		// Avoid oEmbed auto discovery
		add_filter('embed_oembed_discover', 	 	'__return_false');

		// Remove REST API related hooks
		remove_action('rest_api_init', 				'wp_oembed_register_route');
		remove_filter('rest_pre_serve_request', 	'_oembed_rest_pre_serve_request', 10);

		// Remove header actions
		remove_action('wp_head', 					'wp_oembed_add_discovery_links');
		remove_action('wp_head', 					'wp_oembed_add_host_js');

		remove_action('embed_head', 				'enqueue_embed_scripts', 1);
		remove_action('embed_head', 				'print_emoji_detection_script');
		remove_action('embed_head', 				'print_embed_styles');
		remove_action('embed_head', 				'wp_print_head_scripts', 20);
		remove_action('embed_head', 				'wp_print_styles', 20);
		remove_action('embed_head', 				'wp_no_robots');
		remove_action('embed_head', 				'rel_canonical');
		remove_action('embed_head', 				'locale_stylesheet', 30);

		remove_action('embed_content_meta', 		'print_embed_comments_button');
		remove_action('embed_content_meta', 		'print_embed_sharing_button');

		remove_action('embed_footer', 				'print_embed_sharing_dialog');
		remove_action('embed_footer', 				'print_embed_scripts');
		remove_action('embed_footer', 				'wp_print_footer_scripts', 20);

		remove_filter('excerpt_more', 				'wp_embed_excerpt_more', 20);
		remove_filter('the_excerpt_embed', 			'wptexturize');
		remove_filter('the_excerpt_embed', 			'convert_chars');
		remove_filter('the_excerpt_embed', 			'wpautop');
		remove_filter('the_excerpt_embed', 			'shortcode_unautop');
		remove_filter('the_excerpt_embed', 			'wp_embed_excerpt_attachment');

		// Remove data and results filters
		remove_filter('oembed_dataparse', 			'wp_filter_oembed_result', 10);
		remove_filter('oembed_response_data', 		'get_oembed_response_data_rich', 10);
		remove_filter('pre_oembed_result', 			'wp_filter_pre_oembed_result', 10);

		// WooCommerce embeds in short description
		remove_filter('woocommerce_short_description', 'wc_do_oembeds');

		// Alter rewrite rules
		add_filter('rewrite_rules_array', [$this->plugin->factory->cleaner, 'rules']);
	}



	// WP filters
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Allow only specific providers
	 */
	public function providers($currentProviders) {

		// Check input value
		if (empty($currentProviders) || !is_array($currentProviders))
			return $currentProviders;

		// Init
		$providers = [];
		$allowedServices = $this->plugin->allowed->services();

		// Enum original providers
		foreach ($currentProviders as $regExp => $info) {

			// Check provider info
			if (empty($info) || !is_array($info))
				continue;

			// Breakdown URL parts
			$parts = @parse_url($info[0]);
			if (empty($parts) || !is_array($parts) || empty($parts['host']))
				continue;

			// Extract name from domain
			$domain = explode('.', $parts['host']);
			$domain = in_array($domain[0], ['www', 'api', 'publish', 'public-api', 'embed', 'read'])? $domain[1] : $domain[0];

			// Add provider if it match
			if (in_array(strtolower($domain), $allowedServices))
				$providers[$regExp] = $info;
		}

		// Done
		return $providers;
	}



	/**
	 * Filter pre-results to avoid automatic discover process
	 */
	public function preResults($result, $url) {

		// Filtered (by this plugin) providers;
		$oembed = _wp_oembed_get_object();
		if (empty($oembed->providers) || !is_array($oembed->providers))
			return '';

		/* From core WP_oEmbed class */

		$provider = false;

		foreach ( $oembed->providers as $matchmask => $data ) {
			list( $providerurl, $regex ) = $data;

			// Turn the asterisk-type provider URLs into regex
			if ( !$regex ) {
				$matchmask = '#' . str_replace( '___wildcard___', '(.+)', preg_quote( str_replace( '*', '___wildcard___', $matchmask ), '#' ) ) . '#i';
				$matchmask = preg_replace( '|^#http\\\://|', '#https?\://', $matchmask );
			}

			if ( preg_match( $matchmask, $url ) ) {
				$provider = str_replace( '{format}', 'json', $providerurl ); // JSON is easier to deal with than XML
				break;
			}
		}

		/* Back to plugin code */

		// Check allowed
		return empty($provider)? '' : $result;
	}



}