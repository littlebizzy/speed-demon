# Speed Demon

Performance hacks for WordPress

## Changelog

### 1.4.0
* bundled Dashboard Cleanup 1.1.2
* removed Index Autoload (included in WP Core after 5.3+)
* changed Remove Query Strings to be disabled by default (all constants)

### 1.3.2
* updated plugin meta

### 1.3.1
* updated plugin meta

### 1.3.0
* tested with WP 5.0
* bundled Disable Gutenberg (1.0.0) default = true
* bundled Disable WooCommerce Status (1.0.4) default = false
* bundled Disable WooCommerce Styles (1.0.1) default = false

### 1.2.2
* updated Minify HTML (1.0.1)
* (fixed bug in `REMOVE_EXTRA_SPACING` that was removing spaces before/after inline HTML tags)

### 1.2.1
* updated plugin meta

### 1.2.0
* bundled Minify HTML (1.0.0) default = true
* changed Inline Styles default = false
* changed Disable Admin-AJAX default = false
* optimized plugin code
* fixed PHP 5.x error... you're welcome, now upgrade to PHP 7.2! ;) e.g. `Parse error: syntax error, unexpected 'default' (T_DEFAULT), expecting identifier (T_STRING) in ../wp-content/plugins/speed-demon-littlebizzy/modules/remove-query-strings/core/filter.php on line 116`

### 1.1.0
* bundled Disable Admin-AJAX (1.0.0) default = true
* bundled Disable Cart Fragments (1.1.3) default = true
* bundled Disable jQuery Migrate (1.0.0) default = true
* bundled Header Cleanup (1.1.1) default = true
* bundled Index Autoload (1.1.1) default = true
* added recommended plugins notice
* added rating request notice

### 1.0.0
* initial release
* tested with PHP 7.0, 7.1, 7.2
* implemented PHP namespaces
* implemented object-oriented codebase
* added warning for Multisite installations
* bundled Delete Expired Transients (1.0.3) default = true
* bundled Disable Embeds (1.1.1) default = true
* bundled Disable Emojis (1.1.2) default = true
* bundled Disable Post Via Email (1.0.0) default = true
* bundled Disable XML-RPC (1.0.8) default = true
* bundled Inline Styles (1.1.0) default = true
* bundled Remove Query Strings (1.3.1) default = true

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
    define('INLINE_STYLES', false); // default = false
    define('MINIFY_HTML', true); // default = true
    define('MINIFY_HTML_INLINE_STYLES', true); // default = true
    define('MINIFY_HTML_INLINE_STYLES_COMMENTS', true); // default = true
    define('MINIFY_HTML_REMOVE_COMMENTS', true); // default = true
    define('MINIFY_HTML_REMOVE_CONDITIONALS', true); // default = true
    define('MINIFY_HTML_REMOVE_EXTRA_SPACING', true); // default = true
    define('MINIFY_HTML_REMOVE_HTML5_SELF_CLOSING', false); // default = false
    define('MINIFY_HTML_REMOVE_LINE_BREAKS', true); // default = true
    define('MINIFY_HTML_INLINE_SCRIPTS', false); // default = false
    define('MINIFY_HTML_INLINE_SCRIPTS_COMMENTS', false); // default = false
    define('MINIFY_HTML_UTF8_SUPPORT', true); // default = true
    define('REMOVE_QUERY_STRINGS', false); // default = false
    define('REMOVE_QUERY_STRINGS_ARGS', 'v,ver,version'); // default = v,ver,version

### Included Modules

* [Dashboard Cleanup](https://www.littlebizzy.com/plugins/dashboard-cleanup)
* [Delete Expired Transients](https://www.littlebizzy.com/plugins/delete-expired-transients)
* [Disable Admin-AJAX](https://www.littlebizzy.com/plugins/disable-admin-ajax)
* [Disable Cart Fragments](https://www.littlebizzy.com/plugins/disable-cart-fragments)
* [Disable Dashicons](https://www.littlebizzy.com/plugins/disable-dashicons)
* [Disable Embeds](https://www.littlebizzy.com/plugins/disable-embeds)
* [Disable Emojis](https://www.littlebizzy.com/plugins/disable-emojis)
* Disable Feeds
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
