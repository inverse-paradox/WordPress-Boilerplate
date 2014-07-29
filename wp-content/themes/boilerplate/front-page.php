<?php
/**
 * @package WordPress
 */
get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <section class="banner">
        </section><!--/banner-->

        <div class="main-content-wrapper">
            <div class="content-wrapper">

                <main class="main" role="main">

                    <?php the_content(); ?>

                </main><!--/main-->

            </div><!--/content-wrapper-->
        </div><!--/main-content-wrapper-->

    <?php endwhile; ?>

<?php else: ?>

    <div class="main-content-wrapper">
        <div class="content-wrapper">

            <main class="main" role="main">

                <?php get_template_part('notfound'); ?>

            </main><!--/main-->

        </div><!--/content-wrapper-->
    </div><!--/main-content-wrapper-->

<?php endif; ?>

<?php get_footer(); ?>