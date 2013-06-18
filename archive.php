<?php
/**
 * @package WordPress
 */
$title = '';
if (is_category()) { // category
    $title = single_cat_title('', false);
} else if (is_tag()) { // tag
    $title = single_tag_title('', false);
} else if (is_tax()) { // custom taxonomy
    $title = get_queried_object()->name;
} else if (is_post_type_archive()) {// custom post type
    $title = post_type_archive_title('', false);
} else if (is_day()) { // date -> day
    $title = the_time('F j, Y');
} else if (is_month()) { // date -> month
    $title = the_time('F, Y');
} else if (is_year()) { // date -> year
    $title = the_time('Y');
} else if (is_author()) { // author
    $author = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    $title = $author->display_name;
}

get_header(); ?>

<?php if (have_posts()): ?>

    <?php if ($title): ?>
        <h1><?php echo $title; ?></h1>
    <?php endif; ?>

    <?php while (have_posts()): the_post(); ?>

        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="topmeta">
                <span class="date"><?php echo the_time("F jS, Y"); ?></span>
            </div><!--/topmeta-->
            <div class="postcontent">
                <?php the_excerpt(); ?>
                <?php wp_link_pages(); ?>
            </div><!--/postcontent-->
            <?php if (get_the_tags()) { ?><span class="tags"><?php the_tags('', ', ', ''); ?></span><?php } ?>
            <div class="bottommeta">
                <span class="category"><?php the_category(',') ?> </span>
                <span class="comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></span>
            </div><!--/bottommeta-->
        </div><!--/post-->

    <?php endwhile; ?>

    <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
    </div>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>