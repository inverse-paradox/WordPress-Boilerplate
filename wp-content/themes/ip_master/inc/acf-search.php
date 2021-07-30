<?php
/**
 * ACF/Post Meta Search.
 *
 * Extend WordPress search to include custom fields.
 * https://adambalee.com
 *
 * @package IP
 */

/**
 * Join posts and postmeta tables
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 *
 * @param string $join The SQL query.
 * @return $join The updated query.
 * @author Corey Collins
 */
function ip_master_search_join( $join ) {
	global $wpdb;

	if ( is_search() ) {
		$join .= ' LEFT JOIN ' . $wpdb->postmeta . ' AS ip_master_postmeta ON ' . $wpdb->posts . '.ID = ' . 'ip_master_postmeta.post_id ';
	}

	return $join;
}
add_filter( 'posts_join', 'ip_master_search_join' );

/**
 * Modify the search query with posts_where.
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 *
 * @param string $where The SQL query.
 * @return $where The updated query.
 * @author Corey Collins
 */
function ip_master_search_where( $where ) {
	global $pagenow, $wpdb;

	if ( is_search() ) {
		$where = preg_replace(
			'/\(\s*' . $wpdb->posts . '.post_title\s+LIKE\s*(\'[^\']+\')\s*\)/',
			'(' . $wpdb->posts . '.post_title LIKE $1) OR (ip_master_postmeta.meta_value LIKE $1)',
			$where
		);
	}

	return $where;
}
add_filter( 'posts_where', 'ip_master_search_where' );

/**
 * Prevent duplicates.
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 *
 * @param string $where The SQL query.
 * @return $where The updated query.
 * @author Corey Collins
 */
function ip_master_search_distinct( $where ) {
	global $wpdb;

	if ( is_search() ) {
		return 'DISTINCT';
	}

	return $where;
}
add_filter( 'posts_distinct', 'ip_master_search_distinct' );
