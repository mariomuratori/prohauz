<?php

/* Remove unused params */

remove_action( 'customize_register', 'boldthemes_customize_hide_headline' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_hide_headline' );



// DEFAULT HEADLINE

BoldThemes_Customize_Default::$data['default_headline'] = 'show';

if ( ! function_exists( 'boldthemes_customize_default_headline' ) ) {
	function boldthemes_customize_default_headline( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_headline]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_headline'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_headline', array(
			'label'     => esc_html__( 'Default Headline', 'prohauz' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_headline]',
			'priority'  => 95,
			'type'      => 'select',
			'choices'   => array(
				'hide'			=> esc_html__( 'Hide', 'prohauz' ),
				'show' 			=> esc_html__( 'Show', 'prohauz' ),
				'show-square' 	=> esc_html__( 'Show with square', 'prohauz' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_headline' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_headline' );


// HEADING WEIGHT

BoldThemes_Customize_Default::$data['default_heading_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_heading_weight' ) ) {
	function boldthemes_customize_default_heading_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_heading_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_heading_weight', array(
			'label'     => esc_html__( 'Heading Weight', 'prohauz' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]',
			'priority'  => 100,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'prohauz' ),
				'thin' 		=> esc_html__( 'Thin', 'prohauz' ),
				'lighter' 	=> esc_html__( 'Lighter', 'prohauz' ),
				'light' 	=> esc_html__( 'Light', 'prohauz' ),
				'normal' 	=> esc_html__( 'Normal', 'prohauz' ),
				'semi-bold' => esc_html__( 'Semi bold', 'prohauz' ),
				'bold' 		=> esc_html__( 'Bold', 'prohauz' ),
				'bolder' 	=> esc_html__( 'Bolder', 'prohauz' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_heading_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_heading_weight' );

// CAPITALIZE MAIN MENU

BoldThemes_Customize_Default::$data['capitalize_main_menu'] = true;
if ( ! function_exists( 'boldthemes_customize_capitalize_main_menu' ) ) {
	function boldthemes_customize_capitalize_main_menu( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]', array(
			'default'           => BoldThemes_Customize_Default::$data['capitalize_main_menu'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'capitalize_main_menu', array(
			'label'     => esc_html__( 'Capitalize Main Menu Items', 'prohauz' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]',
			'priority'  => 150,
			'type'      => 'checkbox'
		));
	}
}

add_action( 'customize_register', 'boldthemes_customize_capitalize_main_menu' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_capitalize_main_menu' );

/* Helper function */

if ( ! function_exists( 'prohauz_body_class' ) ) {
	function prohauz_body_class( $extra_class ) {
		if ( boldthemes_get_option( 'default_heading_weight' ) ) {
			$extra_class[] =  'btHeadingWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_heading_weight' ) );
		}
		return $extra_class;
	}
}
