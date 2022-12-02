<?php
/**
 * Customizer settings.
 *
 * @package IP
 */

/**
 * Register additional scripts.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 * @author WDS
 */
function ip_master_customize_additional_scripts( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_header_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_header_scripts',
		array(
			'label'       => esc_html__( 'Header Scripts', 'ip_master' ),
			'description' => esc_html__( 'Additional scripts to add to the header. Basic HTML tags are allowed.', 'ip_master' ),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_body_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_body_scripts',
		array(
			'label'       => esc_html__( 'Body Scripts', 'ip_master' ),
			'description' => esc_html__( 'Additional scripts to add to after the <body>. Basic HTML tags are allowed.', 'ip_master' ),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_footer_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_footer_scripts',
		array(
			'label'       => esc_html__( 'Footer Scripts', 'ip_master' ),
			'description' => esc_html__( 'Additional scripts to add to the footer. Basic HTML tags are allowed.', 'ip_master' ),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);
}
add_action( 'customize_register', 'ip_master_customize_additional_scripts' );

/**
 * Register a social icons setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_social_icons( $wp_customize ) {

	// Create an array of our social links for ease of setup.
	$social_networks = array( 'facebook', 'instagram', 'linkedin', 'twitter' );

	// Loop through our networks to setup our fields.
	foreach ( $social_networks as $network ) {

		// Register a setting.
		$wp_customize->add_setting(
			'ip_master_' . $network . '_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url',
			)
		);

		// Create the setting field.
		$wp_customize->add_control(
			'ip_master_' . $network . '_link',
			array(
				'label'   => /* translators: the social network name. */ sprintf( esc_html__( '%s URL', 'ip_master' ), ucwords( $network ) ),
				'section' => 'ip_master_social_links_section',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'ip_master_customize_social_icons' );

/**
 * Register a phone general setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_general_phone( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_phone_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
		$wp_customize->add_control(
			'ip_master_phone_text',
			array(
				'label'       => esc_html__( 'Phone Number', 'ip_master' ),
				'section' => 'ip_master_general_section',
				'type'    => 'text',
			)
		);
}
add_action( 'customize_register', 'ip_master_customize_general_phone' );

/**
 * Register a email general setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_general_email( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_email_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
		$wp_customize->add_control(
			'ip_master_email_text',
			array(
				'label'       => esc_html__( 'Email', 'ip_master' ),
				'section' => 'ip_master_general_section',
				'type'    => 'text',
			)
		);
}
add_action( 'customize_register', 'ip_master_customize_general_email' );

/**
 * Register a checkbox footer setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_footer_checkbox( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_footer_checkbox',
		array(
  			'capability' => 'edit_theme_options',
  			'sanitize_callback' => 'themeslug_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ip_master_footer_checkbox',
		array(
  			'type' => 'checkbox',
  			'section' => 'ip_master_footer_section',
  			'label' => __( 'Hide the Inverse Paradox Footer Copyright' ),
		)
	);

	function themeslug_sanitize_checkbox( $checked ) {
  		// Boolean check.
  		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

}
add_action( 'customize_register', 'ip_master_customize_footer_checkbox' );

/**
 * Register copyright text setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_copyright_text( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_copyright_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_copyright_text',
		array(
			'label'       => esc_html__( 'Copyright Text', 'ip_master' ),
			'description' => esc_html__( 'The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'ip_master' ),
			'section' => 'ip_master_footer_section',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'ip_master_customize_copyright_text' );

/**
 * Register copyright text setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_announcement_text( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_announcement_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_announcement_text',
		array(
			'label'       => esc_html__( 'Announcement Text', 'ip_master' ),
			'description' => esc_html__( 'The announcement text will be displayed in the header. Basic HTML tags allowed.', 'ip_master' ),
			'section' => 'ip_master_header_section',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'ip_master_customize_announcement_text' );

/**
 * Register header button setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_header_button( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_header_button',
		array(
			'default'           => '',
			'sanitize_callback' => 'ip_master_sanitize_select',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_header_button',
		array(
			'label'       => esc_html__( 'Header Button', 'ip_master' ),
			'description' => esc_html__( 'Display a custom button in the header.', 'ip_master' ),
			'section'     => 'ip_master_header_section',
			'type'        => 'select',
			'choices'     => array(
				'none'   => esc_html__( 'No button', 'ip_master' ),
				'search' => esc_html__( 'Trigger a search field', 'ip_master' ),
				'link'   => esc_html__( 'Link to a custom URL', 'ip_master' ),
			),
		)
	);

	// Register a setting for the URL.
	$wp_customize->add_setting(
		'ip_master_header_button_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url',
		)
	);

	// Display the URL field... maybe!
	$wp_customize->add_control(
		'ip_master_header_button_url',
		array(
			'label'           => esc_html__( 'Header Button URL', 'ip_master' ),
			'description'     => esc_html__( 'Enter the URL or email address to be used by the button in the header.', 'ip_master' ),
			'section'         => 'ip_master_header_section',
			'type'            => 'url',
			'active_callback' => 'ip_master_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);

	// Register a setting for the link checkbox.
	$wp_customize->add_setting(
		'ip_master_header_button_checkbox',
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'ip_master_sanitize_checkbox',
		)
	);

	// Display the checkbox... maybe!
	$wp_customize->add_control(
		'ip_master_header_button_checkbox',
		array(
			'label' => esc_html__( 'Open in new tab', 'ip_master' ),
			//'description' => __( 'Have link open in a new tab.' ),
			'section' => 'ip_master_header_section',
			'type' => 'checkbox',
			'active_callback' => 'ip_master_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);

	function ip_master_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	// Register a setting for the link text.
	$wp_customize->add_setting(
		'ip_master_header_button_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	// Display the text field... maybe!
	$wp_customize->add_control(
		'ip_master_header_button_text',
		array(
			'label'           => esc_html__( 'Header Button Text', 'ip_master' ),
			'description'     => esc_html__( 'Enter the text to be displayed in the button in the header.', 'ip_master' ),
			'section'         => 'ip_master_header_section',
			'type'            => 'text',
			'active_callback' => 'ip_master_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);
}
add_action( 'customize_register', 'ip_master_customize_header_button' );

/**
 * Sanitizes the select dropdown in the customizer.
 *
 * @author WDS
 * @param string $input  The input.
 * @param string $setting The setting.
 * @return string
 * @author Corey Collins
 */
function ip_master_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checks to see if the link option is selected in our button settings.
 *
 * @author WDS
 * @return boolean True/False whether or not the Link radio is selected.
 * @author Corey Collins
 */
function ip_master_customizer_is_header_button_link() {

	// Get our button setting.
	$button_setting = get_theme_mod( 'ip_master_header_button' );

	if ( 'link' !== $button_setting ) {
		return false;
	}

	return true;
}
