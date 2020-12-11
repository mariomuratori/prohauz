<?php

class bt_bb_single_product extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'product_id'        		=> '',
			'orientation'				=> '',
			'description'      			=> '',
			'categories'				=> '',
			'hide_price'				=> '',
			'title_size'				=> '',
			'title_weight' 				=> '',
			'color_scheme' 				=> '',

			'product_title'        		=> '',
			'product_description'      	=> '',
			'product_price'      		=> '',
			'product_image'      		=> ''
			
		) ), $atts, $this->shortcode ) );
		
		if ( class_exists( 'WooCommerce' ) && $product_id != '' ) {
			$product = wc_get_product( $product_id );
		} else {
			$product = false;
		}
		$product_exists = ( $product != false ) ? true : false;

		$product_description = html_entity_decode( $product_description ) ;
		$product_description = nl2br( $product_description );

		$class = array( $this->shortcode, 'woocommerce' );
		
		if ( !$product_exists ) {
			$class[] = "btNoWooProduct";
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

		if ( $orientation != '' ) {
			$class[] = $this->prefix . 'layout' . '_' . $orientation;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $title_weight != '' ) {
			$class[] = $this->prefix . 'title_weight' . '_' . $title_weight;
		}
		
		if ( $product_title == '' && $product_exists ) {
			$product_title = $product->get_title();
		}
		
		if ( $product_description == '' && $product_exists ) {
			$product_description = $product->get_short_description();
		}
		
		if ( $product_price == '' && $product_exists ) {
			$product_price = $product->get_price_html();
		}
		
		if ( $product_image == '' ) {
			if ( $product_exists ) $product_image = $product->get_image( 'shop_catalog' );
		} else {
			$post_image = get_post( $product_image );
			if ( $post_image == '' ) return;
		
			$image = wp_get_attachment_image_src( $product_image, "full" );
			$caption = $post_image->post_excerpt;
			
			$image = $image[0];
			if ( $caption == '' ) {
				$caption = $product_title;
			}
			$product_image = '<img src="' . esc_attr( $image ) . '" alt="' . esc_attr( $caption ) . '" title="' . esc_attr( $caption ) . '" >';
		}

		$product_categories = "";
		
		if ( $product_exists) {

			$product_categories_arr = get_the_terms( $product->get_id(), 'product_cat' );
			
			$product_categories = '';
			if( !empty( $product_categories_arr ) ){
				$product_categories .= '<span class="btProductCategories">';
				foreach ( $product_categories_arr as $key => $category ) {
					$product_categories .= '<a href="' . esc_url ( get_term_link( $category ) ) . '" class="btProductCategory" >';
					$product_categories .= $category->name;
					$product_categories .= '</a>';
				}
				$product_categories .= "</span>";
			}
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '<div class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '' . $id_attr . '>';
			
			// Product image
			$output .= '<div class="' . esc_attr( $this->shortcode . '_image' ) . '"><a href="' . esc_url( get_permalink( $product_id ) ) . '" target="_self">';
				$output .= $product_image;
			$output .= '</a></div>';

			// Product content
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
				// Product categories
				if ( $categories != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_categories' ) . '">' . wp_kses_post( $product_categories ) . '</div>';

				// Product title
				$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '"><a href="' . esc_url( get_permalink( $product_id ) ) . '" target="_self">' . wp_kses_post( $product_title ) . '</a></div>';

				// Product description
				if ( ( $description != '' ) && ( $product_description != '') )  $output .= '<div class="' . esc_attr( $this->shortcode ) . '_description">' . wp_kses_post( $product_description ) . '</div>';

				// Product price
				if ( $hide_price != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_price' ) . '">' . wp_kses_post( $product_price ) . '</div>';

				// Product button
				if ( $product_exists )  {
					$output .= '<div class="' . esc_attr( $this->shortcode . '_price_cart' ) . '">';
						$output .= do_shortcode( '[add_to_cart id="' . esc_attr( $product_id ) . '" style="" show_price="false"]' );
					$output .= '</div>';
				}
			$output .= '</div>';

		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		// Get product list
		if ( class_exists( 'WooCommerce' )  ) {
			$args = array(
				'limit' 		=> -1,
				'orderby' 		=> 'title',
				'order' 		=> 'ASC',
			);
			$query = new WC_Product_Query( $args );
			$products = $query->get_products();
			$products_arr = array();
			$products_arr[ 'Not selected' ] = 0;
			foreach($products as $product) {
				$products_arr[ $product->get_name() ] = $product->get_id();
			}
		} else {
			$products_arr = array();
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Single product', 'prohauz' ), 'description' => esc_html__( 'Single product', 'prohauz' ), 'container' => 'vertical', 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'product_id', 'type' => 'dropdown', 'heading' => esc_html__( 'Product', 'prohauz' ), 'preview' => true, 'value' => $products_arr ),
				array( 'param_name' => 'orientation', 'type' => 'dropdown', 'heading' => esc_html__( 'Product orientation', 'prohauz' ), 'default' => 'vertical', 'preview' => true,
					'value' => array(
						esc_html__( 'Vertical', 'prohauz' ) 		=> 'vertical',
						esc_html__( 'Horizontal', 'prohauz' ) 		=> 'horizontal'
					)
				),
				array( 'param_name' => 'description', 'type' => 'dropdown', 'heading' => esc_html__( 'Display product description', 'prohauz' ), 'default' => 'show',
					'value' => array(
						esc_html__( 'No', 'prohauz' ) 		=> '',
						esc_html__( 'Yes', 'prohauz' ) 		=> 'show'
					)
				),
				array( 'param_name' => 'categories', 'type' => 'dropdown', 'heading' => esc_html__( 'Display product categories', 'prohauz' ), 'default' => 'show',
					'value' => array(
						esc_html__( 'No', 'prohauz' ) 		=> '',
						esc_html__( 'Yes', 'prohauz' ) 		=> 'show'
					)
				),
				array( 'param_name' => 'hide_price', 'type' => 'dropdown', 'heading' => esc_html__( 'Display product price', 'prohauz' ), 'default' => 'show',
					'value' => array(
						esc_html__( 'No', 'prohauz' ) 		=> '',
						esc_html__( 'Yes', 'prohauz' ) 		=> 'show'
					)
				),
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Title size', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> 'default',
						esc_html__( 'Small', 'prohauz' ) 		=> 'small',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
						esc_html__( 'Large', 'prohauz' ) 		=> 'large'
					)
				),
				array( 'param_name' => 'title_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Title weight', 'prohauz' ),
					'value' => array(
						esc_html__( 'Default', 'prohauz' ) 		=> '',
						esc_html__( 'Thin', 'prohauz' ) 		=> 'thin',
						esc_html__( 'Lighter', 'prohauz' ) 		=> 'lighter',
						esc_html__( 'Light', 'prohauz' ) 		=> 'light',
						esc_html__( 'Normal', 'prohauz' ) 		=> 'normal',
						esc_html__( 'Medium', 'prohauz' ) 		=> 'medium',
						esc_html__( 'Bold', 'prohauz' ) 		=> 'bold',
						esc_html__( 'Semi bold', 'prohauz' ) 	=> 'semi_bold',
						esc_html__( 'Bolder', 'prohauz' ) 		=> 'bolder'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'prohauz' ), 'value' => $color_scheme_arr, 'preview' => true ),

				array( 'param_name' => 'product_title', 'type' => 'textfield', 'heading' => esc_html__( 'Custom product title', 'prohauz' ), 'group' => esc_html__( 'Override', 'prohauz' ), 'preview' => true, 'preview_strong' => true ),
				array( 'param_name' => 'product_description', 'group' => esc_html__( 'Override', 'prohauz' ), 'type' => 'textarea', 'heading' => esc_html__( 'Custom product description', 'prohauz' ) ),
				array( 'param_name' => 'product_price', 'group' => esc_html__( 'Override', 'prohauz' ), 'type' => 'textfield', 'heading' => esc_html__( 'Custom product price', 'prohauz' ) ),
				array( 'param_name' => 'product_image', 'group' => esc_html__( 'Override', 'prohauz' ), 'type' => 'attach_image', 'heading' => esc_html__( 'Custom product image', 'prohauz' ) )
				)
		) );
	}
}