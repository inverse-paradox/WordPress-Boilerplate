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

		
<header class="header" role="banner">
	<div class="container">
		<?php if(is_front_page()): ?>
			<h1><a href="<?php bloginfo('wpurl'); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" /></a></h1>
		<?php else: ?>
			<a href="<?php bloginfo('wpurl'); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" /></a>
		<?php endif; ?>
	</div><!--END container-->
</header><!--END header-->

<nav class="nav" role="navigation">
	<div class="container">
		<?php wp_nav_menu(array('menu' => 'Main Navigation', 'container' => false, 'menu_class' => '')); ?>
	</div><!--END container-->
</nav><!--END nav-->

<?php if(is_front_page()): ?>
<section class="banner">
	<div class="container">
	
		<?php if(get_field('banner', $post->ID)): ?>
		<div class="banner-slides"> <div class="banner-nav"></div>
			<?php while( has_sub_field('banner', $post->ID)): ?>
				 
				 <div class="banner-slide">
				 
					<div class="banner-image"><img src="<?php the_sub_field('banner_image', $post->ID); ?>" /></div>
					
					<?php if(get_sub_field('banner_text', $post->ID)): ?>
					
						<div class="banner-text">
							<?php the_sub_field('banner_text', $post->ID); ?>
						</div><!--END banner-text-->
					
					<?php endif; ?>
					
				 </div><!--END banner-slide-->
			
			<?php endwhile; ?>
		</div><!--END banner-slides-->
		<?php endif; ?>


	</div><!--END container-->
</section><!--END banner-->
<?php endif; ?>

<div class="page-wrap">
	<div class="container">
		<div class="page-wrap">