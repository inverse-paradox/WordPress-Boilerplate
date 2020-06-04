<?php
/**
 * Display social sharing icons.
 *
 * @package IP
 */

?>

<div class="social-share">
	<h5 class="social-share-title"><?php esc_html_e( 'Share This', 'ip_master' ); ?></h5>
	<ul class="social-icons menu menu-horizontal">
		<li class="social-icon">
			<a href="<?php echo esc_url( ip_master_get_twitter_share_url() ); ?>" onclick="window.open(this.href, 'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, top=150, left=0, width=600, height=300' ); return false;">
				<?php
				ip_master_display_svg(
					array(
						'icon'  => 'twitter-square',
						'title' => __( 'Twitter', 'ip_master' ),
						'desc'  => esc_html__( 'Share on Twitter', 'ip_master' ),
					)
				);
				?>
				<span class="screen-reader-text"><?php esc_html_e( 'Share on Twitter', 'ip_master' ); ?></span>
			</a>
		</li>
		<li class="social-icon">
			<a href="<?php echo esc_url( ip_master_get_facebook_share_url() ); ?>" onclick="window.open(this.href, 'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, top=150, left=0, width=600, height=300' ); return false;">
				<?php
				ip_master_display_svg(
					array(
						'icon'  => 'facebook-square',
						'title' => __( 'Facebook', 'ip_master' ),
						'desc'  => esc_html__( 'Share on Facebook', 'ip_master' ),
					)
				);
				?>
				<span class="screen-reader-text"><?php esc_html_e( 'Share on Facebook', 'ip_master' ); ?></span>
			</a>
		</li>
		<li class="social-icon">
			<a href="<?php echo esc_url( ip_master_get_linkedin_share_url() ); ?>" onclick="window.open(this.href, 'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, top=150, left=0, width=475, height=505' ); return false;">
				<?php
				ip_master_display_svg(
					array(
						'icon'  => 'linkedin-square',
						'title' => __( 'LinkedIn', 'ip_master' ),
						'desc'  => esc_html__( 'Share on LinkedIn', 'ip_master' ),
					)
				);
				?>
				<span class="screen-reader-text"><?php esc_html_e( 'Share on LinkedIn', 'ip_master' ); ?></span>
			</a>
		</li>
	</ul>
</div><!-- .social-share -->
