<?php
/**
 * @package WordPress
 */
get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

    <?php endwhile; ?>
    
    <?php if( get_previous_posts_link() ) : ?>
    
    	<span class="pagination button alignleft"><?php previous_posts_link('&laquo; Newer Entries'); ?></span>
    
    <?php endif; ?>
    
    <?php if( get_next_posts_link() ) : ?>
    
    	<span class="pagination button alignright"><?php next_posts_link('Older Entries &raquo;'); ?></span>
    	
   	<?php endif; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>