<?php
/**
 * The template used for displaying related posts.
 *
 * @package Inverse Paradox
 */

// Set up fields.
$block_title   = get_field( 'title' );
$related_posts = get_field( 'related_posts' );
$alignment     = ip_master_get_block_alignment( $block );
$classes       = ip_master_get_block_classes( $block );

// Display section if we have any posts.
if ( $related_posts ) :

	// Start a <container> with possible block options.
	ip_master_display_block_options(
		array(
			'block'     => $block,
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block related-posts-block' . esc_attr( $alignment . $classes ), // Container class.
		)
	);
	?>

		<div class="container">
			<?php if ( $block_title ) : ?>
				<h2 class="content-block-title"><?php echo esc_html( $block_title ); ?></h2>
			<?php endif; ?>
		</div>

		<div class="container display-flex">

			<?php
			// Loop through recent posts.
			foreach ( $related_posts as $key => $post ) :// @codingStandardsIgnoreLine

				// Convert post object to post data.
				setup_postdata( $post );

				// Display a card.
				ip_master_display_card(
					array(
						'title' => get_the_title( $post ),
						'image' => wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'medium', false, array( 'card-image' ) ),
						'text'  => ip_master_get_the_excerpt(
							array(
								'length' => 20,
								'more'   => '...',
								'post'   => $post,
							)
						),
						'url'   => get_the_permalink( $post ),
						'class' => 'third',
					)
				);

			endforeach;
			wp_reset_postdata();
		?>
		</div>
	</section>
<?php elseif ( ! $related_posts && is_admin() ) : ?>
	<?php
	// Start a <container> with possible block options.
	ip_master_display_block_options(
		array(
			'block'     => $block,
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block related-posts-block' . esc_attr( $alignment . $classes ), // Container class.
		)
	);
	?>

		<div class="container">
			<?php if ( $block_title ) : ?>
				<h2 class="content-block-title"><?php echo esc_html( $block_title ); ?></h2>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
