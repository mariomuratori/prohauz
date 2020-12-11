<?php

class bt_bb_content_slider extends BT_BB_Element {
	
	public $auto_play = '';

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'height'    			=> '',
			'animation' 			=> '',
			'gap' 					=> '',
			'slides_to_show' 		=> '',
			'auto_play' 			=> '',
			'arrows_size' 			=> '',
			'arrows_position'		=> '',
			'arrows_style'			=> '',
			'color_scheme' 			=> '',
			'show_dots' 			=> ''			
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		$slider_class = array( 'slick-slider' );
		
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
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $arrows_size != '' ) {
			$class[] = $this->prefix . 'arrows_size' . '_' . $arrows_size;
		}

		if ( $arrows_position != '' ) {
			$class[] = $this->prefix . 'arrows_position' . '_' . $arrows_position;
		}

		if ( $arrows_style != '' ) {
			$class[] = $this->prefix . 'arrows_style' . '_' . $arrows_style;
		}
		
		if ( $show_dots != '' ) {
			$class[] = $this->prefix . 'show_dots_' . $show_dots;
		}
		
		if ( $height != '' ) {
			$class[] = $this->prefix . 'height' . '_' . $height;
		}
		
		if ( $animation != '' ) {
			$class[] = $this->prefix . 'animation' . '_' . $animation;
		}
		
		$data_slick  = ' data-slick=\'{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "600"';
		
		if ( $animation == 'fade' ) {
			$data_slick .= ', "fade": true';
			$slider_class[] = 'fade';
			$slides_to_show = 1;
		}
		
		if ( $arrows_size != 'no_arrows' ) {
			$data_slick  .= ', "prevArrow": "&lt;button type=\"button\" class=\"slick-prev\"&gt;", "nextArrow": "&lt;button type=\"button\" class=\"slick-next\"&gt;"';
		} else {
			$data_slick  .= ', "prevArrow": "", "nextArrow": ""';
		}
		
		if ( $height != 'keep-height' ) {
			$data_slick .= ', "adaptiveHeight": true';
		}
		
		if ( $show_dots != 'hide' ) {
			$data_slick .= ', "dots": true' ;
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ',"slidesToShow": ' . intval( $slides_to_show );
			$class[] = $this->prefix . 'multiple_slides';
		}
		
		if ( $auto_play != '' ) {
			$data_slick .= ',"autoplay": true, "autoplaySpeed": ' . intval( $auto_play );
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( is_rtl() ) {
			$data_slick .= ', "rtl": true' ;
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ', "responsive": [';
			if ( $slides_to_show > 1 ) {
				$data_slick .= '{ "breakpoint": 480, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } }';	
			}
			if ( $slides_to_show > 2 ) {
				$data_slick .= ',{ "breakpoint": 768, "settings": { "slidesToShow": 2, "slidesToScroll": 2 } }';	
			}
			if ( $slides_to_show > 3 ) {
				$data_slick .= ',{ "breakpoint": 920, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}
			if ( $slides_to_show > 4 ) {
				$data_slick .= ',{ "breakpoint": 1024, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}				
			$data_slick .= ']';
		}
		$data_slick = $data_slick . '}\' ';
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><div class="' . implode( ' ', $slider_class ) . '" ' . $data_slick .  '>' . do_shortcode( $content ) . '</div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Slider', 'prohauz' ), 'description' => esc_html__( 'Slider with custom content', 'prohauz' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_content_slider_item' => true ), 'toggle' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'height', 'type' => 'dropdown', 'preview' => true, 'heading' => esc_html__( 'Size', 'prohauz' ),
					'value' => array(
						esc_html__( 'Auto', 'prohauz' ) 		=> 'auto',
						esc_html__( 'Keep height', 'prohauz' ) 	=> 'keep-height',
						esc_html__( 'Half screen', 'prohauz' ) 	=> 'half_screen',
						esc_html__( 'Full screen', 'prohauz' ) 	=> 'full_screen'
					)
				),
				array( 'param_name' => 'animation', 'type' => 'dropdown', 'heading' => esc_html__( 'Animation', 'prohauz' ), 'description' => esc_html__( 'If fade is selected, number of slides to show will be 1', 'prohauz' ),
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 	=> 'slide',
						esc_html__( 'Fade', 'prohauz' ) 	=> 'fade'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'prohauz' ),
					'value' => array(
						esc_html__( 'No gap', 'prohauz' ) 	=> 'no_gap',
						esc_html__( 'Small', 'prohauz' ) 	=> 'small',
						esc_html__( 'Normal', 'prohauz' ) 	=> 'normal',
						esc_html__( 'Large', 'prohauz' ) 	=> 'large'
					)
				),
				array( 'param_name' => 'slides_to_show', 'type' => 'textfield', 'preview' => true, 'default' => 1, 'heading' => esc_html__( 'Number of slides to show', 'prohauz' ), 'description' => esc_html__( 'e.g. 3', 'prohauz' ) ),
				array( 'param_name' => 'auto_play', 'type' => 'textfield', 'heading' => esc_html__( 'Autoplay interval (ms)', 'prohauz' ), 'description' => esc_html__( 'e.g. 2000', 'prohauz' ) ),
				array( 'param_name' => 'arrows_size', 'type' => 'dropdown', 'preview' => true, 'default' => 'normal', 'weight' => 1, 'heading' => esc_html__( 'Navigation arrows size', 'prohauz' ), 'group' => 'Navigation',
					'value' => array(
						esc_html__( 'Small', 'prohauz' ) 		=> 'small',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Large', 'prohauz' ) 		=> 'large'
					)
				),
				array( 'param_name' => 'arrows_position', 'default' => '', 'weight' => 2, 'preview' => true, 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation arrows position', 'prohauz' ), 'group' => 'Navigation',
					'value' => array(
						esc_html__( 'No arrows', 'prohauz' ) 		=> 'no_arrows',
						esc_html__( 'Middle Inside', 'prohauz' ) 	=> '',
						esc_html__( 'Middle Outside', 'prohauz' ) 	=> 'middle-outside'
					)
				),
				array( 'param_name' => 'arrows_style', 'default' => 'borderless', 'weight' => 3, 'preview' => true, 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation arrows style', 'prohauz' ), 'group' => 'Navigation',
					'value' => array(
						esc_html__( 'Filled', 'prohauz' ) 		=> 'filled',
						esc_html__( 'Borderless', 'prohauz' ) 	=> 'borderless'
					)
				),
				array( 'param_name' => 'color_scheme', 'preview' => true, 'type' => 'dropdown', 'weight' => 4, 'heading' => esc_html__( 'Navigation color scheme', 'prohauz' ), 'group' => 'Navigation', 'value' => $color_scheme_arr ),
				array( 'param_name' => 'show_dots', 'type' => 'dropdown', 'weight' => 5, 'default' => 'bottom', 'heading' => esc_html__( 'Dots navigation', 'prohauz' ), 'group' => 'Navigation',
					'value' => array(
						esc_html__( 'Show on bottom', 'prohauz' ) 		=> 'bottom',
						esc_html__( 'Show below content', 'prohauz' ) 	=> 'below',
						esc_html__( 'Hide', 'prohauz' ) 				=> 'hide'
					)
				)
			)
		) );
	}
}