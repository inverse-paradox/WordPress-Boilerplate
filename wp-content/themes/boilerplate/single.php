<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="main-content-wrapper">
    <div class="content-wrapper">

        <main class="main" role="main">

            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    
                    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
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
                        <?php comments_template(); ?>
                    </article>

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

        </main><!--/main-->

        <?php get_sidebar(); ?>

    </div><!--/content-wrapper-->
</div><!--/main-content-wrapper-->

<?php get_footer(); ?>