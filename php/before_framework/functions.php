<?php

/* Product Title - Shop page */
if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	function woocommerce_template_loop_product_title() {
		global $product;

		$categories = wp_get_post_terms( $product->get_id(), 'product_cat' );
		$supertitle = boldthemes_get_post_categories( array( 'categories' => $categories ) );

		$dash = boldthemes_get_option( 'shop_use_dash' ) ? apply_filters( 'boldthemes_product_list_headline_dash', 'bottom' ) : "";
		
		echo boldthemes_get_heading_html( 
			array( 
				'superheadline' => $supertitle, 
				'headline' => get_the_title(), 
				'subheadline' => '', 
				'size' => apply_filters( 'boldthemes_product_list_headline_size', 'medium' ),
				'dash' => $dash,
				'url' => get_permalink()
			)
		);
	}
}

/* Shop share */
if ( ! function_exists( 'boldthemes_shop_share_settings' ) ) {
	function boldthemes_shop_share_settings() {
		return array( 'xsmall', 'filled', 'circle' ); // 
	}
}
add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings' );


/* Show the single product title */
if (  ! function_exists( 'woocommerce_template_product_title' ) ) {
	function woocommerce_template_product_title( $supertitle, $title, $subtitle, $dash ) {
		if ( boldthemes_get_option( 'default_headline' ) == 'hide' ) {
			echo boldthemes_get_heading_html( 
				array( 
					'superheadline' => $supertitle, 
					'headline' => $title, 
					'subheadline' => $subtitle, 
					'size' => apply_filters( 'boldthemes_product_headline_size', 'normal' ), 
					'dash' => $dash
				)  
			);
		}
	}
}


/* Header headline output */
if ( ! function_exists( 'boldthemes_header_headline' ) ) {
	function boldthemes_header_headline( $arg = array() ) {

		$extra_class = 'btPageHeadline';
		
		$dash  = '';
		$use_dash = boldthemes_get_option( 'sidebar_use_dash' );
		if ( is_singular( 'post' ) ) {
			$use_dash = boldthemes_get_option( 'blog_use_dash' );
		} else if ( is_singular( 'product' ) ) {
			$use_dash = boldthemes_get_option( 'shop_use_dash' );
		}  else if ( is_singular( 'portfolio' ) ) {
			$use_dash = boldthemes_get_option( 'pf_use_dash' );
		} 
		if ( $use_dash ) $dash  = apply_filters( 'boldthemes_header_headline_dash', 'top' );
		if ( is_front_page() ) {
			$title = get_bloginfo( 'description' );
		} else if ( is_singular() ) {
			$title = get_the_title();
		} else {
			$title = wp_title( '', false );
		}
		
		if ( BoldThemesFramework::$page_for_header_id != '' ) {
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id( BoldThemesFramework::$page_for_header_id ) );
			
			$excerpt = boldthemes_get_the_excerpt( BoldThemesFramework::$page_for_header_id );
			if ( ! $feat_image ) {
				if ( is_singular() && ! is_singular( 'product' ) ) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
				} else {
					$feat_image = false;
				}
			}
		} else {
			if ( is_singular() ) {
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
			} else {
				$feat_image = false;
			}
			$excerpt = boldthemes_get_the_excerpt( get_the_ID() );
		}
		
		$parallax = isset( $arg['parallax'] ) ? $arg['parallax'] : apply_filters( 'boldthemes_header_headline_parallax', '0.8' );
		$parallax_class = 'bt_bb_parallax';
		if ( wp_is_mobile() ) {
			$parallax = 0;
			$parallax_class = '';
		}
		
		$supertitle = '';
		$subtitle = $excerpt;
		
		$breadcrumbs = isset( $arg['breadcrumbs'] ) ? $arg['breadcrumbs'] : true;
		
		if ( $breadcrumbs ) {
			$heading_args = boldthemes_breadcrumbs( false, $title, $subtitle );
			$supertitle = $heading_args['supertitle'];
			$title = $heading_args['title'];
			$subtitle = $heading_args['subtitle'];
		}

		if ( boldthemes_get_option( 'default_headline' ) != '' && boldthemes_get_option( 'default_headline' ) != 'default' ) {
			$default_headline = boldthemes_get_option( 'default_headline' );
		}
		
		if ( $title != '' || $supertitle != '' || $subtitle != '' ) {
			$extra_class .= $feat_image ? ' bt_bb_background_image ' . apply_filters( 'boldthemes_header_headline_gradient', 'bt_bb_background_overlay_dark_solid' ) . ' ' . $parallax_class . ' btDarkSkin ' : ' ';
				
			$default_headline = boldthemes_get_option( 'default_headline' );	
			if ( $default_headline == 'show' ) {
				echo '<section class="bt_bb_section gutter bt_bb_vertical_align_top ' . esc_attr( $extra_class ) . '" style="background-image:url(' . esc_url_raw( $feat_image ) . ')" data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="0">';
					echo '<div class="bt_bb_port port">';
						echo '<div class="bt_bb_cell">';
							echo '<div class="bt_bb_cell_inner">';
								echo '<div class = "bt_bb_row">';
									echo '<div class="bt_bb_column">';
										echo '<div class="bt_bb_column_content">';

											echo boldthemes_get_heading_html( 
												array(
													'superheadline' => $supertitle,
													'headline' => $title,
													'subheadline' => $subtitle,
													'html_tag' => "h1",
													'size' => apply_filters( 'boldthemes_header_headline_size', 'extralarge' ),
													'dash' => $dash,
													'el_style' => '',
													'el_class' => ''
												)
											);

											echo '</div><!-- /rowItemContent -->' ;
										echo '</div><!-- /rowItem -->';
								echo '</div><!-- /boldRow -->';
							echo '</div><!-- boldCellInner -->';	
						echo '</div><!-- boldCell -->';			
					echo '</div><!-- port -->';
				echo '</section>';
			} else if ( $default_headline == 'show-square' ) {
				echo '<section class="bt_bb_section gutter bt_bb_vertical_align_middle btHeadlineSquare ' . esc_attr( $extra_class ) . '" style="background-image:url(' . esc_url_raw( $feat_image ) . ')" data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="0">';
					echo '<div class="bt_bb_port port">';
						echo '<div class="bt_bb_cell">';
							echo '<div class="bt_bb_cell_inner">';
								echo '<div class = "bt_bb_row">';
									echo '<div class="bt_bb_column bt_bb_align_center">';
										echo '<div class="bt_bb_column_content">';

											echo boldthemes_get_heading_html( 
												array(
													'superheadline' => $supertitle,
													'headline' => $title,
													'subheadline' => $subtitle,
													'html_tag' => "h1",
													'size' => apply_filters( 'boldthemes_header_headline_size', 'huge' ),
													'dash' => $dash,
													'style' => 'square',
													'el_style' => '',
													'el_class' => 'bt_bb_style_square'
												)
											);

											echo '</div><!-- /rowItemContent -->' ;
										echo '</div><!-- /rowItem -->';
								echo '</div><!-- /boldRow -->';
							echo '</div><!-- boldCellInner -->';	
						echo '</div><!-- boldCell -->';			
					echo '</div><!-- port -->';
				echo '</section>';
			}
		}
	}
}

