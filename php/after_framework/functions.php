<?php

// SECTION - OVERLAY

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_section', 'background_overlay' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_section', array(
		array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'prohauz' ), 'preview' => true, 'preview_strong' => true, 'group' => esc_html__( 'Design', 'prohauz' ), 
			'value' => array(
				esc_html__( 'No overlay', 'prohauz' )    	=> '',
				esc_html__( 'Light stripes', 'prohauz' ) 	=> 'light_stripes',
				esc_html__( 'Dark stripes', 'prohauz' )  	=> 'dark_stripes',
				esc_html__( 'Light solid', 'prohauz' )	  	=> 'light_solid',
				esc_html__( 'Dark solid', 'prohauz' )	  	=> 'dark_solid',
				esc_html__( 'Light gradient', 'prohauz' )	=> 'light_gradient',
				esc_html__( 'Dark gradient', 'prohauz' )	=> 'dark_gradient',
				esc_html__( 'Cross top', 'prohauz' )	  	=> 'cross_top',
				esc_html__( 'Cross bottom', 'prohauz' )	  	=> 'cross_bottom'
			)
		),
	));
}

function prohauz_bt_bb_section_class( $class, $atts ) {
	if ( isset( $atts['background_overlay'] ) && $atts['background_overlay'] != '' ) {
		$class[] = 'bt_bb_background_overlay' . '_' . $atts['background_overlay'];
	}
	return $class;
}

add_filter( 'bt_bb_section_class', 'prohauz_bt_bb_section_class', 10, 2 );


// ROW - NEGATIVE MARGIN & SHADOW

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row', array(
		array( 'param_name' => 'negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Negative Margin', 'prohauz' ), 'group' => esc_html__( 'General', 'prohauz' ), 'preview' => true,
			'value' => array(
					esc_html__( 'No margin', 'prohauz' ) 	=> '',
					esc_html__( 'Small', 'prohauz' ) 		=> 'small',
					esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
					esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
					esc_html__( 'Large', 'prohauz' ) 		=> 'large',
					esc_html__( 'Extra Large', 'prohauz' ) 	=> 'extralarge'
				)
			),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 
			'group' => esc_html__( 'General', 'prohauz' ), 'preview' => true, 
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 	=> '',
				esc_html__( 'Shadow', 'prohauz' ) 	=> 'shadow',
				esc_html__( 'Border', 'prohauz' ) 	=> 'border'
			)
		)
	));
}

function prohauz_bt_bb_row_class( $class, $atts ) {
	if ( isset( $atts['negative_margin'] ) && $atts['negative_margin'] != '' ) {
		$class[] = 'bt_bb_negative_margin' . '_' . $atts['negative_margin'];
	}
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	return $class;
}

add_filter( 'bt_bb_row_class', 'prohauz_bt_bb_row_class', 10, 2 );



// INNER ROW - NEGATIVE MARGIN & SHADOW

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row_inner', array(
		array( 'param_name' => 'negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Negative Margin', 'prohauz' ), 'group' => esc_html__( 'General', 'prohauz' ), 'preview' => true,
			'value' => array(
					esc_html__( 'No margin', 'prohauz' ) 	=> '',
					esc_html__( 'Small', 'prohauz' ) 		=> 'small',
					esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
					esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
					esc_html__( 'Large', 'prohauz' ) 		=> 'large',
					esc_html__( 'Extra Large', 'prohauz' ) 	=> 'extralarge'
				)
			),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 
			'group' => esc_html__( 'General', 'prohauz' ), 'preview' => true, 
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 	=> '',
				esc_html__( 'Shadow', 'prohauz' ) 	=> 'shadow',
				esc_html__( 'Border', 'prohauz' ) 	=> 'border'
			)
		)
	));
}

function prohauz_bt_bb_row_inner_class( $class, $atts ) {
	if ( isset( $atts['negative_margin'] ) && $atts['negative_margin'] != '' ) {
		$class[] = 'bt_bb_negative_margin' . '_' . $atts['negative_margin'];
	}
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	return $class;
}

