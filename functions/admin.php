<?php


/* ===============================================================
==================================================================

I.  admin.php

    1.  ip_alter_manage_posts_columns($columns)
        - add new column to posts

    2.  ip_manage_posts_custom_columns($column, $post_id)
        - fill in content of custom columns

    3.  ip_change_post_menu_label()
        - change "posts" label to "articles"

==================================================================
=============================================================== */



/* ===============================================================
    add new column to posts
=============================================================== */

function ip_alter_manage_posts_columns($columns)
{
    $columns['my-new-column'] = 'My New Column';
    return $columns;
}
//add_filter('manage_posts_columns', 'ip_alter_manage_posts_columns', 10);

/* ===============================================================
    fill in content of custom columns
=============================================================== */

function ip_manage_posts_custom_columns($column, $post_id)
{
    switch($column) {
        case 'my-new-column':
            echo "Stuff in my new column";
            break;
    }
}
//add_action('manage_posts_custom_column' , 'ip_manage_posts_custom_columns', 10, 2);

/* ===============================================================
    change "posts" label to "articles"
=============================================================== */

function ip_change_post_menu_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = 'Articles';
    $submenu['edit.php'][5][0] = 'Articles';
    $submenu['edit.php'][10][0] = 'Add Article';
    $submenu['edit.php'][16][0] = 'Article Tags';
}
function ip_change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Articles';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add New Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'New Article';
    $labels->view_item = 'View Article';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No articles found';
    $labels->not_found_in_trash = 'No articles found in Trash';
}
//add_action('init', 'ip_change_post_object_label');
//add_action('admin_menu', 'ip_change_post_menu_label');