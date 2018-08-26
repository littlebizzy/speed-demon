<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Embeds;

// Aliased namespaces
use \LittleBizzy\SpeedDemon\Helpers;

/**
 * Cleaner class
 *
 * @package Speed Demon / Disable Embeds
 * @subpackage Embeds
 */
class Cleaner extends Helpers\Singleton {



	/**
	 * Remove rules with embed rewrites
	 */
	public function rules($currentRules) {

		// Initialize
		$rules = [];

		// Enum current rules
		foreach ($currentRules as $rule => $rewrite) {

			// Check embed param
			if (false !== ($pos = strpos($rewrite, '?'))) {
				$params = explode('&', substr($rewrite, $pos + 1));
				if (in_array('embed=true', $params))
					continue;
			}

			// Add rule
			$rules[$rule] = $rewrite;
		}

		// Done
		return $rules;
	}



	/**
	 * Remove any related embed TinyMCE plugin
	 */
	public function tinyMCE($plugins) {
		return array_diff($plugins, array('wpembed', 'wpview'));
	}



	/**
	 * Remove the embed query var.
	 */
	public function queryVar() {
		global $wp;
		$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
	}



	/**
	 * Remove the_content filter
	 */
	public function contentFilter() {
		global $wp_embed;
		remove_filter('the_content', array($wp_embed, 'autoembed'), 8);
	}



	/**
	 * Disables oEmbed postmeta cache
	 */
	public function oembedCache() {
		global $wp_embed;
		$wp_embed->usecache = false;
		add_filter('oembed_ttl', '__return_zero');
	}



}