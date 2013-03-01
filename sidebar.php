<?php
/**
 * @package WordPress
 */
?>
<div class="sidebar" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
	
		<div class="search section">
			<?php get_search_form(); ?>
		</div>

		<div class="archives section">
			<h3 class="widget-title"><?php _e( 'Archives:'); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</div>

		<div class="categories section">
			<ul>
				<?php wp_list_categories( 'show_count=1&title_li=' ); ?>
			</ul>
		</div>
		
	<?php endif; ?>
</div><!--END sidebar-->