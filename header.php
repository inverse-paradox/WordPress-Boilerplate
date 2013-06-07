<!DOCTYPE html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <?php if (defined('WPSEO_VERSION')): ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
    <?php else: ?>
        <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php endif; ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" /> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>