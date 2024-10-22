<?php
/*
Module Name: Disable XML-RPC
Module URI: https://www.littlebizzy.com/plugins/disable-xml-rpc
Description: Disables all XML-RPC functions
Version: 2.0.1
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Disable XML-RPC API completely
add_filter('xmlrpc_enabled', '__return_false');

// Immediately terminate any XML-RPC requests
add_action('xmlrpc_call', function() {
    header('HTTP/1.1 403 Forbidden');
    exit;
});

// Remove RSD (Really Simple Discovery) link from the head
remove_action('wp_head', 'rsd_link');

// Disable pingbacks and trackbacks by default
add_filter('pre_option_default_ping_status', '__return_zero');
add_filter('pre_option_default_pingback_flag', '__return_zero');

// Hide pingback and trackback options on the Discussion settings page
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'options-discussion.php') {
        wp_add_inline_style('dashboard', '
            .form-table td label[for="default_pingback_flag"], 
            .form-table td label[for="default_pingback_flag"] + br, 
            .form-table td label[for="default_ping_status"], 
            .form-table td label[for="default_ping_status"] + br {
                display: none;
            }
        ');
    }
});

// Remove X-Pingback header to obscure XML-RPC URL
add_filter('wp_headers', function ($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});

// Disable all XML-RPC methods related to authentication, content, taxonomy, and comments
add_filter('xmlrpc_methods', function ($methods) {
    // Disable all XML-RPC methods that could expose user information or provide entry points
    unset($methods['pingback.ping']);
    unset($methods['pingback.extensions.getPingbacks']);
    unset($methods['wp.getUsersBlogs']);
    unset($methods['wp.getAuthors']);
    unset($methods['wp.getProfile']);
    unset($methods['wp.getUser']);
    unset($methods['wp.getUsers']);
    unset($methods['wp.newPost']);
    unset($methods['wp.newPage']);
    unset($methods['wp.editPost']);
    unset($methods['wp.editPage']);
    unset($methods['wp.deletePost']);
    unset($methods['wp.deletePage']);
    unset($methods['wp.getPost']);
    unset($methods['wp.getPage']);
    unset($methods['wp.getPosts']);
    unset($methods['wp.getPages']);
    unset($methods['wp.getMediaItem']);
    unset($methods['wp.getMediaLibrary']);
    unset($methods['wp.getRevisions']);
    unset($methods['wp.restoreRevision']);
    unset($methods['wp.getCategories']);
    unset($methods['wp.getTags']);
    unset($methods['wp.getTaxonomies']);
    unset($methods['wp.getTerms']);
    unset($methods['wp.newTerm']);
    unset($methods['wp.editTerm']);
    unset($methods['wp.deleteTerm']);
    unset($methods['wp.getComment']);
    unset($methods['wp.getComments']);
    unset($methods['wp.newComment']);
    unset($methods['wp.editComment']);
    unset($methods['wp.deleteComment']);
    unset($methods['wp.getCommentCount']);
    unset($methods['wp.getCommentStatus']);
    unset($methods['wp.getCommentTypes']);
    return $methods;
});

// Disable direct access to xmlrpc.php file
add_action('init', function () {
    if (isset($_SERVER['SCRIPT_FILENAME']) && basename($_SERVER['SCRIPT_FILENAME']) === 'xmlrpc.php') {
        header('HTTP/1.1 403 Forbidden');
        exit;
    }
}, 1);

// Ref: ChatGPT
