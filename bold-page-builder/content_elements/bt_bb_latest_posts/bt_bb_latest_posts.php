<?php

class bt_bb_latest_posts extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'rows'            => '',
			'columns'         => '',
			'gap'             => '',
			'category'        => '',
			'target'          => '',
			'image_shape'     => '',
			'show_category'   => '',
			'show_date'       => '',
			'show_author'     => '',
			'show_comments'   => '',
			'show_excerpt'    => ''
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
		
		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $image_shape != '' ) {
			$class[] = $this->prefix . 'image_shape' . '_' . $image_shape;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$number = $rows * $columns;
		
		$posts = bt_bb_get_posts( $number, 0, $category );
		
		$output = '';

		foreach( $posts as $post_item ) {

			$output .= '<div class="' . esc_attr( $this->shortcode . '_item' ) . '">';
				$post_thumbnail_id = get_post_thumbnail_id( $post_item['ID'] );

				if ( $post_thumbnail_id != '' ) {
					$img = wp_get_attachment_image_src( $post_thumbnail_id, $size = 'medium' );
					$img_src = $img[0];
					$output .= '<div class="' . esc_attr( $this->shortcode . '_item_image' ) . '"><a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url_raw($img_src ) . '" alt="' . esc_attr( $post_item['title'] ) . '" title="' . esc_attr( $post_item['title'] ) . '"></a></div>';
					
				}

				$output .= '<div class="' . esc_attr( $this->shortcode . '_item_content' ) . '">';
				
					

					if ( $show_date == 'show_date' || $show_author == 'show_author' || $show_author == 'show_comments' || $show_category == 'show_category' ) {
				
						$meta_output = '<div class="' . esc_attr( $this->shortcode . '_item_meta' ) . '">';

							if ( $show_date == 'show_date' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode . '_item_date' ) . '">';
									$meta_output .= get_the_date( '', $post_item['ID'] );
								$meta_output .= '</div>';
							}

							if ( $show_author == 'show_author' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode . '_item_author' ) . '">';
									$meta_output .= esc_html__( 'by', 'prohauz' ) . ' ' . $post_item['author'];
								$meta_output .= '</div>';
							}

							if ( $show_comments == 'show_comments' && $post_item['comments'] != '' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode . '_item_comments' ) . '">';
									$meta_output .= $post_item['comments'];
								$meta_output .= '</div>';
							}

							if ( $show_category == 'show_category' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode . '_item_category' ) . '">';
									$meta_output .= $post_item['category_list'];
								$meta_output .= '</div>';
							}
				
						$meta_output .= '</div>';
		
						$output .= $meta_output;
		
					}

					

					$output .= '<h5 class="' . esc_attr( $this->shortcode ) . '_item_title">';
						$output .= '<a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '">' . $post_item['title'] . '</a>';
					$output .= '</h5>';
					
					if ( $show_excerpt == 'show_excerpt' ) {
						$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_excerpt">';
							$output .= $post_item['excerpt'];
						$output .= '</div>';
					}
				$output .= '</div>';
				
			$output .= '</div>';
		}

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Latest Posts', 'prohauz' ), 'description' => esc_html__( 'List of latest posts', 'prohauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'rows', 'type' => 'textfield', 'value' => '1', 'heading' => esc_html__( 'Rows', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'value' => '3', 'heading' => esc_html__( 'Columns', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( '1', 'prohauz' ) => '1',
						esc_html__( '2', 'prohauz' ) => '2',
						esc_html__( '3', 'prohauz' ) => '3',
						esc_html__( '4', 'prohauz' ) => '4',
						esc_html__( '6', 'prohauz' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'prohauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Normal', 'prohauz' ) => 'normal',
						esc_html__( 'No gap', 'prohauz' ) => 'no_gap',
						esc_html__( 'Small', 'prohauz' ) => 'small',
						esc_html__( 'Large', 'prohauz' ) => 'large'
					)
				),				
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => esc_html__( 'Category', 'prohauz' ), 'description' => esc_html__( 'Enter category slug or leave empty to show all', 'prohauz' ), 'preview' => true ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'prohauz' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'prohauz' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'prohauz' ) => '_blank',
					)
				),
				array( 'param_name' => 'image_shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Image shape', 'prohauz' ),
					'value' => array(
						esc_html__( 'Square', 'prohauz' ) => 'square',
						esc_html__( 'Rounded', 'prohauz' ) => 'rounded',
						esc_html__( 'Round', 'prohauz' ) => 'round'
					)
				),
				array( 'param_name' => 'show_date', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'prohauz' ) => 'show_date' ), 'heading' => esc_html__( 'Show date', 'prohauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_category', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'prohauz' ) => 'show_category' ), 'heading' => esc_html__( 'Show category', 'prohauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_author', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'prohauz' ) => 'show_author' ), 'heading' => esc_html__( 'Show author', 'prohauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_comments', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'prohauz' ) => 'show_comments' ), 'heading' => esc_html__( 'Show number of comments', 'prohauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'prohauz' ) => 'show_excerpt' ), 'heading' => esc_html__( 'Show excerpt', 'prohauz' ), 'preview' => true
				)
			)
		) );
	} 
}