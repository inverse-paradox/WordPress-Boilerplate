<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Inverse Paradox
 */

if ( ! function_exists( 'ip_master_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @author WDS
	 */
	function ip_master_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: the date the post was published */
			esc_html_x( '%s', 'post date', 'ip_master' ),
			'<p>' . $time_string . '</p>'
		);

		$byline = sprintf(
			/* translators: the post author */
			esc_html_x( 'by %s', 'post author', 'ip_master' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ip_master_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 *
	 * @author WDS
	 */
	function ip_master_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'ip_master' ) );
			if ( $categories_list && ip_master_categorized_blog() ) {
				/* translators: the post category */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ip_master' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ip_master' ) );
			if ( $tags_list ) {
				/* translators: the post tags */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ip_master' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'ip_master' ), esc_html__( '1 Comment', 'ip_master' ), esc_html__( '% Comments', 'ip_master' ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'ip_master' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Display SVG Markup.
 *
 * @param array $args The parameters needed to get the SVG.
 *
 * @author WDS
 */
function ip_master_display_svg( $args = array() ) {
	echo ip_master_get_svg( $args ); // WPCS XSS Ok.
}

/**
 * Return SVG markup.
 *
 * @param array $args The parameters needed to display the SVG.
 * @author WDS
 * @return string
 */
function ip_master_get_svg( $args = array() ) {

	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', 'ip_master' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return esc_html__( 'Please define an SVG icon filename.', 'ip_master' );
	}

	// Set defaults.
	$defaults = array(
		'icon'         => '',
		'title'        => '',
		'desc'         => '',
		'fill'         => '',
		'stroke'       => '',
		'stroke-width' => '',
		'height'       => '',
		'width'        => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Figure out which title to use.
	$block_title = ( $args['title'] ) ? $args['title'] : $args['icon'];

	// Generate random IDs for the title and description.
	$random_number  = wp_rand( 0, 99999 );
	$block_title_id = 'title-' . sanitize_title( $block_title ) . '-' . $random_number;
	$desc_id        = 'desc-' . sanitize_title( $block_title ) . '-' . $random_number;

	// Set ARIA.
	$aria_hidden     = ' aria-hidden="true"';
	$aria_labelledby = '';

	if ( $args['title'] && $args['desc'] ) {
		$aria_labelledby = ' aria-labelledby="' . $block_title_id . ' ' . $desc_id . '"';
		$aria_hidden     = '';
	}

	// Set SVG parameters.
	$fill         = ( $args['fill'] ) ? ' fill="' . $args['fill'] . '"' : '';
	$stroke       = ( $args['stroke'] ) ? ' stroke="' . $args['stroke'] . '"' : '';
	$stroke_width = ( $args['stroke-width'] ) ? ' stroke-width="' . $args['stroke-width'] . '"' : '';
	$height       = ( $args['height'] ) ? ' height="' . $args['height'] . '"' : '';
	$width        = ( $args['width'] ) ? ' width="' . $args['width'] . '"' : '';

	// Start a buffer...
	ob_start();
	?>

	<svg
	<?php
		echo ip_master_get_the_content( $height ); // WPCS XSS OK.
		echo ip_master_get_the_content( $width ); // WPCS XSS OK.
		echo ip_master_get_the_content( $fill ); // WPCS XSS OK.
		echo ip_master_get_the_content( $stroke ); // WPCS XSS OK.
		echo ip_master_get_the_content( $stroke_width ); // WPCS XSS OK.
	?>
		class="icon <?php echo esc_attr( $args['icon'] ); ?>"
	<?php
		echo ip_master_get_the_content( $aria_hidden ); // WPCS XSS OK.
		echo ip_master_get_the_content( $aria_labelledby ); // WPCS XSS OK.
	?>
		role="img">
		<title id="<?php echo esc_attr( $block_title_id ); ?>">
			<?php echo esc_html( $block_title ); ?>
		</title>

		<?php
		// Display description if available.
		if ( $args['desc'] ) :
		?>
			<desc id="<?php echo esc_attr( $desc_id ); ?>">
				<?php echo esc_html( $args['desc'] ); ?>
			</desc>
		<?php endif; ?>

		<?php
		// Use absolute path in the Customizer so that icons show up in there.
		if ( is_customize_preview() ) :
		?>
			<use xlink:href="<?php echo esc_url( get_parent_theme_file_uri( '/dist/images/icons/sprite.svg#' . esc_html( $args['icon'] ) ) ); ?>"></use>
		<?php else : ?>
			<use xlink:href="#<?php echo esc_html( $args['icon'] ); ?>"></use>
		<?php endif; ?>

	</svg>

	<?php
	// Get the buffer and return.
	return ob_get_clean();
}

/**
 * Trim the title length.
 *
 * @param array $args Parameters include length and more.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_the_title( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'length' => 12,
		'more'   => '...',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Trim the title.
	return wp_trim_words( get_the_title( get_the_ID() ), $args['length'], $args['more'] );
}

/**
 * Limit the excerpt length.
 *
 * @param array $args Parameters include length and more.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_the_excerpt( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'length' => 20,
		'more'   => '...',
		'post'   => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Trim the excerpt.
	return wp_trim_words( get_the_excerpt( $args['post'] ), absint( $args['length'] ), esc_html( $args['more'] ) );
}

/**
 * Echo the copyright text saved in the Customizer.
 *
 * @author WDS
 * @return bool
 */
function ip_master_display_copyright_text() {

	// Grab our customizer settings.
	$copyright_text = get_theme_mod( 'ip_master_copyright_text' );

	// Stop if there's nothing to display.
	if ( ! $copyright_text ) {
		return false;
	}

	echo ip_master_get_the_content( do_shortcode( $copyright_text ) ); // phpcs: xss ok.
}

/**
 * Echo the body scripts saved in the Customizer.
 *
 * @author WDS
 * @return bool
 */
function ip_master_display_body_scripts() {

	// Grab our customizer settings.
	$body_scripts = get_theme_mod( 'ip_master_body_scripts' );

	// Stop if there's nothing to display.
	if ( ! $body_scripts ) {
		return false;
	}

	echo ip_master_get_the_content( do_shortcode( $body_scripts ) ); // phpcs: xss ok.
}


/**
 * Echo the phone text saved in the Customizer.
 *
 * @author WDS
 * @return bool
 */
function ip_master_display_phone_text() {

	// Grab our customizer settings.
	$phone_text = get_theme_mod( 'ip_master_phone_text' );

	// Stop if there's nothing to display.
	if ( ! $phone_text ) {
		return false;
	} ?>

	<a href="tel:<?php echo ip_master_get_the_content( do_shortcode( $phone_text ) ); ?>"><?php echo ip_master_get_the_content( do_shortcode( $phone_text ) ); ?></a>
<?php }

/**
 * Echo the email text saved in the Customizer.
 *
 * @author WDS
 * @return bool
 */
function ip_master_display_email_text() {

	// Grab our customizer settings.
	$email_text = get_theme_mod( 'ip_master_email_text' );

	// Stop if there's nothing to display.
	if ( ! $email_text ) {
		return false;
	} ?>

	<a href="mailto:<?php echo ip_master_get_the_content( do_shortcode( $email_text ) ); ?>"><?php echo ip_master_get_the_content( do_shortcode( $email_text ) ); ?></a>
<?php }

/**
 * Echo the announcement saved in the Customizer.
 *
 * @author WDS
 * @return bool
 */
function ip_master_display_announcement_text() {

	// Grab our customizer settings.
	$announcement_text = get_theme_mod( 'ip_master_announcement_text' );

	// Stop if there's nothing to display.
	if ( ! $announcement_text ) {
		return false;
	} ?>

	<div class="announcement">
	    <div class="container">
	        <?php echo ip_master_get_the_content( do_shortcode( $announcement_text ) ); ?>
	        <span class="close-announcement">x</span>
	    </div><!--/container-->
	</div><!--/announcement-->
<?php }

/**
 * Get the Twitter social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_twitter_share_url() {
	return add_query_arg(
		array(
			'text' => rawurlencode( html_entity_decode( get_the_title() ) ),
			'url'  => rawurlencode( get_the_permalink() ),
		),
		'https://twitter.com/share'
	);
}

/**
 * Get the Facebook social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_facebook_share_url() {
	return add_query_arg( 'u', rawurlencode( get_the_permalink() ), 'https://www.facebook.com/sharer/sharer.php' );
}

/**
 * Get the LinkedIn social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_linkedin_share_url() {
	return add_query_arg(
		array(
			'title' => rawurlencode( html_entity_decode( get_the_title() ) ),
			'url'   => rawurlencode( get_the_permalink() ),
		),
		'https://www.linkedin.com/shareArticle'
	);
}

/**
 * Display the social links saved in the customizer.
 *
 * @author WDS
 */
function ip_master_display_social_network_links() {

	// Create an array of our social links for ease of setup.
	// Change the order of the networks in this array to change the output order.
	$social_networks = array( 'facebook', 'instagram', 'linkedin', 'twitter' );

	?>
	<ul class="social-icons">
		<?php
		// Loop through our network array.
		foreach ( $social_networks as $network ) :

			// Look for the social network's URL.
			$network_url = get_theme_mod( 'ip_master_' . $network . '_link' );

			// Only display the list item if a URL is set.
			if ( ! empty( $network_url ) ) :
			?>
				<li class="social-icon <?php echo esc_attr( $network ); ?>">
					<a href="<?php echo esc_url( $network_url ); ?>">
						<?php
						ip_master_display_svg(
							array(
								'icon'   => $network . '-square',
								'width'  => '24',
								'height' => '24',
							)
						);
						?>
						<span class="screen-reader-text">
						<?php
							echo /* translators: the social network name */ sprintf( esc_html( 'Link to %s', 'ip_master' ), ucwords( esc_html( $network ) ) ); // WPCS: XSS OK.
						?>
						</span>
					</a>
				</li><!-- .social-icon -->
			<?php
			endif;
		endforeach;
		?>
	</ul><!-- .social-icons -->
	<?php
}

/**
 * Display a card.
 *
 * @author WDS
 * @param array $args Card defaults.
 */
function ip_master_display_card( $args = array() ) {

	// Setup defaults.
	$defaults = array(
		'title' => '',
		'image' => '',
		'text'  => '',
		'url'   => '',
		'class' => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );
	?>
	<div class="<?php echo esc_attr( $args['class'] ); ?> card">

		<a href="<?php echo esc_url( $args['url'] ); ?>" tabindex="-1">
			<?php if ( $args['image'] ) : ?>
				<?php echo wp_kses_post( $args['image'] ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/dist/images/placeholder.png" class="card-image" loading="lazy" alt="<?php echo sprintf( esc_attr( 'Featured image for %s', 'ip_master' ), esc_attr( $args['title'] ) ); ?>">
			<?php endif; ?>
		</a>

		<div class="card-section">

		<?php if ( $args['title'] ) : ?>
			<h3 class="card-title"><a href="<?php echo esc_url( $args['url'] ); ?>"><?php echo esc_html( $args['title'] ); ?></a></h3>
		<?php endif; ?>

		<?php if ( $args['text'] ) : ?>
			<p class="card-text"><?php echo esc_html( $args['text'] ); ?></p>
		<?php endif; ?>

		<?php if ( $args['url'] ) : ?>
			<a class="button button-card" href="<?php echo esc_url( $args['url'] ); ?>"><?php esc_html_e( 'Read More', 'ip_master' ); ?></a>
		<?php endif; ?>

		</div><!-- .card-section -->
	</div><!-- .card -->
	<?php
}

/**
 * Display header button.
 *
 * @author WDS
 * @author Corey Collins
 * @return string
 */
function ip_master_display_header_button() {

	// Get our button setting.
	$button_setting = get_theme_mod( 'ip_master_header_button' );

	// If we have no button displayed, don't display the markup.
	if ( 'none' === $button_setting ) {
		return '';
	}

	// Grab our button and text values.
	$button_url  = get_theme_mod( 'ip_master_header_button_url' );
	$button_text = get_theme_mod( 'ip_master_header_button_text' );
	?>
			
	<div class="site-header-action">
		<?php
		// If we're doing a URL, just make this LOOK like a button but be a link.
		if ( 'link' === $button_setting && $button_url ) :
		?>
			<a href="<?php echo esc_url( $button_url ); ?>" class="button button-link"><?php echo esc_html( $button_text ?: __( 'More Information', 'ip_master' ) ); ?></a>
		<?php else : ?>
			<div class="search-toggle search-toggle_desktop">
                <button class="search nav-search-button cta-button" aria-expanded="false" aria-label="Goto search form">
                	<i class="fa-li fa fa-search"></i>
                </button>
            </div>
		<?php endif; ?>
	</div><!-- .header-trigger -->
	<?php
}

/**
 * Displays numeric pagination on archive pages.
 *
 * @param array $args Array of params to customize output.
 *
 * @author WDS
 * @return void.
 * @author Corey Collins
 */
function ip_master_display_numeric_pagination( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
		'mid_size'  => 4,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	if ( is_null( paginate_links( $args ) ) ) {
		return;
	}
	?>

	<nav class="pagination-container container" aria-label="<?php esc_html_e( 'numeric pagination', 'ip_master' ); ?>">
		<?php echo paginate_links( $args ); // WPCS: XSS OK. ?>
	</nav>

	<?php
}

/**
 * Displays the mobile menu with off-canvas background layer.
 *
 * @return string An empty string if no menus are found at all.
 *
 * @author WDS
 * @author Corey Collins
 */
function ip_master_display_mobile_menu() {

	// Bail if no mobile or primary menus are set.
	if ( ! has_nav_menu( 'mobile' ) && ! has_nav_menu( 'primary' ) ) {
		return '';
	}

	// Set a default menu location.
	$menu_location = 'primary';

	// If we have a mobile menu explicitly set, use it.
	if ( has_nav_menu( 'mobile' ) ) {
		$menu_location = 'mobile';
	}
	?>
	<div class="off-canvas-screen"></div>
	<nav class="off-canvas-container" aria-label="<?php esc_html_e( 'Mobile Menu', 'ip_master' ); ?>" aria-hidden="true" tabindex="-1">
		<button type="button" class="off-canvas-close" aria-label="<?php esc_html_e( 'Close Menu', 'ip_master' ); ?>">
			<span class="close"></span>
		</button>
		<?php
		// Mobile menu args.
		$mobile_args = array(
			'theme_location'  => $menu_location,
			'container'       => 'div',
			'container_class' => 'off-canvas-content',
			'container_id'    => '',
			'menu_id'         => 'site-mobile-menu',
			'menu_class'      => 'mobile-menu',
			'fallback_cb'     => false,
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		);

		// Display the mobile menu.
		wp_nav_menu( $mobile_args );
		?>
	</nav>
	<?php
}

/**
 * Return bool for button text.
 *
 * @param [string] $key link array key.
 * @param [array]  $array link array.
 * @author jomurgel <jo@webdevstudios.com>
 * @since NEXT
 *
 * @return bool
 */
function ip_master_has_array_key( $key, $array = array() ) {

	if ( ! is_array( $array ) || ( ! $array || ! $key ) ) {
		return false;
	}

	return is_array( $array ) && array_key_exists( $key, $array ) && ! empty( $array[ $key ] );
}
