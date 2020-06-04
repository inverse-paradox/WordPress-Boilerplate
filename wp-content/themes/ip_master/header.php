<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IP
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class( 'site-wrapper' ); ?>>
	<?php ip_master_display_body_scripts(); ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'ip_master' ); ?></a>

	<header class="site-header background-gallery">
        <?php ip_master_display_announcement_text(); ?>

		<nav id="site-navigation" class="main-navigation courtesy" aria-label="<?php esc_attr_e( 'Footer Navigation', 'ip_master' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'fallback_cb'    => false,
					'theme_location' => 'courtesy',
					'menu_id'        => 'courtesy-menu',
					'menu_class'     => 'menu dropdown container',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation-->
		
		<div class="display-flex container">

			<div class="site-branding">

				<?php the_custom_logo(); ?>

				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
				?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</div><!-- .container -->

		<div class="bottom display-flex container">
			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
				<button type="button" class="mobile-menu off-canvas-open" aria-expanded="false" aria-label="<?php esc_html_e( 'Open Menu', 'ip_master' ); ?>">
					<span class="hamburger"></span>
				</button>
			<?php endif; ?>

			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'ip_master' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'fallback_cb'    => false,
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu dropdown container',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation-->

			<?php ip_master_display_header_button(); ?>

			<?php
			// If we're doing a URL, just make this LOOK like a button but be a link.
			if ( 'link' === $button_setting && $button_url ) :
			?>
			<?php else : ?>
				<div class="desktop-search" id="desktop-search">
	            	<?php echo get_search_form(); ?>
	        	</div>
	        <?php endif; ?>
	    </div><!-- bottom -->
	</header><!-- .site-header-->
