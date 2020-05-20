<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Inverse Paradox
 */

get_header(); ?>

	<main id="main" class="site-main blog">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
		?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif; ?>

		<div class="display-flex container">
			<div class="sidebar">
				<div class="block">
					<h2>Categories</h2>
					<ul>
					    <?php wp_list_categories( array(
					        'orderby' => 'name',
					        'title_li' => ''
					    ) ); ?> 
					</ul>
				</div><!--block-->

				<div class="block">
					<h2>Archives</h2>
					<ul>
					    <?php wp_get_archives( array( 
					    	'type' => 'monthly', '
					    	limit' => 12 
					    ) ); ?>
					</ul>
				</div><!--block-->
			</div><!--sidebar-->

 			<div class="blog-content">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				ip_master_display_numeric_pagination();

				else :
				get_template_part( 'template-parts/content', 'none' ); ?>
			</div><!--blog-content-->

			<?php endif;?>
		</div><!--flex-->
	</main><!-- #main -->

<?php get_footer(); ?>
