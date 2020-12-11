<?php

// HEADER STYLE

if ( ! function_exists( 'boldthemes_customize_header_style' ) ) {
	function boldthemes_customize_header_style( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'header_style', array(
			'label'     => esc_html__( 'Header Style', 'prohauz' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[header_style]',
			'priority'  => 62,
			'type'      => 'select',
			'choices'   => array(
				'transparent-light'  	=> esc_html__( 'Transparent Light', 'prohauz' ),
				'transparent-dark'   	=> esc_html__( 'Transparent Dark', 'prohauz' ),
				'opacity-light'   		=> esc_html__( 'Opacity Light', 'prohauz' ),
				'light-accent' 			=> esc_html__( 'Light + Accent', 'prohauz' ),
				'light-dark' 			=> esc_html__( 'Light + Dark', 'prohauz' ),
				'accent-dark' 			=> esc_html__( 'Accent + Dark', 'prohauz' ),
				'accent-light' 			=> esc_html__( 'Accent + Light', 'prohauz' ),
				'grey-light' 			=> esc_html__( 'Grey + Light', 'prohauz' )
			)
		));
	}
}


