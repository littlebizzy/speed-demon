=== Speed Demon ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: speed, performance, tweaks, loading, time
Requires at least: 4.4
Tested up to: 4.9
Requires PHP: 7.2
Multisite support: No
Stable tag: 1.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: SPDDMN

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

== Description ==

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

* [**Join our FREE Facebook group for support!**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/speed-demon-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/speed-demon)
* [Plugin GitHub](https://github.com/littlebizzy/speed-demon)

*Our related OSS projects:*

* [SlickStack (LEMP stack automation)](https://slickstack.io)
* [WP Lite boilerplate](https://wplite.org)
* [Starter Theme](https://starter.littlebizzy.com)

#### The Long Version ####

1.0.0 = BETA VERSION (we will be adding more features gradually). The purpose of this plugin is to bundle several of our popular performance plugins into one single plugin for easier installation and management. In order to do this efficiently, however, Speed Demon maintains our popular "no settings page" approach to avoid database queries and instability/setup requirements. The most stable functions (sub-plugins) are enabled by default, while less predictable functions (sub-plugins) such as Inline Styles are disabled by default. In order to enable or disable any given function (sub-plugin) simply use the defined constants below inside your wp-config.php file or using our free Custom Functions plugin instead.

Note: these defined constants are ONLY supported within Speed Demon. If you have one of these installed as a standalone plugin already, that function WILL REMAIN ENABLED until you disable the standalone version of the function. For example, if you disable Index Autoload in Speed Demon using a defined constant, but you still have our other Index Autoload plugin installed + enabled, then that function will continue to function until you disable or delete the standalone Index Autoload plugin. This allows for web hosts or other agencies to force-control their WordPress environment using our standalone plugins.

Below are all included sub-plugins along with their default values:

* define('REMOVE_QUERY_STRINGS', 'true');
* define('DISABLE_EMBEDS', 'true');
* define('DISABLE_EMOJIS', 'true');
* define('DISABLE_XML_RPC', 'true');
* define('INDEX_AUTOLOAD', 'true');
* define('DELETE_EXPIRED_TRANSIENTS', 'true');
* define('DISABLE_POST_VIA_EMAIL', 'true');
* define('INLINE_STYLES', 'true');

===

Developer notes 1.0.0

- The constant that controls the plugin (the one with the same plugin/module name) when it does not exists or has the value `true`is when it allows the module execution, and with a `false`value it prevents the execution

- Each module checks some constant(s) and class(es) from the original plugin release, and if some are detected then aborts the module execution. this is the sequence when a module ask if can continue the execution:

- First check the existence of the corresponding module constants (REMOVE_QUERY_STRINGS, DISABLE_XML_RPC) and stops the module execution if defined with a false value.
- Next step looks for a inherent constant of the original plugin to check if is running (RMQRST_FILE for Remove Query Strings, \LittleBizzy\DisableEmojis\FILE for Disable Emojis, etc.), aborting if detect the previous plugin.
- Sometimes the original plugin does not have a constant (code from other developers), so just in case checks the plugin class existence (\LB_Disable_XML_RPC etc.)
- But these checks do not do anything with the original plugin optional constants: REMOVE_QUERY_STRINGS_ARGS, DELETE_EXPIRED_TRANSIENTS_HOURS, etc.)

- These checks of existing constants and classes are performed as late as possible, in order to give time to execute these constants/classes from different locations: wp-config.php, other plugins, functions.php from theme, etc.

===

- Some modules code have changes from the original due the common module/plugin adaptation mechanisms, but I tried to keep the original code fragments (Always will need small changes: namespaces, a separated main module folder, calls to check if the module is enabled, unified activation/deactivacion/uninstall hooks, etc.)

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

===

#### Compatibility ####

This plugin has been designed for use on LEMP (Nginx) web servers with PHP 7.0 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and security reasons, we highly recommend against using WordPress Multisite for the vast majority of projects.

Note: Any WordPress plugin may also be loaded as "Must-Use" by using the [Autoloader](https://github.com/littlebizzy/autoloader) script within the `mu-plugins` directory.

#### Defined Constants ####

The following defined constants are supported by this plugin:

* define('DISABLE_NAG_NOTICES', true);
* define('REMOVE_QUERY_STRINGS', 'true');
* define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version');
* define('DISABLE_EMBEDS', 'true');
* define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'twitter, youtube');
* define('DISABLE_EMOJIS', 'true');
* define('DISABLE_XML_RPC', 'true');
* define('INDEX_AUTOLOAD', 'true');
* define('INDEX_AUTOLOAD_REGENERATE', true);
* define('DELETE_EXPIRED_TRANSIENTS', 'true');
* define('DELETE_EXPIRED_TRANSIENTS_HOURS', '6');
* define('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME', '10');
* define('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS', '50');
* define('DISABLE_POST_VIA_EMAIL', 'true');
* define('INLINE_STYLES', 'true');

#### Plugin Features ####

* Premium Version: [**Speed Demon**](https://www.littlebizzy.com/plugins/speed-demon)
* Settings Page: No
* PHP Namespaces: Yes
* Object-Oriented Code: Yes
* Includes Media (images, icons, etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
  * Table Data: Yes
  * Creates New Tables: No
* Database Queries: Backend Only 
  * Query Types: Options API
* Multisite Support: No
* Uninstalls Data: Yes

#### Nag Notices ####

This plugin generates multiple [Admin Notices](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices) in the WP Admin dashboard. The first is a notice that fires during plugin activation which recommends several related free plugins that we believe will enhance this plugin's features; this notice will re-appear approximately once every 6 months as our code and recommendations evolve. The second is a notice that fires a few days after plugin activation which asks for a 5-star rating of this plugin on its WordPress.org profile page. This notice will re-appear approximately once every 9 months. These notices can be dismissed by clicking the **(x)** symbol in the upper right of the notice box. These notices may annoy or confuse certain users, but are appreciated by the majority of our userbase, who understand that these notices support our free contributions to the WordPress community while providing valuable (free) recommendations for optimizing their website.

If you feel that these notices are too annoying, than we encourage you to consider one or more of our upcoming premium plugins that combine several free plugin features into a single control panel, or even consider developing your own plugins for WordPress, if supporting free plugin authors is too frustrating for you. A final alternative would be to place the defined constant mentioned below inside of your `wp-config.php` file to manually hide this plugin's nag notices:

    define('DISABLE_NAG_NOTICES', true);

Note: This defined constant will only affect the notices mentioned above, and will not affect any other notices generated by this plugin or other plugins, such as one-time notices that communicate with admin-level users.

#### Inspiration ####

* n/a

#### Free Plugins ####

* [404 To Homepage](https://wordpress.org/plugins/404-to-homepage-littlebizzy/)
* [Autoloader](https://github.com/littlebizzy/autoloader)
* [CloudFlare](https://wordpress.org/plugins/cf-littlebizzy/)
* [Custom Functions](https://wordpress.org/plugins/custom-functions-littlebizzy/)
* [Delete Expired Transients](https://wordpress.org/plugins/delete-expired-transients-littlebizzy/)
* [Disable Admin-AJAX](https://wordpress.org/plugins/disable-admin-ajax-littlebizzy/)
* [Disable Author Pages](https://wordpress.org/plugins/disable-author-pages-littlebizzy/)
* [Disable Cart Fragments](https://wordpress.org/plugins/disable-cart-fragments-littlebizzy/)
* [Disable Embeds](https://wordpress.org/plugins/disable-embeds-littlebizzy/)
* [Disable Emojis](https://wordpress.org/plugins/disable-emojis-littlebizzy/)
* [Disable Empty Trash](https://wordpress.org/plugins/disable-empty-trash-littlebizzy/)
* [Disable Image Compression](https://wordpress.org/plugins/disable-image-compression-littlebizzy/)
* [Disable jQuery Migrate](https://wordpress.org/plugins/disable-jq-migrate-littlebizzy/)
* [Disable Search](https://wordpress.org/plugins/disable-search-littlebizzy/)
* [Disable WooCommerce Status](https://wordpress.org/plugins/disable-wc-status-littlebizzy/)
* [Disable WooCommerce Styles](https://wordpress.org/plugins/disable-wc-styles-littlebizzy/)
* [Disable XML-RPC](https://wordpress.org/plugins/disable-xml-rpc-littlebizzy/)
* [Download Media](https://wordpress.org/plugins/download-media-littlebizzy/)
* [Download Plugin](https://wordpress.org/plugins/download-plugin-littlebizzy/)
* [Download Theme](https://wordpress.org/plugins/download-theme-littlebizzy/)
* [Duplicate Post](https://wordpress.org/plugins/duplicate-post-littlebizzy/)
* [Enable Subtitles](https://wordpress.org/plugins/enable-subtitles-littlebizzy/)
* [Export Database](https://wordpress.org/plugins/export-database-littlebizzy/)
* [Facebook Pixel](https://wordpress.org/plugins/fb-pixel-littlebizzy/)
* [Force HTTPS](https://wordpress.org/plugins/force-https-littlebizzy/)
* [Force Strong Hashing](https://wordpress.org/plugins/force-strong-hashing-littlebizzy/)
* [Google Analytics](https://wordpress.org/plugins/ga-littlebizzy/)
* [Header Cleanup](https://wordpress.org/plugins/header-cleanup-littlebizzy/)
* [Index Autoload](https://wordpress.org/plugins/index-autoload-littlebizzy/)
* [Maintenance Mode](https://wordpress.org/plugins/maintenance-mode-littlebizzy/)
* [Profile Change Alerts](https://wordpress.org/plugins/profile-change-alerts-littlebizzy/)
* [Remove Category Base](https://wordpress.org/plugins/remove-category-base-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* [Server Status](https://wordpress.org/plugins/server-status-littlebizzy/)
* [StatCounter](https://wordpress.org/plugins/sc-littlebizzy/)
* [View Defined Constants](https://wordpress.org/plugins/view-defined-constants-littlebizzy/)
* [Virtual Robots.txt](https://wordpress.org/plugins/virtual-robotstxt-littlebizzy/)

#### Premium Plugins ####

* [**Members Only**](https://www.littlebizzy.com/members)
* [Dunning Master](https://www.littlebizzy.com/plugins/dunning-master)
* [Genghis Khan](https://www.littlebizzy.com/plugins/genghis-khan)
* [Great Migration](https://www.littlebizzy.com/plugins/great-migration)
* [Security Guard](https://www.littlebizzy.com/plugins/security-guard)
* [SEO Genius](https://www.littlebizzy.com/plugins/seo-genius)
* [Speed Demon](https://www.littlebizzy.com/plugins/speed-demon)

#### Special Thanks ####

* [Alex Georgiou](https://www.alexgeorgiou.gr)
* [Automattic](https://automattic.com)
* [Brad Touesnard](https://bradt.ca)
* [Daniel Auener](http://www.danielauener.com)
* [Delicious Brains](https://deliciousbrains.com)
* [Greg Rickaby](https://gregrickaby.com)
* [Matt Mullenweg](https://ma.tt)
* [Mika Epstein](https://halfelf.org)
* [Mike Garrett](https://mikengarrett.com)
* [Samuel Wood](http://ottopress.com)
* [Scott Reilly](http://coffee2code.com)
* [Jan Dembowski](https://profiles.wordpress.org/jdembowski)
* [Jeff Starr](https://perishablepress.com)
* [Jeff Chandler](https://jeffc.me)
* [Jeff Matson](https://jeffmatson.net)
* [Jeremy Wagner](https://jeremywagner.me)
* [John James Jacoby](https://jjj.blog)
* [Leland Fiegel](https://leland.me)
* [Paul Irish](https://www.paulirish.com)
* [Rahul Bansal](https://profiles.wordpress.org/rahul286)
* [Roots](https://roots.io)
* [rtCamp](https://rtcamp.com)
* [Ryan Hellyer](https://geek.hellyer.kiwi)
* [WP Chat](https://wpchat.com)
* [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep the above-mentioned goals in mind... thanks!

== Installation ==

1. Upload to `/wp-content/plugins/speed-demon-littlebizzy`
2. Activate via WP Admin > Plugins
3. Test plugin is working

== Frequently Asked Questions ==

= How can I change this plugin's settings? =

There is no settings page. To enable/disable a certain function (sub-plugin) use the defined constants only.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Join our Facebook group instead.

== Changelog ==

= 1.0.0 =
* initial release
* tested with PHP 7.0
* tested with PHP 7.1
* tested with PHP 7.2
* bundles Remove Query Strings 1.3.1
* bundles Disable Embeds 1.1.1
* bundles Disable Emojis 1.1.2
* bundles Disable XML-RPC 1.0.8
* bundles Index Autoload 1.1.1
* bundles Delete Expired Transients 1.0.3
* bundles Disable Post Via Email 1.0.0
* bundles Inline Styles 1.1.0
* define('DISABLE_NAG_NOTICES', true);
* define('REMOVE_QUERY_STRINGS', 'true');
* define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version');
* define('DISABLE_EMBEDS', 'true');
* define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'twitter, youtube');
* define('DISABLE_EMOJIS', 'true');
* define('DISABLE_XML_RPC', 'true');
* define('INDEX_AUTOLOAD', 'true');
* define('INDEX_AUTOLOAD_REGENERATE', true);
* define('DELETE_EXPIRED_TRANSIENTS', 'true');
* define('DELETE_EXPIRED_TRANSIENTS_HOURS', '6');
* define('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME', '10');
* define('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS', '50');
* define('DISABLE_POST_VIA_EMAIL', 'true');
* define('INLINE_STYLES', 'true');
