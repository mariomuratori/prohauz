<?php

class bt_bb_headline extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'headline'      			=> '',
			'html_tag'      			=> '',
			'font'          			=> '',
			'font_subset'   			=> '',
			'size'     					=> '',
			'font_size'     			=> '',
			'font_weight'   			=> '',
			'subheadline_font_weight'   => '',
			'color_scheme'  			=> '',
			'color'         			=> '',
			'subheadline_color'  		=> '',
			'image'  					=> '',
			'dash'          			=> '',
			'style'         			=> '',
			'align'         			=> '',
			'url'           			=> '',
			'target'        			=> '',
			'superheadline' 			=> '',
			'subheadline'   			=> ''
		) ), $atts, $this->shortcode ) );

		$superheadline = html_entity_decode( $superheadline, ENT_QUOTES, 'UTF-8' );
		$subheadline = html_entity_decode( $subheadline, ENT_QUOTES, 'UTF-8' );
		$headline = html_entity_decode( $headline, ENT_QUOTES, 'UTF-8' );

		if ( $font != '' && $font != 'inherit' ) {
			require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
			bt_bb_enqueue_google_font( $font, $font_subset );
		}

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$html_tag_style = "";
		if ( $font != '' && $font != 'inherit' ) {
			$el_style = $el_style . ';' . 'font-family:\'' . urldecode( $font ) . '\'';
			$html_tag_style .= ';font-family:\'' . urldecode( $font ) . '\'';
		}
		if ( $font_size != '' ) {
			$html_tag_style .= ' ' . ';font-size:' . $font_size ;
		}
		if ( $html_tag_style != "" ) {
			$html_tag_style = " style=\"" . $html_tag_style . "\"";
		}

		$h_span_bg_style = '';
		if ( $image != '' && is_numeric( $image ) ) {
			$post_image = get_post( $image );
			if ( $post_image == '' ) return;
			$image = wp_get_attachment_image_src( $image, $size );
			$image = $image[0];
			$class[] = "btHasBgImage";
			$h_span_bg_style = "style = \"background-image:url('" . $image . "')\"";
		}
		
		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}

		if ( $subheadline_font_weight != '' ) {
			$class[] = $this->prefix . 'subheadline_font_weight_' . $subheadline_font_weight ;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $color != '' ) {
			$el_style = $el_style . ';' . 'color:' . $color . ';border-color:' . $color . ';';
		}

		if ( $dash != '' ) {
			$class[] = $this->prefix . 'dash' . '_' . $dash;
		}
		
		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}
		
		if ( $target == '' ) {
			$target = '_self';
		}

		if ( $superheadline != '' ) {
			$class[] = $this->prefix . 'superheadline';
			$superheadline = '<span class="' . esc_attr( $this->shortcode  . '_superheadline' ) . '">' . $superheadline . '</span>';
		}
		
		if ( $subheadline != '' ) {
			$class[] = $this->prefix . 'subheadline';
			if ( $subheadline_color != '' ) {
				$subheadline = '<div class="' . esc_attr( $this->shortcode . '_subheadline' ) . '" style="color: ' . $subheadline_color . ';">' . $subheadline . '</div>';
			} else {
				$subheadline = '<div class="' . esc_attr( $this->shortcode . '_subheadline' ) . '">' . $subheadline . '</div>';
			}
			$subheadline = nl2br( $subheadline );
		}


		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $headline != '' ) {
			if ( $url != '' ) {
				$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $headline ) );
				$headline = '<a href="' . esc_url_raw( $url ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $headline . '</a>';
			}		
			$headline = '<span class="' . esc_attr( $this->shortcode . '_content' ) . '"><span ' . $h_span_bg_style . '>' . $headline . '</span></span>';		
		}
		
		$headline = nl2br( $headline );

		$output = '<header' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
		if ( $headline != '' || $superheadline != '' ) $output .= '<' . $html_tag . $html_tag_style . '>' . $superheadline . $headline . '</' . $html_tag . '>';
		$output .= $subheadline . '</header>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/fonts.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();	

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Headline', 'prohauz' ), 'description' => esc_html__( 'Headline with custom Google fonts', 'prohauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'superheadline', 'type' => 'textfield', 'heading' => esc_html__( 'Superheadline', 'prohauz' ) ),
				array( 'param_name' => 'headline', 'type' => 'textarea', 'heading' => esc_html__( 'Headline', 'prohauz' ), 'preview' => true, 'preview_strong' => true ),
				array( 'param_name' => 'subheadline', 'type' => 'textarea', 'heading' => esc_html__( 'Subheadline', 'prohauz' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'heading' => esc_html__( 'HTML tag', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'h1', 'prohauz' ) => 'h1',
						esc_html__( 'h2', 'prohauz' ) => 'h2',
						esc_html__( 'h3', 'prohauz' ) => 'h3',
						esc_html__( 'h4', 'prohauz' ) => 'h4',
						esc_html__( 'h5', 'prohauz' ) => 'h5',
						esc_html__( 'h6', 'prohauz' ) => 'h6'
				) ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'prohauz' ), 'description' => 'Predefined heading sizes, independent of html tag',
					'value' => array(
						esc_html__( 'Inherit', 'prohauz' ) => 'inherit',
						esc_html__( 'Extra Small', 'prohauz' ) => 'extrasmall',
						esc_html__( 'Small', 'prohauz' ) => 'small',
						esc_html__( 'Medium', 'prohauz' ) => 'medium',
						esc_html__( 'Normal', 'prohauz' ) => 'normal',
						esc_html__( 'Large', 'prohauz' ) => 'large',
						esc_html__( 'Extra large', 'prohauz' ) => 'extralarge',
						esc_html__( 'Huge', 'prohauz' ) => 'huge'
					)
				),				
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'prohauz' ),
					'value' => array(
						esc_html__( 'Inherit', 'prohauz' ) => 'inherit',
						esc_html__( 'Center', 'prohauz' ) => 'center',
						esc_html__( 'Left', 'prohauz' ) => 'left',
						esc_html__( 'Right', 'prohauz' ) => 'right'
					)
				),
				array( 'param_name' => 'dash', 'type' => 'dropdown', 'heading' => esc_html__( 'Dash', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ),
					'value' => array(
						esc_html__( 'None', 'prohauz' ) => 'none',
						esc_html__( 'Top', 'prohauz' ) => 'top',
						esc_html__( 'Bottom', 'prohauz' ) => 'bottom',
						esc_html__( 'Top and bottom', 'prohauz' ) => 'top_bottom'
					)
				),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Headline Style', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true, 
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 	=> '',
						esc_html__( 'Square', 'prohauz' ) 	=> 'square'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Headline Color', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'subheadline_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Subheadline Color', 'prohauz' ), 'group' => esc_html__( 'Design', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'image', 'type' => 'attach_image', 'heading' => esc_html__( 'Background image', 'prohauz' ), 'preview' => true, 'group' => esc_html__( 'Font', 'prohauz' ) ),
				array( 'param_name' => 'font', 'type' => 'dropdown', 'heading' => esc_html__( 'Font', 'prohauz' ), 'group' => esc_html__( 'Font', 'prohauz' ), 'preview' => true,
					'value' => array ( esc_html__( 'Inherit', 'prohauz' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'font_subset', 'type' => 'textfield', 'heading' => esc_html__( 'Font subset', 'prohauz' ), 'group' => esc_html__( 'Font', 'prohauz' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),
				array( 'param_name' => 'font_size', 'type' => 'textfield', 'heading' => esc_html__( 'Custom font size', 'prohauz' ), 'group' => esc_html__( 'Font', 'prohauz' ), 'description' => 'E.g. 20px or 1.5rem' ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'prohauz' ), 'preview' => true, 'group' => esc_html__( 'Font', 'prohauz' ),
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> '',
						esc_html__( 'Thin', 'prohauz' ) 		=> 'thin',
						esc_html__( 'Lighter', 'prohauz' ) 		=> 'lighter',
						esc_html__( 'Light', 'prohauz' ) 		=> 'light',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
						esc_html__( 'Semi bold', 'prohauz' ) 	=> 'semi-bold',
						esc_html__( 'Bold', 'prohauz' ) 		=> 'bold',
						esc_html__( 'Bolder', 'prohauz' ) 		=> 'bolder'
					)
				),
				array( 'param_name' => 'subheadline_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Subheadline Font weight', 'prohauz' ), 'group' => esc_html__( 'Font', 'prohauz' ),
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> '',
						esc_html__( 'Thin', 'prohauz' ) 		=> 'thin',
						esc_html__( 'Lighter', 'prohauz' ) 		=> 'lighter',
						esc_html__( 'Light', 'prohauz' ) 		=> 'light',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
						esc_html__( 'Semi bold', 'prohauz' ) 	=> 'semi-bold',
						esc_html__( 'Bold', 'prohauz' ) 		=> 'bold',
						esc_html__( 'Bolder', 'prohauz' ) 		=> 'bolder'
					)
				),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'prohauz' ), 'group' => esc_html__( 'URL', 'prohauz' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'prohauz' ), 'group' => esc_html__( 'URL', 'prohauz' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'prohauz' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'prohauz' ) => '_blank'
					)
				)
			)
		) );
	}
}