<?php

class bt_bb_progress_bar extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'				=> '',
			'text'				=> '',
			'percentage'		=> '',
			'color_scheme'		=> '',
			'size'				=> '',
			'align'				=> '',
			'style'				=> '',
			'shape'				=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $text == '' ) {
			$text = $percentage . "%";
		}
		
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

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		if ( $title != '' ) {
			$class[] = "btProgressTitleExists";
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}		

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>
		<div class="bt_bb_progress_bar_content"><span class="bt_bb_progress_bar_title">' . $title . '</span><span class="bt_bb_progress_bar_text">' . $text . '</span></div><div class="bt_bb_progress_bar_bg"></div><div class="bt_bb_progress_bar_inner animate" style="width:' . $percentage . '%"></div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();			
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Progress bar', 'prohauz' ), 'description' => esc_html__( 'Progress bar', 'prohauz' ), 'container' => 'vertical', 'accept' => false, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'percentage', 'type' => 'textfield', 'heading' => esc_html__( 'Percentage', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Normal', 'prohauz' ) => 'normal',
						esc_html__( 'Small', 'prohauz' ) => 'small'
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Align', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Inherit', 'prohauz' ) => 'inherit',
						esc_html__( 'Left', 'prohauz' ) => 'left',
						esc_html__( 'Right', 'prohauz' ) => 'right',
						esc_html__( 'Center', 'prohauz' ) => 'center'					
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'prohauz' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 'preview' => true, 'group' => esc_html__( 'Design', 'prohauz' ),
					'value' => array(
						esc_html__( 'Filled', 'prohauz' ) => 'filled',
						esc_html__( 'Line', 'prohauz' ) => 'line',
						esc_html__( 'Outline', 'prohauz' ) => 'outline'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ),
					'value' => array(
						esc_html__( 'Square', 'prohauz' ) => 'square',
						esc_html__( 'Rounded', 'prohauz' ) => 'rounded',
					)
				)				
			)
		) );
	}
}