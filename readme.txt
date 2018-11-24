=== Speed Demon (Performance Optimization Plugin) ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: loading slow, page speed, performance, speed optimization, speed up
Requires at least: 4.4
Tested up to: 5.0
Requires PHP: 7.2
Multisite support: No
Stable tag: 1.3.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: SPDDMN

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

== Description ==

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

* [**Join our FREE Facebook group for support**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/speed-demon-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/speed-demon)
* [Plugin GitHub](https://github.com/littlebizzy/speed-demon)

#### Current Features ####

* *Check Gzip Compression (1.4+)*
* *Combine Google Fonts (1.4+)*
* *Dashboard Cleanup (1.4+)*
    * Remove WordPress.org shortcuts
    * Remove "Thank you for creating with WordPress."
    * Remove "If you like WooCommerce please leave us a rating. A huge thanks in advance!"
    * Disable Welcome To WordPress admin notice
    * Disable Quick Draft dashboard widget
    * Disable WordPress Events and News dashboard widget
    * Disable Gutenberg admin notice
* *Database Cleanup (1.4+)*
    * [Delete Expired Transients](https://wordpress.org/plugins/delete-expired-transients-littlebizzy/)
    * *Delete Old Revisions (1.4+)*
    * *Delete Orphan Data (1.4+)*
    * [Index Autoload](https://wordpress.org/plugins/index-autoload-littlebizzy/)
* [Disable Admin-AJAX](https://wordpress.org/plugins/disable-admin-ajax-littlebizzy/)
* [Disable Cart Fragments](https://wordpress.org/plugins/disable-cart-fragments-littlebizzy/)
* [Disable Embeds](https://wordpress.org/plugins/disable-embeds-littlebizzy/)
    * Disable External Embeds (oEmbeds)
    * Disable Self Embeds (Internal Embeds)
    * (Allowed Sources supported)
* [Disable Emojis](https://wordpress.org/plugins/disable-emojis-littlebizzy/)
* *Disable Feeds (1.4+)*
    * Disable RSS Feeds
    * Disable Atom Feeds
* *Disable Gravatars (1.4+)*
* [Disable Gutenberg](https://wordpress.org/plugins/disable-gutenberg-littlebizzy/)
    * Disable Gutenberg block editor
    * Disable Gutenberg settings page
    * Disable Gutenberg admin notice
* [Disable jQuery Migrate](https://wordpress.org/plugins/disable-jq-migrate-littlebizzy/)
* *Disable Pinging (1.4+)*
    * Disable Update Services
* [Disable Post Via Email](https://wordpress.org/plugins/disable-post-via-email-littlebizzy/)
* *Disable REST API (1.4+)*
* *Disable Widgets (1.4+)*
* [Disable WooCommerce Status](https://wordpress.org/plugins/disable-wc-status-littlebizzy/)
* [Disable WooCommerce Styles](https://wordpress.org/plugins/disable-wc-styles-littlebizzy/)
* [Disable XML-RPC](https://wordpress.org/plugins/disable-xml-rpc-littlebizzy/)
    * Disable Pingbacks
    * Disable Self Ping (Pingbacks)
    * Disable Trackbacks
* [Header Cleanup](https://wordpress.org/plugins/header-cleanup-littlebizzy/)
    * Remove `adjacent_posts_rel_link`
    * Remove `adjacent_posts_rel_link_wp_head`
    * Remove `feed_links`
    * Remove `feed_links_extra`
    * Remove `index_rel_link`
    * Remove `parent_post_rel_link`
    * Remove `rest_output_link_wp_head`
    * Remove `rsd_link`
    * Remove `start_post_rel_link`
    * Remove `wc_generator_tag`
    * Remove `wlwmanifest_link`
    * Remove `wp_generator`
    * Remove `wp_resource_hints`
    * Remove `wp_shortlink_wp_head`
* *Inline Scripts (1.4+)*
* [Inline Styles](https://wordpress.org/plugins/inline-styles-littlebizzy/)
* *Lazy Load (1.4+)*
* *Limit WP Cron (1.4+)*
* *Limit Heartbeat (1.4+)*
* [Minify HTML](https://wordpress.org/plugins/minify-html-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* (more modules coming soon...)

#### Compatibility ####

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and usability reasons, we highly recommend avoiding WordPress Multisite for the vast majority of projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

#### Defined Constants ####

    /* Plugin Meta */
    define('DISABLE_NAG_NOTICES', true);

    /* Speed Demon Functions */
    define('DELETE_EXPIRED_TRANSIENTS', true);
    define('DELETE_EXPIRED_TRANSIENTS_HOURS', '6');
    define('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME', '10');
    define('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS', '50');
    define('DISABLE_ADMIN_AJAX', false);
    define('DISABLE_CART_FRAGMENTS', true);
    define('DISABLE_EMBEDS', true);
    define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'none');
    define('DISABLE_EMOJIS', true);
    define('DISABLE_GUTENBERG', true);
    define('DISABLE_JQUERY_MIGRATE', true);
    define('DISABLE_POST_VIA_EMAIL', true);
    define('DISABLE_WOOCOMMERCE_STATUS', false);
    define('DISABLE_WOOCOMMERCE_STYLES', false);
    define('DISABLE_WOOCOMMERCE_STYLES_NAMES', 'select2');
    define('DISABLE_WOOCOMMERCE_STYLES_PREFIXES', 'wc,woocommerce');
    define('DISABLE_XML_RPC', true);
    define('HEADER_CLEANUP', true);
    define('INDEX_AUTOLOAD', true);
    define('INDEX_AUTOLOAD_REGENERATE', false);
    define('INLINE_STYLES', false);
    define('MINIFY_HTML', true);
    define('MINIFY_HTML_INLINE_STYLES', true);
    define('MINIFY_HTML_INLINE_STYLES_COMMENTS', true);
    define('MINIFY_HTML_REMOVE_COMMENTS', true);
    define('MINIFY_HTML_REMOVE_CONDITIONALS', true);
    define('MINIFY_HTML_REMOVE_EXTRA_SPACING', true);
    define('MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING', false);
    define('MINIFY_HTML_REMOVE_LINE_BREAKS', true);
    define('MINIFY_HTML_INLINE_SCRIPTS', false);
    define('MINIFY_HTML_INLINE_SCRIPTS_COMMENTS', false);
    define('MINIFY_HTML_UTF8_SUPPORT', true);
    define('REMOVE_QUERY_STRINGS', true);
    define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version');

#### Technical Details ####

* Parent Plugin: N/A
* Disable Nag Notices: [Yes](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices#Disable_Nag_Notices)
* Settings Page: No
* PHP Namespaces: Yes
* Object-Oriented Code: Yes
* Includes Media (images, icons, etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * WP Options Table: Yes
  * Other Tables: No
  * Creates New Tables: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: [Yes](https://github.com/littlebizzy/autoloader)
* Multisite Support: No
* Uninstalls Data: Yes

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep these conditions in mind, and refrain from slandering, threatening, or harassing our team members in order to get a feature added, or to otherwise get "free" support. The only place you should be contacting us is in our free [**Facebook group**](https://www.facebook.com/groups/littlebizzy/) which has been setup for this purpose, or via GitHub if you are an experienced developer. Thank you!

== Installation ==

1. Upload to `/wp-content/plugins/speed-demon-littlebizzy`
2. Activate via WP Admin > Plugins
3. Test plugin is working:

After activating the plugin, all defined constants should work properly. Don't forget to purge all caches.

== Frequently Asked Questions ==

= What makes this plugin different from others? =

Speed Demon is a lightweight PHP-only plugin that bundles several of our popular performance micro-plugins into a single plugin. All functions can be controlled precisely using defined constants. The purpose of this plugin is to bundle several of our popular performance plugins into one single plugin for easier installation and management. In order to do this efficiently, however, Speed Demon maintains our popular "no settings page" approach to avoid database queries and instability/setup requirements. The most stable functions (sub-plugins) are enabled by default, while less predictable functions (sub-plugins) such as Inline Styles are disabled by default. In order to enable or disable any given function (sub-plugin) simply use the defined constants below inside your wp-config.php file or using our free Custom Functions plugin instead.

= Do all your plugins support the defined constants? =

Note: these defined constants are ONLY supported within Speed Demon. If you have one of these installed as a standalone plugin already, that function WILL REMAIN ENABLED until you disable the standalone version of the function. For example, if you disable Index Autoload in Speed Demon using a defined constant, but you still have our other Index Autoload plugin installed + enabled, then that function will continue to function until you disable or delete the standalone Index Autoload plugin. This allows for web hosts or other agencies to force-control their WordPress environment using our standalone plugins.

= How can I change this plugin's settings? =

There is no settings page. To enable/disable a certain function (sub-plugin) use the defined constants only.

= Why don't you have a settings page? =

Because that would mean database queries and more time/hassle/confusion for setup. No settings page means web developers, agencies, or web hosts can automate their WordPress setups (such as with Bash scripts, etc) much faster and easier, and clients have less chance of accidentally messing things up by snooping around a settings page.

= Does it work alongside XYZ plugin? =

Yes, it will work no matter what plugins/theme you have installed, there should be no conflicts. However we don't recommend using other similar performance plugins at the same time as Speed Demon to avoid conflicts or redundancy.

= My site looks horrible after installing this? =

Turn off Inline Styles using the defined constant `define('INLINE_STYLES', 'false');` and consider ditching whatever bloated and horribly coded plugin is causing the problem, such as janky "slider" plugins, etc. Also ensure you are using PHP 7+

= Why don't you support defer, async, or concantenation of JS/CSS files? =

No serious website uses these methods. Don't believe us? Check the Alexa Top 100 sites and look at their source code. You will never see any high traffic or serious website using these methods because they are so risky. "But PageSpeed Insights told me to! I'm scared of Google!" ... do what you wish, we know from experience it will not help your rankings (or speed, in the vast majority of cases... and no, "scores" are not the same as "speed"). Rather than altering or manipulating the loading order (or loading location) of JS/CSS it makes much more sense to only install plugins or themes from quality authors, who should be trusted to load JS/CSS resources how and where they want. The only method we currently support is inlining all CSS stylesheets, which should work fine on 90% of WordPress sites (bloated/unstable plugins like sliders may have an issue). Likewise, many JS scripts inherently support defer/async, such as Google's Universal Analytics snippet. We don't believe in "hacky" solutions, but rather in trusting code sources to handle these things (in other words, choose your software wisely). Lastly, if you really want to concatenate all your JS into one crap-pile, it would be better to let you CDN provider do this for you (such as CloudFlare's free RocketLoader feature) rather than bundling your JS into some nasty temp file on your origin server.

= What if I already have the corresponding micro-plugin installed? =

Each module checks some constant(s) and class(es) from the original plugin release, and if some are detected then aborts the module execution. this is the sequence when a module ask if can continue the execution:

* First check the existence of the corresponding module constants (REMOVE_QUERY_STRINGS, DISABLE_XML_RPC) and stops the module execution if defined with a false value.
* Next step looks for a inherent constant of the original plugin to check if is running (RMQRST_FILE for Remove Query Strings, \LittleBizzy\DisableEmojis\FILE for Disable Emojis, etc.), aborting if detect the previous plugin.
* Sometimes the original plugin does not have a constant (code from other developers), so just in case checks the plugin class existence (\LB_Disable_XML_RPC etc.)
* But these checks do not do anything with the original plugin optional constants: REMOVE_QUERY_STRINGS_ARGS, DELETE_EXPIRED_TRANSIENTS_HOURS, etc.)

These checks of existing constants and classes are performed as late as possible, in order to give time to execute these constants/classes from different locations: wp-config.php, other plugins, functions.php from theme, etc.

= Technically speaking, how does it check for micro-plugin code? =

Some modules code have changes from the original due the common module/plugin adaptation mechanisms, but I tried to keep the original code fragments (Always will need small changes: namespaces, a separated main module folder, calls to check if the module is enabled, unified activation/deactivacion/uninstall hooks, etc.)

Regarding the modules:

- Remove Query Strings
The cancellation check works right on the style and loader filters.

- Disable XML-RPC
The last minute check occurs after the WP init hook. I have reorganized the plugin structure to fit the common module mechanism.

- Disable Embeds
Checks constants/classes at the beginning and after the init hook. Tested the correct execution on activation/deactivation hooks.

- Disable Emojis
Checks constants/classes at first and also after the init hook.

- Index Autoload
Checks constants/classes after the init hook. Tested the index removal and internal option deleted (used to save the timestamp) on plugin uninstall.

- Delete Expired Transients
Checking on start and under cron event execution.

- Disable Post Via Email
Just checks on start, it is not possible to check the module later due the early execution in wp-mail.php

- Inline Styles
Checks on start, and on the `wp_loaded` hook.

- Disable Admin-AJAX
The associated constant must be defined at the wp-config.php level because this module does not use any wp hook and runs at the same time of the plugin execution.

- Disable Cart Fragments
There is a conflict with previous constant DISABLE_CART_FRAGMENTS, which if exists is expected to be an array from the old plugin. The new module supports the different data types (boolean or array), but if the constant remains boolean and the old plugin is activated, then the `true`value is interpreted as page 1 (due the type casting).
The last check looking if the module is enabled works just before to remove the enqueued carts fragments scripts, so this module constant can be located anywhere.

- Disable jQuery Migrate
Module is checked on the wp_default_scripts WP core hook, so the module constant can be defined in any place.

- Header Cleanup
Plugin functionality is checked at WP init hook, so the module constant can be defined anywhere.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Join our Facebook group instead.

== Changelog ==

= 1.3.1 =
* updated plugin meta

= 1.3.0 =
* tested with WP 5.0
* bundled Disable Gutenberg (1.0.0) default = true
* bundled Disable WooCommerce Status (1.0.4) default = false
* bundled Disable WooCommerce Styles (1.0.1) default = false

= 1.2.2 =
* updated Minify HTML (1.0.1)
* (fixed bug in REMOVE_EXTRA_SPACING that was removing spaces before/after inline HTML tags)

= 1.2.1 =
* updated plugin meta

= 1.2.0 =
* bundled Minify HTML (1.0.0) default = true
* changed Inline Styles default = false
* changed Disable Admin-AJAX default = false
* optimized plugin code
* fixed PHP 5.x error... you're welcome, now upgrade to PHP 7.2! ;) e.g. `Parse error: syntax error, unexpected 'default' (T_DEFAULT), expecting identifier (T_STRING) in ../wp-content/plugins/speed-demon-littlebizzy/modules/remove-query-strings/core/filter.php on line 116`

= 1.1.0 =
* bundled Disable Admin-AJAX (1.0.0) default = true
* bundled Disable Cart Fragments (1.1.3) default = true
* bundled Disable jQuery Migrate (1.0.0) default = true
* bundled Header Cleanup (1.1.1) default = true
* added recommended plugins notice
* added rating request notice

= 1.0.0 =
* initial release
* tested with PHP 7.0
* tested with PHP 7.1
* tested with PHP 7.2
* implemented PHP namespaces
* impelmented object-oriented codebase
* added warning for Multisite installations
* bundled Delete Expired Transients (1.0.3) default = true
* bundled Disable Embeds (1.1.1) default = true
* bundled Disable Emojis (1.1.2) default = true
* bundled Disable Post Via Email (1.0.0) default = true
* bundled Disable XML-RPC (1.0.8) default = true
* bundled Index Autoload (1.1.1) default = true
* bundled Inline Styles (1.1.0) default = true
* bundled Remove Query Strings (1.3.1) default = true
