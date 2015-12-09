<?php
/**
 * @package WordPress
 */
get_header(); ?>

<main class="main" role="main">

<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
	
		<h1><?php the_title(); ?></h1>
		
		<?php the_content(); ?>
		
	<?php endwhile; ?>
	
<?php else: ?>

    <?php get_template_part('notfound'); ?>
    
<?php endif; ?>

</main><!--END main-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>