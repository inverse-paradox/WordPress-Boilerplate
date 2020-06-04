<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IP
 */

get_header(); ?>

	<div class="display-flex grid-wrapper">
		<main id="main" class="site-main single">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_format() ); ?>

				<?php if ( function_exists( 'ip_social_sharing_buttons' ) ) : ?>
                    <div class="post__social">
						<?php ip_social_sharing_buttons(); ?>
                    </div>
				<?php endif; ?>

				<?php the_post_navigation( array(
            		'prev_text'                  => __( 'Previous Post' ),
            		'next_text'                  => __( 'Next Post' ),
        		) );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .grid-wrapper -->
<?php get_footer(); ?>
