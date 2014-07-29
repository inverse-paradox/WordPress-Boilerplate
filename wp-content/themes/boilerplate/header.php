<!DOCTYPE html>
<!--[if lte IE 8]>     <html <?php language_attributes(); ?> class="no-js lte-ie9 lte-ie8"> <![endif]-->
<!--[if lte IE 9]>     <html <?php language_attributes(); ?> class="no-js lte-ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="page-wrapper">

        <header class="header" role="header">
            <div class="content-wrapper">
                <?php $logo_tag = (is_front_page()) ? 'h1' : 'span'; ?>
                <<?php echo $logo_tag; ?> class="logo">
                    <a href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
                </<?php echo $logo_tag; ?>>
            </div><!--/content-wrapper-->
        </header><!--/header-->

        <nav class="main-nav" role="navigation">
            <div class="content-wrapper">
                <?php wp_nav_menu('theme_location='); ?>
            </div><!--/content-wrapper-->
        </nav><!--/main-nav-->