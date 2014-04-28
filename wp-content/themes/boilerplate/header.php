<!DOCTYPE html>
<!--[if lte IE 6]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8 lte-ie7 lte-ie6"> <![endif]-->
<!--[if lte IE 7]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8 lte-ie7"> <![endif]-->
<!--[if lte IE 8]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8"> <![endif]-->
<!--[if lte IE 9]>     <html <?php language_attributes(); ?> class="no-js lte-ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="all-content-wrapper">
        <div class="all-content-wrapper-inner">

            <div class="nav">
                <a href="#" id="main-nav-toggle">Menu</a>
                <?php wp_nav_menu(array(
                    'theme_location' => '',
                    'before' => '<span class="link-wrap">',
                    'after' => '<span class="arrow"></span></span>',
                    'container' => false,
                    'menu_class' => '',
                    'menu_id' => 'main-nav',
                )); ?>
            </div><!--/nav-->