<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Emojis\Emojis;

/**
 * Filters class
 *
 * @package Speed Demon / Disable Emojis
 * @subpackage Emojis
 */
class Filters extends Emojis {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Involved filters
	 */
	protected $filters = [
		'wp_staticize_emoji' => [
			'the_content_feed',
			'comment_text_rss',
		],
		'wp_staticize_emoji_for_email' => [
			'wp_mail',
		],
	];



	/**
	 * Partial matching URL
	 */
	protected $matchingURL = 's.w.org/images/core/emoji/';



	// WP hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Handle the WP init hook
	 */
	public function init() {

		// Last minute check
		if (!$this->plugin->enabled()) {
			return;
		}

		// Remove filters
		$this->remove('filters', $this->filters);

		// Modifications
		add_filter('tiny_mce_plugins',  [$this, 'tinyMCEPlugins']);
		add_filter('wp_resource_hints', [$this, 'removeDNSPrefetch'], 10, 2);
	}



	/**
	 * Handle tinyMCE supported plugins
	 */
	public function tinyMCEPlugins($plugins) {
		return (empty($plugins) || !is_array($plugins))? [] : array_diff($plugins, ['wpemoji']);
	}



	/**
	 * Remove emoji URL's from DNS prefetching hints
	 */
	public function removeDNSPrefetch($urls, $relation_type) {

		// Avoid non-dns-prefetch cases
		if ('dns-prefetch' != $relation_type)
			return $urls;

		// Initilize
		$newURLs = [];

		// Enum current values
		foreach ($urls as $index => $value) {

			// Check item
			$url = $value;
			if (is_array($url)) {

				// Copy attr
				$url = empty($url['href'])? null : $url['href'];
			}

			// Add item if not contains coincidences
			if (empty($url) || false === stripos($url, $this->matchingURL))
				$newURLs[] = $value;
		}

		// Done
		return $newURLs;
	}



}