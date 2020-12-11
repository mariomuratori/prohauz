<?php
	
	$share_html = boldthemes_get_share_html( get_permalink(), 'blog', 'xsmall' );

	$default_headline = boldthemes_get_option( 'default_headline' );

	$meta_html = '';
	if ( BoldThemesFrameworkTemplate::$blog_author || BoldThemesFrameworkTemplate::$blog_date || BoldThemesFrameworkTemplate::$show_comments_number || BoldThemesFrameworkTemplate::$categories_html ) {
		$meta_html .= '';
		if ( BoldThemesFrameworkTemplate::$categories_html ) $meta_html .= boldthemes_get_post_categories();
		if ( BoldThemesFrameworkTemplate::$blog_date ) $meta_html .= boldthemes_get_post_date();
		if ( BoldThemesFrameworkTemplate::$blog_author ) $meta_html .= boldthemes_get_post_author();
		if ( BoldThemesFrameworkTemplate::$show_comments_number ) $meta_html .= boldthemes_get_post_comments();
	}
	
	echo '<article class="btPostSingleItemColumns gutter ' . esc_attr( implode( ' ', get_post_class(BoldThemesFrameworkTemplate::$class_array ) ) ) . '">';
		echo '<div class="port">';
		
			echo '<div class="btArticleContentHolder">';
	
				if ( BoldThemesFrameworkTemplate::$media_html != '' ) {
					echo '<div class="btArticleMedia">' . BoldThemesFrameworkTemplate::$media_html . '</div><!-- /btArticleMedia -->';
				}
				echo '<div class="btArticleTextContent">';
					
				if ( $default_headline == 'hide' ) {
					echo '<div class="btArticleHeadline">';
					echo boldthemes_get_heading_html(
						array(
							'superheadline' => $meta_html,
							'headline' => get_the_title(),
							'size' => 'large',
							'dash' => BoldThemesFrameworkTemplate::$dash
						)									 
					);
					echo '</div><!-- /btArticleHeadline -->' ;
				}
				
				$extra_class = '';
				
	
				echo '<div class="btArticleContent ">' . BoldThemesFrameworkTemplate::$content_html . '</div>';
				
				echo '<div class="btArticleShareEtc">';
					echo '<div class="btTagsColumn">';
						echo wp_kses_post( BoldThemesFrameworkTemplate::$tags_html );
					echo '</div><!-- /btTagsColumn -->';
					
					if ( $share_html != '' ) {
						echo '<div class="btShareColumn">' . wp_kses_post( $share_html ) . '</div><!-- /btShareColumn -->';
					}
					
				echo '</div><!-- /btArticleShareEtc -->';
				
				global $multipage;
				if ( $multipage ) { 
					echo '<div class="btClear btSeparator bottomSmallSpaced noBorder"><hr></div>';
					wp_link_pages( array( 
						'before'      => '<ul>' . esc_html__( 'Pages:', 'prohauz' ),
						'separator'   => '<li>',
						'after'       => '</ul>'
					));	
				}
				echo '</div><!-- /btArticleTextContent -->' ;

			echo '</div><!-- /btArticleContentHolder -->' ;
	
		echo '</div><!-- bt_bb_port -->';		
	echo '</article>';


?>