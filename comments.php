<?php
/**
 * @package WordPress
 */
?>

<div class="post-comments">

	<?php
	// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (post_password_required()) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
	?>

	<?php if (have_comments()): ?>
		<h2><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h2>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>

		<ol class="comment-list">
		<?php wp_list_comments(); ?>
		</ol>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	 <?php else : // this is displayed if there are no comments so far ?>

		<?php if (comments_open()) : ?>
			<!-- If comments are open, but there are no comments. -->

		 <?php else: // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Comments are closed.</p>

		<?php endif; ?>
	<?php endif; ?>


	<?php if (comments_open()) : ?>

		<div id="respond" class="comments-respond"><a name="respond"></a>

			<h3>Add a Comment</h3>

			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
				<p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

					<?php if (is_user_logged_in()): ?>
						<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
							<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
						</p>
					<?php else : ?>
						<p class="form-field-wrapper">
							<label for="author" <?php if ($req) echo 'class="required"'; ?>>Name</label>
							<input type="text" name="author" id="author" value="" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="textbox" />
						</p>
						<p class="form-field-wrapper">
							<label for="email" <?php if ($req) echo 'class="required"'; ?>>Email Address <span class="note">(will not be published)</span></label>
							<input type="text" name="email" id="email" value="" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="textbox" />
						</p>
						<p class="form-field-wrapper">
							<label for="url">Website</label>
							<input type="text" name="url" id="url" value="" tabindex="3" class="textbox" />
						</p>
					<?php endif; ?>

					<p class="form-field-wrapper">
						<label for="comment" class="required">Comment:</label>
						<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" class="textbox"></textarea>
					</p>

					<p class="form-field-wrapper submit-wrapper">
						<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
					</p>
					<?php comment_id_fields(); ?>

					<?php do_action('comment_form', $post->ID); ?>

				</form>

			<?php endif; // If registration required and not logged in ?>

		</div><!--/comments-respond-->

	<?php endif; // if comments open ?>

</div><!--/post-comments-->