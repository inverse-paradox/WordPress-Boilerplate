<?php
/**
 * @package WordPress
 */
get_header(); ?>
<div class="content">
<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<p><?php echo date("F jS, Y",strtotime($post->post_date)); ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> <?php edit_post_link('Edit This', ' | ', ''); ?></p>
		<?php the_content(); ?>
	<?php endwhile; ?>
	<?php comments_template(); ?>
<?php else: ?>
	<h2>Page Not Found</h2>
	<p>Sorry, this page you are looking for could not be found.</p>
<?php endif; ?>
</div><!--END content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>