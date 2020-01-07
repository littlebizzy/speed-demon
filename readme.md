# Speed Demon

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

* [Plugin Homepage](https://www.littlebizzy.com/plugins/speed-demon)
* [Download Latest Version (ZIP)](https://github.com/littlebizzy/speed-demon/archive/v1.4.0.zip)
* [**Become A LittleBizzy.com Member Today!**](https://www.littlebizzy.com/members)

### Defined Constants

    /** Speed Demon Functions v1.4.0 */
    define('DASHBOARD_CLEANUP', true); // default = true
    define('DASHBOARD_CLEANUP_ADD_PLUGIN_TABS', true); // default = true
    define('DASHBOARD_CLEANUP_ADD_THEME_TABS', true); // default = true
    define('DASHBOARD_CLEANUP_CSS_ADMIN_NOTICE', true); // default = true
    define('DASHBOARD_CLEANUP_DISABLE_SEARCH', true); // default = true
    define('DASHBOARD_CLEANUP_EVENTS_AND_NEWS', true); // default = true
    define('DASHBOARD_CLEANUP_IMPORT_EXPORT_MENU', true); // default = true
    define('DASHBOARD_CLEANUP_LINK_MANAGER_MENU', true); // default = true
    define('DASHBOARD_CLEANUP_QUICK_DRAFT', true); // default = true
    define('DASHBOARD_CLEANUP_THANKS_FOOTER', true); // default = true
    define('DASHBOARD_CLEANUP_WELCOME_TO_WORDPRESS', true); // default = true
    define('DASHBOARD_CLEANUP_WOOCOMMERCE_CONNECT_STORE', true); // default = true
    define('DASHBOARD_CLEANUP_WOOCOMMERCE_FOOTER_TEXT', true); // default = true
    define('DASHBOARD_CLEANUP_WOOCOMMERCE_MARKETPLACE_SUGGESTIONS', true); // default = true
    define('DASHBOARD_CLEANUP_WOOCOMMERCE_PRODUCTS_BLOCK', true); // default = true
    define('DASHBOARD_CLEANUP_WOOCOMMERCE_TRACKER', true); // default = true
    define('DASHBOARD_CLEANUP_WP_ORG_SHORTCUT_LINKS', true);  // default = true
    define('DELETE_EXPIRED_TRANSIENTS', true); // default = true
    define('DELETE_EXPIRED_TRANSIENTS_HOURS', '6'); // default = 6
    define('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME', '10'); // default = 10
    define('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS', '50'); // default = 50
    define('DISABLE_ADMIN_AJAX', false); // default = false
    define('DISABLE_CART_FRAGMENTS', true); // default = true
    define('DISABLE_EMBEDS', true); // default = true
    define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'none'); // default = (none)
    define('DISABLE_EMOJIS', true); // default = true
    define('DISABLE_GUTENBERG', true); // default = true
    define('DISABLE_JQUERY_MIGRATE', true); // default = true
    define('DISABLE_POST_VIA_EMAIL', true); // default = true
    define('DISABLE_WOOCOMMERCE_STATUS', false); // default = false
    define('DISABLE_WOOCOMMERCE_STYLES', false); // default = false
    define('DISABLE_WOOCOMMERCE_STYLES_NAMES', 'select2'); // default = select2
    define('DISABLE_WOOCOMMERCE_STYLES_PREFIXES', 'woocommerce,wc'); // default = woocommerce,wc
    define('DISABLE_XML_RPC', true); // default = true
    define('HEADER_CLEANUP', true); // default = true
    define('INLINE_STYLES', false); // default = true
    define('MINIFY_HTML', true); // default = true
    define('MINIFY_HTML_INLINE_STYLES', true); // default = true
    define('MINIFY_HTML_INLINE_STYLES_COMMENTS', true); // default = true
    define('MINIFY_HTML_REMOVE_COMMENTS', true); // default = true
    define('MINIFY_HTML_REMOVE_CONDITIONALS', true); // default = true
    define('MINIFY_HTML_REMOVE_EXTRA_SPACING', true); // default = true
    define('MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING', false); // default = true
    define('MINIFY_HTML_REMOVE_LINE_BREAKS', true); // default = true
    define('MINIFY_HTML_INLINE_SCRIPTS', false); // default = true
    define('MINIFY_HTML_INLINE_SCRIPTS_COMMENTS', false); // default = true
    define('MINIFY_HTML_UTF8_SUPPORT', true); // default = true
    define('REMOVE_QUERY_STRINGS', false); // default = false
    define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version'); // default = v,ver,version

### Included Modules

* [Dashboard Cleanup](https://www.littlebizzy.com/plugins/dashboard-cleanup)
* [Delete Expired Transients](https://www.littlebizzy.com/plugins/delete-expired-transients)
* [Disable Admin-AJAX](https://www.littlebizzy.com/plugins/disable-admin-ajax)
* [Disable Cart Fragments](https://www.littlebizzy.com/plugins/disable-cart-fragments)
* [Disable Embeds](https://www.littlebizzy.com/plugins/disable-embeds)
* [Disable Emojis](https://www.littlebizzy.com/plugins/disable-emojis)
* [Disable Gutenberg](https://www.littlebizzy.com/plugins/disable-gutenberg)
* [Disable jQuery Migrate](https://www.littlebizzy.com/plugins/disable-jquery-migrate)
* [Disable Post Via Email](https://www.littlebizzy.com/plugins/disable-post-via-email)
* Disable Thumbnail Regeneration
* [Disable WooCommerce Status](https://www.littlebizzy.com/plugins/disable-woocommerce-status)
* [Disable WooCommerce Styles](https://www.littlebizzy.com/plugins/disable-woocommerce-styles)
* [Disable XML-RPC](https://www.littlebizzy.com/plugins/disable-xml-rpc)
* [Header Cleanup](https://www.littlebizzy.com/plugins/header-cleanup)
* [Inline Styles](https://www.littlebizzy.com/plugins/inline-styles)
* [Minify HTML](https://www.littlebizzy.com/plugins/minify-html)
* [Remove Query Strings](https://www.littlebizzy.com/plugins/remove-query-strings)

### Compatibility

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant primarily for single site WordPress installations — for both performance and usability reasons, we strongly recommend avoiding WordPress Multisite for the vast majority of your projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins (meaning that they load first, and cannot be deactivated) by using our free [Autoloader](https://www.littlebizzy.com/plugins/autoloader) script in the `mu-plugins` directory.

### Our Philosophy

> "Decisions, not options." — **WordPress.org**

> "Everything should be made as simple as possible, but not simpler." — **Albert Einstein** (et al)

> "Write programs that do one thing and do it well... write programs to work together." — **Doug McIlroy**

> "The innovation that this industry talks about so much is bullshit. Anybody can innovate... 99% of it is 'get the work done.' The real work is in the details." — **Linus Torvalds**

### Support Issues

We welcome experienced developers to submit Pull Requests to the Master branch, although opening a new Issue (instead) is usually more helpful so that users can discuss the topic. Please become a [**LittleBizzy.com Member**](https://www.littlebizzy.com/members) if your company requires official support, and keep in mind that GitHub is for code development and not customer service.
