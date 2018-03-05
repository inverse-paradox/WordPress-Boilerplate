<?php

/* ===============================================================
==================================================================

I.  query.php

    1.  ip_add_query_vars($qvars)
        - add new query variables

    2.  ip_alter_query($query)
        - alter the main query

    3.  ip_add_custom_rewrite_rules
        - add a custom rewrite

    4.  starts_with_action( $sql )
        - add new parameter to query posts

==================================================================
=============================================================== */


/* ===============================================================
    add new query vars
=============================================================== */
function ip_add_query_vars($qvars)
{
    $qvars[] = 'new_query_var';
    return $qvars;
}
//add_filter('query_vars', 'ip_add_query_vars');

/* ===============================================================
    alter main query
=============================================================== */
function ip_alter_query($query) {
    if ($query->is_main_query()) {
        if (!is_admin()) {
            // alter the frontend main query
            // example: show custom post types on tag archive
            if ($query->is_tag()) {
                $query->set('post_type', array('post', 'my-custom-post-type'));
            }
        } else {
            // alter the backend main query
            // example: display custom post type alphabetically by default
            if (isset($_GET['post_type']) && $_GET['post_type'] == 'my-custom-post-type' && !isset($_GET['orderby'])) {
                $query->set('orderby', 'title');
                $query->set('order', 'ASC');
            }
        }
    }
}
//add_action('pre_get_posts', 'ip_alter_query', 1, 1);

/* ===============================================================
    add a custom rewrite
=============================================================== */
function ip_add_custom_rewrite_rules() {
    $custom_rules = array(
        array(
            'regex' => '^my-custom-post-type/([^/]+)/?$',
            'url' => 'index.php?pagename=my-custom-page&myid=$matches[1]',
            'position' => 'top'
        )
    );
    $rules = get_option('rewrite_rules');
    $new_rules_added = false;
    foreach ($custom_rules as $custom_rule) {
        if (!isset($rules[$custom_rule['regex']])) {
            add_rewrite_rule($custom_rule['regex'], $custom_rule['url'], $custom_rule['position']);
            $new_rules_added = true;
        }
    }
    if ($new_rules_added) {
        flush_rewrite_rules();
    }
}
//add_action('init', 'ip_add_custom_rewrite_rules');


/* ===============================================================
    add new parameter to query posts 
    (example is a parameter to query posts that start with a certain letter)
=============================================================== */

//add_action( 'posts_where', 'startswithaction' );
function starts_with_action( $sql ){
    global $wpdb;
    $startswith = get_query_var( 'startswith' );

    if( $startswith ){
        $sql .= $wpdb->prepare( " AND $wpdb->posts.post_title LIKE %s ", $startswith.'%' );
    }

    return $sql;
}
?>