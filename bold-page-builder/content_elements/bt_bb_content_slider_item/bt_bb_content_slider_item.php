<?php

class bt_bb_content_slider_item extends BT_BB_Element {
	
	public $auto_play = '';

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'      			=> '',
			'background_overlay'    => '',
			'image_size' 			=> '',
			'style' 				=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = ' ' . 'style="' . esc_attr( $el_style );

		if ( $image != '' ) {
			$image_src = wp_get_attachment_image_src( $image, $image_size );
			$style_attr .= ';background-image:url(' . $image_src[0] . ')';
		}
		
		if ( $background_overlay != '' ) {
			$class[] = 'bt_bb_background_overlay' . '_' . $background_overlay;
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$style_attr .= '"';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><div class="bt_bb_content_slider_item_content content">' . wptexturize( do_shortcode( $content ) ) . '</div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Slider Item', 'prohauz' ), 'description' => esc_html__( 'Individual slide element', 'prohauz' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tab_item' => false, 'bt_bb_accordion_item' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'accept_all' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'heading' => esc_html__( 'Background image', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'prohauz' ), 
					'value' => array(
						esc_html__( 'No overlay', 'prohauz' )    => '',
						esc_html__( 'Light stripes', 'prohauz' ) => 'light_stripes',
						esc_html__( 'Dark stripes', 'prohauz' )  => 'dark_stripes',
						esc_html__( 'Light solid', 'prohauz' )	  => 'light_solid',
						esc_html__( 'Dark solid', 'prohauz' )	  => 'dark_solid',
						esc_html__( 'Light gradient', 'prohauz' )	  => 'light_gradient',
						esc_html__( 'Dark gradient', 'prohauz' )	  => 'dark_gradient'
					)
				),
				array( 'param_name' => 'image_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Background image size', 'prohauz' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 						=> '',
						esc_html__( 'Gray background', 'prohauz' ) 				=> 'gray',
						esc_html__( 'Gray background + border', 'prohauz' ) 	=> 'gray_border',
						esc_html__( 'White background', 'prohauz' ) 			=> 'white',
						esc_html__( 'White background + border', 'prohauz' ) 	=> 'white_border'
					)
				)
			)
		) );
	}
}