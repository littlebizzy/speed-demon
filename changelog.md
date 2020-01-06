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
