<?php
/**
 * The template used for displaying a recent posts block.
 *
 * This block will either display all recent posts or posts
 * from a specific category. The amount of posts can be
 * limited through the admin.
 *
 * @package Inverse Paradox
 */

// Set up fields.
$block_title = get_field( 'title' );
$post_count  = get_field( 'number_of_posts' );
$categories  = get_field( 'categories' );
$tags        = get_field( 'tags' );
$alignment   = ip_master_get_block_alignment( $block );
$classes     = ip_master_get_block_classes( $block );

// Variable to hold query args.
$args = array();

// Only if there are either categories or tags.
if ( $categories || $tags ) {
	$args = ip_master_get_recent_posts_query_arguments( $categories, $tags );
}

// Always merge in the number of posts.
$args['posts_per_page'] = is_numeric( $post_count ) ? $post_count : 3;

// Get the recent posts.
$recent_posts = ip_master_get_recent_posts( $args );

// Display section if we have any posts.
if ( $recent_posts->have_posts() ) :

	// Start a <container> with possible block options.
	ip_master_display_block_options(
		array(
			'block'     => $block,
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block recent-posts-block' . esc_attr( $alignment . $classes ), // Container class.
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
			while ( $recent_posts->have_posts() ) :
				$recent_posts->the_post();

				// Display a card.
				ip_master_display_card(
					array(
						'title' => get_the_title(),
						'image' => wp_get_attachment_image( get_post_thumbnail_id(), 'medium', false, array( 'card-image' ) ),
						'text'  => ip_master_get_the_excerpt(
							array(
								'length' => 20,
								'more'   => '...',
							)
						),
						'url'   => get_the_permalink(),
						'class' => 'third',
					)
				);

			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</section>
<?php endif; ?>
