<?php
/**
 * @package WordPress
 */
get_header(); ?>

<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>

        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h1><?php the_title(); ?></h1>
            <div class="topmeta">
                <span class="date"><?php echo the_time("F jS, Y"); ?></span>
                <span class="category"><?php the_category(',') ?> </span>
            </div><!--/topmeta-->
            <div class="postcontent">
                <?php the_content(__('(continue...)')); ?>
                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            </div><!--/postcontent-->
            <?php if (get_the_tags()) { ?><span class="tags"><?php the_tags('', ', ', ''); ?></span><?php } ?>
        </div><!--/post-->

        <?php comments_template(); ?>

    <?php endwhile; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>