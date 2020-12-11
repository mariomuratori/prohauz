<?php

class bt_bb_counter_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'			=> '', 
			'number'		=> '',
			'text'			=> '',
			'size'			=> '',
			'color_scheme' 	=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array(); //array( $this->shortcode );
		
		$class[] = 'bt_bb_counter_icon_holder';

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}


		$icon_html = bt_bb_icon::get_html( $icon, '' );

		$output = '';
		$output .= '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';

			if ( $icon != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_box' ) . '">' . $icon_html . '</div>';

			if ( $number != '' || $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
				if ( $number != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_number' ) . '">' . do_shortcode( "[bt_bb_counter size='large' number='" . $number . "']" ) . '</div>';
				if ( $text != '' ) $output .= '<span class="bt_bb_counter_icon_text">' . $text . '</span>';
			$output .= '</div>';

		$output .= '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;
	}

	function map_shortcode() {
		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
			require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Counter with Icon', 'prohauz' ), 'description' => esc_html__( 'Animated counter with icon and text', 'prohauz' ),  
			'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'prohauz' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => esc_html__( 'Number', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Small', 'prohauz' ) => 'small',
						esc_html__( 'Normal', 'prohauz' ) => 'normal',
						esc_html__( 'Large', 'prohauz' ) => 'large'		
				) ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true )
				)
		) );

	}
}