<?php
/**
 * The template for displaying the search form.
 *
 * @package IP
 */

// Make sure our search forms have unique IDs in the event more than 1 is on a page.
$random_identifier = wp_rand();
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-field-<?php echo esc_attr( $random_identifier ); ?>">
		<span class="screen-reader-text"><?php esc_html_e( 'To search this site, enter a search term', 'ip_master' ); ?></span>
		<input class="search-field" id="search-field-<?php echo esc_attr( $random_identifier ); ?>" type="text" name="s" value="<?php echo get_search_query(); ?>" aria-required="false" autocomplete="off" placeholder="<?php echo esc_attr_e( 'Search', 'ip_master' ); ?>" />
	</label>
	<input type="submit" id="search-submit" class="button button-search" value="<?php esc_attr_e( 'Submit', 'ip_master' ); ?>" />
</form>