add_filter( 'bt_bb_row_inner_class', 'prohauz_bt_bb_row_inner_class', 10, 2 );



// COLUMN - STYLE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'prohauz' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
				esc_html__( 'Double', 'prohauz' ) 		=> 'double',
				esc_html__( 'Text Indent', 'prohauz' ) 	=> 'text_indent',
				esc_html__( '0px', 'prohauz' ) 			=> '0',
				esc_html__( '5px', 'prohauz' ) 			=> '5',
				esc_html__( '10px', 'prohauz' ) 		=> '10',
				esc_html__( '15px', 'prohauz' ) 		=> '15',
				esc_html__( '20px', 'prohauz' ) 		=> '20',
				esc_html__( '25px', 'prohauz' ) 		=> '25',
				esc_html__( '30px', 'prohauz' ) 		=> '30',
				esc_html__( '35px', 'prohauz' ) 		=> '35',
				esc_html__( '40px', 'prohauz' ) 		=> '40',
				esc_html__( '45px', 'prohauz' ) 		=> '45',
				esc_html__( '50px', 'prohauz' ) 		=> '50',
				esc_html__( '60px', 'prohauz' ) 		=> '60',
				esc_html__( '70px', 'prohauz' ) 		=> '70',
				esc_html__( '80px', 'prohauz' ) 		=> '80',
				esc_html__( '90px', 'prohauz' ) 		=> '90',
				esc_html__( '100px', 'prohauz' ) 		=> '100'
			)
		),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 
			'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true, 
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 						=> '',
				esc_html__( 'Shadow', 'prohauz' ) 						=> 'shadow',
				esc_html__( 'Inner shadow', 'prohauz' ) 				=> 'inner_shadow',
				esc_html__( 'Shadow on hover', 'prohauz' ) 				=> 'hover_shadow',
				esc_html__( 'Border + Shadow on hover', 'prohauz' ) 	=> 'border_shadow'
			)
		)
	));
}

function prohauz_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	return $class;
}

add_filter( 'bt_bb_column_class', 'prohauz_bt_bb_column_class', 10, 2 );



// INNER COLUMN - STYLE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column_inner', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner Padding', 'prohauz' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'prohauz' ) 	=> 'normal',
				esc_html__( 'Double', 'prohauz' ) 	=> 'double',
				esc_html__( 'Text Indent', 'prohauz' ) => 'text_indent',
				esc_html__( '0px', 'prohauz' ) 		=> '0',
				esc_html__( '5px', 'prohauz' ) 		=> '5',
				esc_html__( '10px', 'prohauz' ) 	=> '10',
				esc_html__( '15px', 'prohauz' ) 	=> '15',
				esc_html__( '20px', 'prohauz' ) 	=> '20',
				esc_html__( '25px', 'prohauz' ) 	=> '25',
				esc_html__( '30px', 'prohauz' ) 	=> '30',
				esc_html__( '35px', 'prohauz' ) 	=> '35',
				esc_html__( '40px', 'prohauz' ) 	=> '40',
				esc_html__( '45px', 'prohauz' ) 	=> '45',
				esc_html__( '50px', 'prohauz' ) 	=> '50',
				esc_html__( '60px', 'prohauz' ) 	=> '60',
				esc_html__( '70px', 'prohauz' ) 	=> '70',
				esc_html__( '80px', 'prohauz' ) 	=> '80',
				esc_html__( '90px', 'prohauz' ) 	=> '90',
				esc_html__( '100px', 'prohauz' ) 	=> '100'
			)
		),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 
			'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true, 
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 						=> '',
				esc_html__( 'Shadow', 'prohauz' ) 						=> 'shadow',
				esc_html__( 'Inner shadow', 'prohauz' ) 				=> 'inner_shadow',
				esc_html__( 'Shadow on hover', 'prohauz' ) 				=> 'hover_shadow',
				esc_html__( 'Border + Shadow on hover', 'prohauz' ) 	=> 'border_shadow'
			)
		)
	));
}

