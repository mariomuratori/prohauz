<?php
$share_html = boldthemes_get_share_html( get_permalink(), 'blog', 'small', 'filled' );
$meta_html = boldthemes_get_post_meta();

if ( $share_html != '' || $meta_html != '' ) {
	if ( $share_html == '' || $meta_html == '' ) {
		echo '<div class="btShareMetaRow btShareMetaRowSingle">';	
	} else {
		echo '<div class="btShareMetaRow">';	
	}
	if ( $meta_html != '' ) echo '<div class="btMetaColumn">' . $meta_html . '</div><!-- /btMetaColumn -->';	
	if ( $share_html != '' ) echo '<div class="btShareColumn">' . wp_kses_post( $share_html ) . '</div><!-- /btShareColumn -->';
	echo '</div>';
}