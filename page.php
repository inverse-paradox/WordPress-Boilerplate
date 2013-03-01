<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="content" role="main">

<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
	
		<?php if(!is_front_page()) : ?><h1><?php the_title(); ?></h1><?php endif; ?>
		
		<?php the_content(); ?>
		
	<?php endwhile; ?>
	
<?php else: ?>
	<h2>Page Not Found</h2>
	<p>Sorry, this page you are looking for could not be found.</p>
<?php endif; ?>

</div><!--END content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>