function prohauz_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	return $class;
}

add_filter( 'bt_bb_column_inner_class', 'prohauz_bt_bb_column_inner_class', 10, 2 );



// ICON - NEGATIVE MARGIN

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_icon', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'prohauz' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Small', 'prohauz' ) 		=> 'small',
				esc_html__( 'Extra small', 'prohauz' ) 	=> 'xsmall',
				esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
				esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
				esc_html__( 'Large', 'prohauz' ) 		=> 'large',
				esc_html__( 'Extra large', 'prohauz' ) 	=> 'xlarge'
			)
		)	
	) );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Negative Margin', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true,
			'value' => array(
					esc_html__( 'No', 'prohauz' ) 		=> '',
					esc_html__( 'Small', 'prohauz' ) 	=> 'small',
					esc_html__( 'Normal', 'prohauz' ) 	=> 'normal',
					esc_html__( 'Medium', 'prohauz' ) 	=> 'medium'
				)
			)
		)
	);
}

function prohauz_bt_bb_icon_class( $class, $atts ) {
	if ( isset( $atts['negative_margin'] ) && $atts['negative_margin'] != '' ) {
		$class[] = 'bt_bb_negative_margin' . '_' . $atts['negative_margin'];
	}
	return $class;
}

add_filter( 'bt_bb_icon_class', 'prohauz_bt_bb_icon_class', 10, 2 );


// IMAGE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_image', 'hover_style' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_image', array(
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 'group' => esc_html__( 'General', 'prohauz' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 	=> '',
				esc_html__( 'Border', 'prohauz' ) 	=> 'border'
			)
		),
		array( 'param_name' => 'inner_padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner Padding', 'prohauz' ), 'default' => '15', 'group' => esc_html__( 'Content', 'prohauz' ),
			'value' => array(
				esc_html__( 'Default', 'prohauz' ) 	=> ' ',
				esc_html__( '0px', 'prohauz' ) 		=> '0',
				esc_html__( '5px', 'prohauz' ) 		=> '5',
				esc_html__( '10px', 'prohauz' ) 	=> '10',
				esc_html__( '15px', 'prohauz' ) 	=> '15',
				esc_html__( '20px', 'prohauz' ) 	=> '20',
				esc_html__( '25px', 'prohauz' ) 	=> '25',
				esc_html__( '30px', 'prohauz' ) 	=> '30',
				esc_html__( '35px', 'prohauz' ) 	=> '35',
				esc_html__( '40px', 'prohauz' ) 	=> '40',
				esc_html__( '45px', 'prohauz' ) 	=> '45',
				esc_html__( '50px', 'prohauz' ) 	=> '50',
				esc_html__( '60px', 'prohauz' ) 	=> '60',
				esc_html__( '70px', 'prohauz' ) 	=> '70',
				esc_html__( '80px', 'prohauz' ) 	=> '80',
				esc_html__( '90px', 'prohauz' ) 	=> '90',
				esc_html__( '100px', 'prohauz' ) 	=> '100'
			)
		),
		array( 'param_name' => 'hover_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Mouse hover style', 'prohauz' ), 'group' => esc_html__( 'URL', 'prohauz' ),
			'value' => array(
				esc_html__( 'Simple', 'prohauz' ) => 'simple',
				esc_html__( 'Flip', 'prohauz' ) => 'flip',
				esc_html__( 'Zoom in', 'prohauz' ) => 'zoom-in',
				esc_html__( 'To grayscale', 'prohauz' ) => 'to-grayscale',
				esc_html__( 'From grayscale', 'prohauz' ) => 'from-grayscale',
				esc_html__( 'Zoom in to grayscale', 'prohauz' ) => 'zoom-in-to-grayscale',
				esc_html__( 'Zoom in from grayscale', 'prohauz' ) => 'zoom-in-from-grayscale',
				esc_html__( 'Scroll', 'prohauz' ) => 'scroll',
				esc_html__( 'Move up', 'prohauz' ) => 'move-up'
			)
		),
	));
}

