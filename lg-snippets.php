<?php
/**
 * Plugin Name: Snippets
 * Plugin URI: http://www.ludwig-gramberg.de/
 * Description: Text/HTML Snippets
 * Version: 0.1
 * Author: Ludwig Gramberg
 * Author URI: http://www.ludwig-gramberg.de/
 * Text Domain:
 * License: MIT
 */

function lg_snippet_html($id, $return = null) {
    $page = get_page_by_title($id, OBJECT_K, 'lg_snippet' );
    $out = $page ? apply_filters('the_content', $page->post_content) : '<span style="color:#f00">create snippet `'.$id.'` to place content here</span>';
    if($return instanceof stdClass) {
        $return->data = $out;
    } else {
        echo $out;
    }
}

function lg_snippet_raw($id, $return = null) {
    $page = get_page_by_title($id, OBJECT_K, 'lg_snippet' );
    $out = $page ? $page->post_content : 'create snippet `'.$id.'` to place content here';
    if($return instanceof stdClass) {
        $return->data = $out;
    } else {
        echo $out;
    }
}

function lg_snippets_init() {
    // hooks

    add_action('lg_snippet_html', 'lg_snippet_html', 10, 2);
    add_action('lg_snippet_raw', 'lg_snippet_raw', 10, 2);

    // post type

    register_post_type('lg_snippet', array(
        'label'         => 'Textbausteine',
        'labels'        => array(
            'name'          => 'Textbaustein',
            'singular_name' => 'Textbausteine',
        ),
        'hierarchical'  => false,
        'description'   => 'Textbausteine',
        'public'        => false,
        'show_ui'       => true,
        'exclude_from_search' => true,
        'rewrite'       => array('slug' => 'lg_snippet'),
        'supports'      => array('title', 'editor', 'revisions')
    ));
}
add_action('init', 'lg_snippets_init');