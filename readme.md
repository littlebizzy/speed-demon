# Speed Demon

A powerful bundle of lightweight tweaks that drastically improve the loading speed of WordPress by reducing bloat and improving overall efficiency.

* [Plugin Homepage](https://www.littlebizzy.com/plugins/speed-demon)
* [Download Latest Version (ZIP)](https://github.com/littlebizzy/speed-demon/archive/1.3.1.zip)
* [**Become A LittleBizzy.com Member Today!**](https://www.littlebizzy.com/members)

### Defined Constants

    /* Plugin Meta */
    define('AUTOMATIC_UPDATE_PLUGINS', false); // default = false
    define('DISABLE_NAG_NOTICES', true); // default = true

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
    define('DISABLE_WOOCOMMERCE_STYLES_PREFIXES', 'woocommerce,wc');
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
    
### Included Modules

* Dashboard Cleanup
* [Delete Expired Transients](https://github.com/littlebizzy/delete-expired-transients)
* [Disable Admin-AJAX](https://github.com/littlebizzy/disable-admin-ajax)
* [Disable Cart Fragments](https://github.com/littlebizzy/disable-cart-fragments)
* [Disable Embeds](https://github.com/littlebizzy/disable-embeds)
* [Disable Emojis](https://github.com/littlebizzy/disable-emojis)
* [Disable Gutenberg](https://github.com/littlebizzy/disable-gutenberg)
* [Disable jQuery Migrate](https://github.com/littlebizzy/disable-jquery-migrate)
* [Disable Post Via Email](https://github.com/littlebizzy/disable-post-via-email)
* Disable Thumbnail Regeneration
* [Disable WooCommerce Status](https://github.com/littlebizzy/disable-woocommerce-status)
* [Disable WooCommerce Styles](https://github.com/littlebizzy/disable-woocommerce-styles)
* [Disable XML-RPC](https://github.com/littlebizzy/disable-xml-rpc)
* [Header Cleanup](https://github.com/littlebizzy/header-cleanup)
* [Index Autoload](https://github.com/littlebizzy/index-autoload)
* [Inline Styles](https://github.com/littlebizzy/inline-styles)
* [Minify HTML](https://github.com/littlebizzy/minify-html)
* [Remove Query Strings](https://github.com/littlebizzy/remove-query-strings)

### Compatibility

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only — for both performance and usability reasons, we strongly recommend avoiding WordPress Multisite for the vast majority of your projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins (meaning that they load first, and cannot be deactivated) by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

### Our Philosophy

> "Decisions, not options." — WordPress.org

> "Everything should be made as simple as possible, but not simpler." — Albert Einstein, et al

> "Write programs that do one thing and do it well... write programs to work together." — Doug McIlroy

> "The innovation that this industry talks about so much is bullshit. Anybody can innovate... 99% of it is 'get the work done.' The real work is in the details." — Linus Torvalds

### Support Issues

Please do not submit Pull Requests. Instead, kindly create a new Issue with relevant information if you are an experienced developer, otherwise you may become a [**LittleBizzy.com Member**](https://www.littlebizzy.com/members) if your company requires official support.