function prohauz_bt_bb_image_class( $class, $atts ) {
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	if ( isset( $atts['inner_padding'] ) && $atts['inner_padding'] != '' ) {
		$class[] = 'bt_bb_inner_padding' . '_' . $atts['inner_padding'];
	}
	return $class;
}

add_filter( 'bt_bb_image_class', 'prohauz_bt_bb_image_class', 10, 2 );


// SEPARATOR

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_separator', 'top_spacing' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_separator', 'bottom_spacing' );
}
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_separator', array(
		array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'prohauz' ), 'weight' => 0, 'preview' => true,
				'value' => array(
					esc_html__( 'No spacing', 'prohauz' ) 	=> '',
					esc_html__( 'Extra small', 'prohauz' ) 	=> 'extra_small',
					esc_html__( 'Small', 'prohauz' ) 		=> 'small',		
					esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
					esc_html__( 'Medium', 'prohauz' )	 	=> 'medium',
					esc_html__( 'Large', 'prohauz' ) 		=> 'large',
					esc_html__( 'Extra large', 'prohauz' ) 	=> 'extra_large',
					esc_html__( '5px', 'prohauz' ) 			=> '5',
					esc_html__( '10px', 'prohauz' ) 		=> '10',
					esc_html__( '15px', 'prohauz' ) 		=> '15',
					esc_html__( '20px', 'prohauz' ) 		=> '20',
					esc_html__( '25px', 'prohauz' ) 		=> '25',
					esc_html__( '30px', 'prohauz' ) 		=> '30',
					esc_html__( '35px', 'prohauz' ) 		=> '35',
					esc_html__( '40px', 'prohauz' ) 		=> '40',
					esc_html__( '45px', 'prohauz' ) 		=> '45',
					esc_html__( '50px', 'prohauz' ) 		=> '50',
					esc_html__( '60px', 'prohauz' )			=> '60',
					esc_html__( '70px', 'prohauz' ) 		=> '70',
					esc_html__( '80px', 'prohauz' ) 		=> '80',
					esc_html__( '90px', 'prohauz' ) 		=> '90',
					esc_html__( '100px', 'prohauz' ) 		=> '100'
				)
			),
			array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'prohauz' ), 'weight' => 1, 'preview' => true,
				'value' => array(
					esc_html__( 'No spacing', 'prohauz' ) 	=> '',
					esc_html__( 'Extra small', 'prohauz' ) 	=> 'extra_small',
					esc_html__( 'Small', 'prohauz' ) 		=> 'small',		
					esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
					esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
					esc_html__( 'Large', 'prohauz' ) 		=> 'large',
					esc_html__( 'Extra large', 'prohauz' ) 	=> 'extra_large',
					esc_html__( '5px', 'prohauz' ) 			=> '5',
					esc_html__( '10px', 'prohauz' ) 		=> '10',
					esc_html__( '15px', 'prohauz' ) 		=> '15',
					esc_html__( '20px', 'prohauz' ) 		=> '20',
					esc_html__( '25px', 'prohauz' ) 		=> '25',
					esc_html__( '30px', 'prohauz' ) 		=> '30',
					esc_html__( '35px', 'prohauz' ) 		=> '35',
					esc_html__( '40px', 'prohauz' ) 		=> '40',
					esc_html__( '45px', 'prohauz' ) 		=> '45',
					esc_html__( '50px', 'prohauz' ) 		=> '50',
					esc_html__( '60px', 'prohauz' ) 		=> '60',
					esc_html__( '70px', 'prohauz' ) 		=> '70',
					esc_html__( '80px', 'prohauz' ) 		=> '80',
					esc_html__( '90px', 'prohauz' ) 		=> '90',
					esc_html__( '100px', 'prohauz' ) 		=> '100'
				)
			),
	) );
}
