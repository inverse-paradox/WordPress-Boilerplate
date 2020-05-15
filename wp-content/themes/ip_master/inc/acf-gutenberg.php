<?php
/**
 * ACF block registration for Gutenberg.
 *
 * A place to register blocks for use in Gutenberg.
 *
 * @package Inverse Paradox
 */

// Make sure ACF is active.
if ( ! function_exists( 'acf_register_block_type' ) ) {
	return;
}