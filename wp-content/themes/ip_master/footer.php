<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IP
 */

?>

	<footer class="site-footer background-gallery">

		<nav id="site-navigation" class="main-navigation footer" aria-label="<?php esc_attr_e( 'Footer Navigation', 'ip_master' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'fallback_cb'    => false,
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'menu_class'     => 'menu dropdown container',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation-->

		<div class="container site-info">
			<div class="col">
				<p><?php ip_master_display_email_text(); ?><br>
				   <?php ip_master_display_phone_text(); ?></p>
			</div><!-- col -->

			<div class="col">
				<?php ip_master_display_social_network_links(); ?>
			</div><!-- col -->
		</div><!-- .site-info -->

		<div class="bottom">
			<p>All Content Copyright &copy; <?php echo date("Y"); ?> <?php ip_master_display_copyright_text(); ?> <?php if( get_theme_mod( 'ip_master_footer_checkbox' ) == '') { ?><a href="https://www.inverseparadox.com/" target="_blank">Custom WordPress Development</a> by Inverse Paradox.<?php }?></p>
		</div><!-- bottom -->
	</footer><!-- .site-footer container-->

	<?php wp_footer(); ?>

	<?php ip_master_display_mobile_menu(); ?>

</body>
</html>
