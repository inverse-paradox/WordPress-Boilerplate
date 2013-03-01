<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
	
<div class="header group" role="banner">
	<div class="container">
		<h1><a href="<?php bloginfo('wpurl'); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" /></a></h1>
	</div><!--END container-->
</div><!--END header-->

<div class="nav" role="navigation">
	<div class="container">
		<?php wp_nav_menu(array('menu' => 'Top Navigation', 'container' => false, 'menu_class' => 'group')); ?>
	</div><!--END container-->
</div><!--END nav-->

<?php if(is_front_page()): ?>
<div class="banner group">
	<div class="container">
	
		<?php if(get_field('banner', $post->ID)): ?>
		<div class="banner-slides"> <div class="banner-nav"></div>
			<?php while( has_sub_field('banner', $post->ID)): ?>
				 
				 <div class="banner-slide">
				 
					<div class="banner-image"><?php the_sub_field('banner_image', $post->ID); ?></div>
					
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
</div><!--END banner-->
<?php endif; ?>

<div class="main group">
	<div class="container">
		<div class="page-wrap">
		
		
		
		
<?php /*WRAPPED DESIGN HEADER

<div class="container">

        <div class="header group" role="banner">
            <h1><a href="<?php bloginfo('wpurl'); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo" /></a></h1>
        </div><!--END header-->

        <div class="nav" role="navigation">
            <?php wp_nav_menu(array('menu' => 'Top Navigation', 'container' => false, 'menu_class' => 'group')); ?>  
        </div><!--END nav-->

        <?php if(is_front_page()): ?>
		
			<div class="banner group">
			
				<?php if(get_field('banner', $post->ID)): ?>
				<div class="banner-slides"> <div class="banner-nav"></div>
					<?php while( has_sub_field('banner', $post->ID)): ?>
						 
						 <div class="banner-slide">
						 
							<div class="banner-image"><?php the_sub_field('banner_image', $post->ID); ?></div>
							
							<?php if(get_sub_field('banner_text', $post->ID)): ?>
							
								<div class="banner-text">
									<?php the_sub_field('banner_text', $post->ID); ?>
								</div><!--END banner-text-->
							
							<?php endif; ?>
							
						 </div><!--END banner-slide-->
					
					<?php endwhile; ?>
				</div><!--END banner-slides-->
				<?php endif; ?>

			</div><!--END banner-->
			
		<?php endif; ?>

        <div class="main group">
            <div class="page-wrap">
*/ ?>