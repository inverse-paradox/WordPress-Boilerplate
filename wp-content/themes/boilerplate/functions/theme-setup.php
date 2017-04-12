<?php
/* == custom styles for wysiwyg editor =============================================== */
add_editor_style('editor-style.css');


/* == make sure rss info is added to head ============================================ */
add_theme_support('automatic-feed-links');


/* == add WP 3.0 menu support ======================================================== */
add_theme_support('menus');


/* == add thumbnail and featured image support ======================================= */
add_theme_support('post-thumbnails');


/* == remove admin bar =============================================================== */
//add_filter('show_admin_bar', '__return_false');


/* == Removes the default link on attachments  ======================================= */
update_option('image_default_link_type', 'none');


/* == Remove the version number of WP  =============================================== */
remove_action('wp_head', 'wp_generator');


/* == remove funky formatting caused by tinymce advanced ============================= */
function fixtinymceadv($text)
{
    $text = str_replace('<p><br class="spacer_" /></p>','<br />',$text);
    return $text;
}
add_filter('the_content',  'fixtinymceadv');


/* == Obscure login screen error messages ============================================ */
function login_obscure()
{
    return '<strong>Sorry</strong>: Information that you have entered is incorrect.';
}
add_filter('login_errors', 'login_obscure');


/* == Add blog name to title ========================================================= */
function ip_alter_title($title, $sep) {
    $title .= get_bloginfo('name');
    return $title;
}
add_filter('wp_title', 'ip_alter_title', 10, 2);

/* == Queue up all css & js files ==================================================== */
function ip_scripts_styles()
{
    wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle2.min.js',array('jquery'), null, true);
    wp_enqueue_script('ip_script', get_template_directory_uri() . '/js/theme.min.js',array('jquery'), null, true);
    wp_enqueue_style('ip_style', get_template_directory_uri() . '/css/global.css', false, null);
    if (is_singular('post')){
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ip_scripts_styles');

/* == adds iOS icons and favicon ===================================================== */
function ip_header_icons()
{
    $output = '';
    //$output .= '<link rel="apple-touch-icon" sizes="144x144" href="' . get_template_directory_uri() . '/images/apple-touch-icon-144x144.png" />' . "\n";
    //$output .= '<link rel="apple-touch-icon" sizes="114x114" href="' . get_template_directory_uri() . '/images/apple-touch-icon-114x114.png" />' . "\n";
    //$output .= '<link rel="apple-touch-icon" sizes="72x72" href="' . get_template_directory_uri() . '/images/apple-touch-icon-72x72.png" />' . "\n";
    //$output .= '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/images/apple-touch-icon-57x57.png" />' . "\n";
    $output .= '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.ico" />' . "\n";
    echo $output;
}
add_action('wp_head', 'ip_header_icons');


//add_image_size( 'homepost', 238, 125, true );


//custom excerpt length
function ip_custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'ip_custom_excerpt_length', 999 );


//custom excerpt more
function ip_new_excerpt_more( $more ) {
  return ' <a class="more" href="'.get_permalink($post->ID).'">Read More</a>';
}
add_filter('excerpt_more', 'ip_new_excerpt_more');


//add acf options page
if(function_exists('acf_add_options_page')) { 
    acf_add_options_page();
}
?>