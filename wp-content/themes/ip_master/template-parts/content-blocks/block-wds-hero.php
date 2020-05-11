<?php
/**
 * The template used for displaying a Hero block.
 *
 * @package Inverse Paradox
 */

// Set up fields.
$block_title = get_field( 'title' );
$text        = get_field( 'text' );
$alignment   = ip_master_get_block_alignment( $block );
$classes     = ip_master_get_block_classes( $block );

// Start a <container> with possible block options.
ip_master_display_block_options(
	array(
		'block'     => $block,
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block hero-block' . esc_attr( $alignment . $classes ), // Container class.
	)
);
?>
	<div class="container hero-block-content">
		<?php ip_master_display_hero_heading( $block_title ); ?>

		<?php if ( $text ) : ?>
			<p class="hero-block-description"><?php echo esc_html( $text ); ?></p>
		<?php endif; ?>

		<?php
		ip_master_display_link(
			array(
				'button' => true,
				'class'  => 'button-hero',
			)
		);
		?>
	</div>
</section>
