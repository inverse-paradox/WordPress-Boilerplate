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
                    
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
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