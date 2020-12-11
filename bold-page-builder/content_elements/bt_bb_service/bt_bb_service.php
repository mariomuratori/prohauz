<?php

class bt_bb_service extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'      	  		=> '',
			'title'      	 		=> '',
			'text'        			=> '',
			'url'         	 		=> '',
			'target'       			=> '',
			'color_scheme' 			=> '',
			'style'        			=> '',
			'size'         			=> '',
			'shape'       	 		=> '',
			'align'        			=> '',
			'title_size'			=> '',
			'title_weight' 			=> ''
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
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $title_weight != '' ) {
			$class[] = $this->prefix . 'title_weight' . '_' . $title_weight;
		}

		if ( $text == '' ) {
			$class[] = 'btNoText';
		}
		
		$icon = bt_bb_icon::get_html( $icon, '', $url, $title, $target );

		if ( $url != '' ) {
			$title = '<a href="' . esc_url_raw( $url ) . '" target="' . esc_attr( $target ) . '">' . $title . '</a>';
		}
				
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = $icon;

		$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
			if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_title' ) . '">' . wp_kses_post( $title ) . '</div>';
			if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_text' ) . '">' . wp_kses_post( nl2br( $text ) ) . '</div>';
		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';
		
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

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Service', 'prohauz' ), 'description' => esc_html__( 'Icon with text', 'prohauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'prohauz' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'prohauz' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'prohauz' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'prohauz' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'prohauz' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'prohauz' ) => '_blank',
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon alignment', 'prohauz' ), 'group' => esc_html__( 'Icon', 'prohauz' ),
					'value' => array(
						esc_html__( 'Inherit', 'prohauz' ) => 'inherit',
						esc_html__( 'Left', 'prohauz' ) => 'left',
						esc_html__( 'Right', 'prohauz' ) => 'right'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'prohauz' ), 'preview' => true, 'group' => esc_html__( 'Icon', 'prohauz' ),
					'value' => array(
						esc_html__( 'Extra small', 'prohauz' ) => 'xsmall',
						esc_html__( 'Small', 'prohauz' ) => 'small',
						esc_html__( 'Normal', 'prohauz' ) => 'normal',
						esc_html__( 'Large', 'prohauz' ) => 'large',
						esc_html__( 'Extra large', 'prohauz' ) => 'xlarge',
						esc_html__( 'Huge', 'prohauz' ) 		=> 'huge'
					)
				),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'prohauz' ), 'preview' => true, 'group' => esc_html__( 'Icon', 'prohauz' ),
					'value' => array(
						esc_html__( 'Outline', 'prohauz' ) => 'outline',
						esc_html__( 'Filled', 'prohauz' ) => 'filled',
						esc_html__( 'Borderless', 'prohauz' ) => 'borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'prohauz' ), 'group' => esc_html__( 'Icon', 'prohauz' ),
					'value' => array(
						esc_html__( 'Circle', 'prohauz' ) => 'circle',
						esc_html__( 'Square', 'prohauz' ) => 'square',
						esc_html__( 'Rounded Square', 'prohauz' ) => 'round'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Icon', 'prohauz' )
				),
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Title size', 'prohauz' ), 'group' => esc_html__( 'Content', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> 'default',
						esc_html__( 'Extra small', 'prohauz' ) 	=> 'extrasmall',
						esc_html__( 'Small', 'prohauz' ) 		=> 'small',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Large', 'prohauz' ) 		=> 'large',
						esc_html__( 'Extra large', 'prohauz' ) 	=> 'extralarge',
						esc_html__( 'Huge', 'prohauz' ) 		=> 'huge'
					)
				),
				array( 'param_name' => 'title_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Title weight', 'prohauz' ), 'group' => esc_html__( 'Content', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> '',
						esc_html__( 'Thin', 'prohauz' ) 		=> 'thin',
						esc_html__( 'Lighter', 'prohauz' ) 		=> 'lighter',
						esc_html__( 'Light', 'prohauz' ) 		=> 'light',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
						esc_html__( 'Semi bold', 'prohauz' ) 	=> 'semi_bold',
						esc_html__( 'Bold', 'prohauz' ) 		=> 'bold',
						esc_html__( 'Bolder', 'prohauz' ) 		=> 'bolder'
					)
				)
			)
		) );
	}
}