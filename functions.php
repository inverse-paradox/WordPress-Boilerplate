<?php
// custom styles for wysiwyg editor
add_editor_style();

// make sure rss info is added to head
add_theme_support( 'automatic-feed-links' );

// add WP 3.0 menu support
add_theme_support( 'menus' );

// add thumbnail and featured image support
add_theme_support('post-thumbnails');

//remove admin bar
//add_filter('show_admin_bar', '__return_false');  

//Removes the default link
update_option( 'image_default_link_type', 'none' );

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action( 'wp_head', 'wp_generator' );

// Obscure login screen error messages
function login_obscure(){

	return '<strong>Sorry</strong>: Information that you have entered is incorrect.';

}
add_filter( 'login_errors', 'login_obscure' );

// remove funky formatting caused by tinymce advanced
function fixtinymceadv($text) {
	$text = str_replace('<p><br class="spacer_" /></p>','<br />',$text);
	return $text;
}
add_filter ('the_content',  'fixtinymceadv');

//Change the Excerpt Length
function new_excerpt_length( $length ) {

	return 30;

}
add_filter( 'excerpt_length', 'new_excerpt_length' );

//Replace the [...] with ...
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Enqueues CSS and JS for the Theme
function ip_scripts_styles(){

	if ( is_home() || is_front_page() ) {
		
		wp_enqueue_script( 'jquery_cycle', get_template_directory_uri() . '/js/jquery.cycle.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'ip_cycle', get_template_directory_uri() . '/js/cycle.controls.js', array( 'jquery', 'jquery_cycle' ), '1.0', true );
		
	}
	
	wp_enqueue_script( 'ip_script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'ip_style', get_template_directory_uri() . '/css/global.css', '', '1.0' );

	if ( is_singular( 'post' ) ){

		wp_enqueue_script( 'comment-reply' );

	}

	wp_enqueue_style( 'ps-ie', get_template_directory_uri().'/css/ie.css' );

	$GLOBALS[ 'wp_styles' ]->add_data( 'ps_lte_ie8', 'conditional', 'lte IE 8' );

}
add_action( 'wp_enqueue_scripts', 'ip_scripts_styles' );

//adds iOS icons and favicon
function ip_header_icons(){
	
	echo '
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . get_template_directory_uri() . '/images/icons/apple-touch-icon-144x144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . get_template_directory_uri() . '/images/icons/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . get_template_directory_uri() . '/images/icons/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="' . get_template_directory_uri() . '/images/icons/apple-touch-icon-57x57-precomposed.png" />
	<link rel="shortcut icon" href="' . get_template_directory_uri() . '/images/icons/favicon.ico" />
	';

}
add_action( 'wp_head', 'ip_header_icons' );



?>