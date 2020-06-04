<?php
/**
 * Customizer sections.
 *
 * @package IP
 */

/**
 * Register the section sections.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'ip_master_additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'ip_master' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'ip_master_social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'ip_master' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'ip_master' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'ip_master_general_section',
		array(
			'title'       => esc_html__( 'General', 'ip_master' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'ip_master_header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'ip_master' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'ip_master_footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'ip_master' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);
}
add_action( 'customize_register', 'ip_master_customize_sections' );
