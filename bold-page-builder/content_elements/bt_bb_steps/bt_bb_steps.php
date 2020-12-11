<?php

class bt_bb_steps extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'         => '',
			'title'        => '',
			'text'         => '',
			'step'         => '',
			'color_scheme' => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $step != '' ) {
			$class[] = $this->prefix . 'step' . '_' . $step;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		$icon_html = bt_bb_icon::get_html( $icon, '' );
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		

		// ICON HODLER
		
			if ( $icon != '' ) $output = '<div class="' . esc_attr( $this->shortcode . '_icon_holder' ) . '">';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_before' ) . '"></div>';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_after' ) . '"></div>';
			$output .= '</div>';

			// CONTENT
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
				if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_title' ) . '">' . wp_kses_post( $title ) . '</div>';
				if ( $text != '' )  $output .= '<div class="' . esc_attr( $this->shortcode . '_content_text' ) . '">' . wp_kses_post( nl2br( $text ) ) . '</div>';
			$output .= '</div>';
		



		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . ( $output ) . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$icon_arr = boldthemes_get_icon_fonts_bb_array();

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Steps', 'prohauz' ), 'description' => esc_html__( 'Steps with icon', 'prohauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'prohauz' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'prohauz' ) ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true
				),
				array( 'param_name' => 'step', 'type' => 'dropdown', 'heading' => esc_html__( 'Choose Step', 'prohauz' ), 'default' => 'first', 'preview' => true, 
					'value' => array(
						esc_html__( 'First step', 'prohauz' ) 	=> 'first',
						esc_html__( 'Next step', 'prohauz' ) 	=> 'next',
						esc_html__( 'Last step', 'prohauz' ) 	=> 'last'
					)
				)
			)
		) );
	}
}