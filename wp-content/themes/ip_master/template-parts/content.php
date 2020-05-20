<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Inverse Paradox
 */

?>

	<article <?php post_class( 'container' ); ?>>
		<div class="display-flex container">
			<?php if ( has_post_thumbnail() ): ?>
	    		<div class="image">
	    			<?php the_post_thumbnail(); ?>
	    		</div>
			<?php endif; ?>

			<div class="post-content <?php if ( has_post_thumbnail() ): ?>image<?php endif; ?>">
				<header class="entry-header">
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<div class="display-flex container">
							<div class="left">
								<?php ip_master_posted_on(); ?>
							</div><!--left-->
							<?php if ( is_single() ) : ?>
								<div class="right">
									<span class="reading-time">
										<p>Reading Time: <?php echo reading_time(); ?></p>
									</span>
								</div><!--right-->
							<?php endif; ?>
						</div><!--display-flex-->
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php if ( is_single() ) : ?>
						<?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. */
										__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ip_master' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ip_master' ),
									'after'  => '</div>',
								)
							);
						?>
					<?php else : ?>
						<?php
							the_excerpt(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. */
										__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ip_master' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ip_master' ),
									'after'  => '</div>',
								)
							);
						?>
					<?php endif; ?>
				</div><!-- .entry-content -->
			</div><!-- content -->
		</div><!-- display-flex container -->
	</article><!-- #post-## -->
