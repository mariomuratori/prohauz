<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#51acfb";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#dd1515";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Montserrat";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Montserrat";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Montserrat";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Montserrat";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$accentColorVeryLight = CssCrush\fn__a_adjust( $accentColor." -20" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "90";
}
$css_override = sanitize_text_field("select,
input{font-family: \"{$bodyFont}\";}
.fancy-select ul.options li:hover{color: {$accentColor};}
.btContent a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\";}
blockquote{
    font-family: \"{$headingFont}\";}
blockquote:after{
    border-color: {$accentColor};}
cite{font-family: \"{$headingFont}\";}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child,
.btTransparentLightHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColor};}
.btPreloader .animation p{
    font-family: \"{$headingSuperTitleFont}\";}
.btLoader{
    border-top: 2px solid {$accentColor} !important;
    border-right: 2px solid {$accentColor} !important;}
.btLoader:before,
.btLoader:after{
    border-top: 2px solid {$accentColor} !important;
    border-right: 2px solid {$accentColor} !important;}
.btNoSearchResults .bt_bb_port #searchform input[type='submit']{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.btNoSearchResults .bt_bb_port #searchform input[type='submit']:hover{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};}
.mainHeader{
    font-family: \"{$menuFont}\";}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\";}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{font-family: \"{$menuFont}\";
    line-height: {$logoHeight}px;}
.btLogoArea .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btOpacityLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btGreyLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btOpacityLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btGreyLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btOpacityLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btGreyLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > a:before,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > a:before{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li a:hover{color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{-webkit-box-shadow: inset 5px 0 0 0 {$accentColor};
    box-shadow: inset 5px 0 0 0 {$accentColor};}
.btMenuHorizontal .menuPort > nav > ul > li:not(.btMenuWideDropdown) > ul li a:hover{-webkit-box-shadow: inset 5px 0 0 0 {$accentColor};
    box-shadow: inset 5px 0 0 0 {$accentColor};}
.btMenuHorizontal .menuPort > nav > ul > li:not(.btMenuWideDropdown) > ul li:first-child > a{-webkit-box-shadow: inset 0 5px 0 0 {$accentColor};
    box-shadow: inset 0 5px 0 0 {$accentColor};}
.btMenuHorizontal .menuPort > nav > ul > li:not(.btMenuWideDropdown) > ul li:first-child > a:hover{-webkit-box-shadow: inset 5px 5px 0 0 {$accentColor};
    box-shadow: inset 5px 5px 0 0 {$accentColor};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    color: {$accentColor};
    -webkit-box-shadow: inset 0 5px 0 0 {$accentColor};
    box-shadow: inset 0 5px 0 0 {$accentColor};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a:hover{
    -webkit-box-shadow: inset 5px 5px 0 0 {$accentColor};
    box-shadow: inset 5px 5px 0 0 {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btMenuVertical.btOpacityLightHeader .mainHeader{
    background-color: {$accentColor};}
.btAccentLightHeader .btBelowLogoArea,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .btBelowLogoArea a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btGreyLightHeader .btBelowLogoArea a:hover,
.btGreyLightHeader .topBar a:hover{color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea,
.btAccentDarkHeader .topBar{background-color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$alternateColor};}
.btLightAccentHeader .btLogoArea,
.btLightAccentHeader .btVerticalHeaderTop{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .btLogoArea{background-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btDarkSkin .btSiteFooterCopyMenu .port:before,
.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before{background-color: {$accentColor};}
article .bt_bb_headline a:hover{color: {$accentColor};}
.btPostSingleItemStandard .btArticleShareEtc .btReadMoreColumn .bt_bb_button a{background: {$accentColor};}
.btArticleSuperMeta dl{border: 6px solid {$accentColor};}
.btMediaBox.btQuote:before,
.btMediaBox.btLink:before{
    background-color: {$accentColor};}
.btShareColumn .bt_bb_icon .bt_bb_icon_holder:hover:before,
.btShareRow .bt_bb_icon .bt_bb_icon_holder:hover:before,
.btAuthorSocial .bt_bb_icon .bt_bb_icon_holder:hover:before{-webkit-box-shadow: 0 0 0 1em {$accentColor} inset;
    box-shadow: 0 0 0 1em {$accentColor} inset;}
.btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btAuthorSocial .bt_bb_icon:hover .bt_bb_icon_holder:before{-webkit-box-shadow: 0 0 0 1em {$accentColor} inset;
    box-shadow: 0 0 0 1em {$accentColor} inset;}
.btDarkSkin .btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btLightSkin .btDarkSkin .btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin .btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btLightSkin .btDarkSkin .btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin .btAuthorSocial .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btLightSkin .btDarkSkin .btAuthorSocial .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btAuthorSocial .bt_bb_icon:hover .bt_bb_icon_holder:before{-webkit-box-shadow: 0 0 0 1em {$accentColor} inset;
    box-shadow: 0 0 0 1em {$accentColor} inset;}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:first-child{color: {$alternateColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{
    background: {$accentColor};}
.btPagination{font-family: \"{$headingFont}\";}
.btPagination .paging a:hover{color: {$accentColor};}
.btPagination .paging a:hover:after{border-color: {$accentColor};
    color: {$accentColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{font-family: \"{$headingFont}\";}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.btArticleCategories a:hover{color: {$accentColor};}
.btArticleCategories a:not(:first-child):before{
    background-color: {$accentColor};}
.btCommentsBox .commentTxt p.edit-link,
.btCommentsBox .commentTxt p.reply{
    font-family: \"{$headingFont}\";}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link:hover{color: {$accentColor};}
.btCommentSubmit{
    background: {$accentColor};}
.sidebar .widget_bt_bb_recent_posts ul li .bt_bb_headline .bt_bb_headline_content a:hover,
.btSidebar .widget_bt_bb_recent_posts ul li .bt_bb_headline .bt_bb_headline_content a:hover,
.btSiteFooterWidgets .widget_bt_bb_recent_posts ul li .bt_bb_headline .bt_bb_headline_content a:hover{color: {$accentColor} !important;}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.btBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline .bt_bb_headline_content span a:hover,
.btCustomMenu .btImageTextWidget .btImageTextWidgetText .bt_bb_headline .bt_bb_headline_content span a:hover,
.btTopBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline .bt_bb_headline_content span a:hover{color: {$accentColor};}
.widget_calendar table caption{background: {$accentColor};
    font-family: \"{$headingFont}\";}
.widget_calendar table tbody tr td#today{color: {$accentColor};}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\";}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\";}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    font: normal .9em/1 \"{$menuFont}\";}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{font-family: \"{$headingFont}\";}
.btBox .tagcloud a:hover{color: {$accentColor} !important;}
.btTags ul li a:hover{color: {$accentColor} !important;}
.topTools .btIconWidget:hover,
.topBarInMenu .btIconWidget:hover{color: {$accentColor};}
.btSidebar .btIconWidget:hover .btIconWidgetText,
footer .btIconWidget:hover .btIconWidgetText,
.topBarInLogoArea .btIconWidget:hover .btIconWidgetText{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
.btSiteFooterWidgets .btSearch button:hover:before,
.btSidebar .btSearch button:hover:before,
.btSidebar .widget_product_search button:hover:before,
.woocommerce .btSidebar .btSearch button:hover:before{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
div.btButtonWidget a.btButtonWidgetLink{
    background-color: {$accentColor};}
.btAccentDarkHeader .topBarInMenu div.btButtonWidget a{background-color: {$accentColor};}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_headline h1 b,
.bt_bb_headline h2 b,
.bt_bb_headline h3 b,
.bt_bb_headline h4 b,
.bt_bb_headline h5 b,
.bt_bb_headline h6 b{color: {$accentColor};}
.btHasBgImage.bt_bb_headline .bt_bb_headline_content span{
    background-color: {$accentColor};}
.bt_bb_progress_bar.bt_bb_style_filled .bt_bb_progress_bar_inner{
    background-image: -webkit-linear-gradient(135deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: -moz-linear-gradient(135deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: -ms-linear-gradient(135deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: -o-linear-gradient(135deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: -webkit-linear-gradient(315deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: -moz-linear-gradient(315deg,{$accentColor} 33%,{$alternateColor} 66%);
    background-image: linear-gradient(135deg,{$accentColor} 33%,{$alternateColor} 66%);}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta > div{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_author a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_category .post-categories li a{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_category .post-categories li a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories li a{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories li a:hover{
    color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_item_author a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_icon .bt_bb_icon_holder > span{
    font-family: \"{$headingFont}\";}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{
    font-family: \"{$headingFont}\";}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_text b{color: {$accentColor};}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_number{
    background-color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title{
    font-family: \"{$headingFont}\";}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title:after{
    font-family: \"{$headingFont}\";}
.bt_bb_accordion .bt_bb_accordion_item:hover .bt_bb_accordion_item_title{
    background: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item.on .bt_bb_accordion_item_title{
    background: {$accentColor};}
.bt_bb_custom_menu div ul a:hover{color: {$accentColor};}
.bt_bb_tabs.bt_bb_style_simple ul.bt_bb_tabs_header li.on{border-color: {$accentColor};}
.bt_bb_counter_holder .bt_bb_counter{
    font-family: \"{$headingFont}\";}
.wpcf7-form .wpcf7-submit{
    background-color: {$accentColor} !important;}
div.wpcf7-validation-errors,
div.wpcf7-acceptance-missing{border: 2px solid {$accentColor};}
span.wpcf7-not-valid-tip{color: {$accentColor};}
.btLandingTitle.bt_bb_headline.btHasBgImage .bt_bb_headline_content span{
    background-color: {$accentColor};}
.btLandingNewsletter input[type='submit']{background-color: {$alternateColor} !important;}
.products ul li.product .btWooShopLoopItemInner .added_to_cart:hover,
ul.products li.product .btWooShopLoopItemInner .added_to_cart:hover{color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
nav.woocommerce-pagination ul li a,
nav.woocommerce-pagination ul li span{
    color: {$accentColor};}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a.next,
nav.woocommerce-pagination ul li a.prev{color: {$accentColor};}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td a:hover,
table.shop_table th a:hover{color: {$accentColor};}
table.shop_table td.product-remove a.remove:hover{background-color: {$alternateColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.woocommerce-info a:not(.button),
.woocommerce-message a:not(.button){color: {$accentColor};}
.woocommerce-error{border-top-color: {$alternateColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce-error:before{
    color: {$alternateColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    background: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    background: {$accentColor};}
.woocommerce .btSidebar a.button:hover,
.woocommerce .btContent a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .btContent a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .btContent input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .btContent input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .btContent button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .btContent button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .btContent input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .btContent input.button:hover,
.woocommerce .btSidebar input.alt,
.woocommerce .btContent input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .btContent input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .btContent a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .btContent a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .btContent .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .btContent .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .btContent button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .btContent button.alt,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{
    background: {$accentColor};}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted[data-selected]{background-color: {$accentColor};}
.woocommerce-cart-form thead tr{background-color: {$accentColor};}
.btQuoteBooking .btContactNext{border-color: {$accentColor};
    color: {$accentColor};}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{background: {$accentColor};}
.btQuoteBooking input[type=\"text\"]:focus,
.btQuoteBooking input[type=\"email\"]:focus,
.btQuoteBooking input[type=\"password\"]:focus,
.btQuoteBooking .btQuoteBooking textarea:focus,
.btQuoteBooking .fancy-select .trigger:focus,
.btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .btQuoteBooking textarea:focus,
.btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{-webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btQuoteBooking .btContactSubmit{
    background-color: {$accentColor};}
.btDatePicker .ui-datepicker-header{background-color: {$accentColor};}
.btSpecialQuote.btQuoteBooking .btQuoteBookingForm .btQuoteItem label{
    font-family: \"{$headingSuperTitleFont}\";}
.btSpecialQuote.btQuoteBooking.btHeatingQuote .btQuoteTotal .btQuoteTotalCurrency,
.btSpecialQuote.btQuoteBooking.btHeatingQuote .btQuoteTotal .btQuoteTotalCalc{color: {$accentColor};}
a .bt_bb_progress_bar_advanced .progressbar-text{color: {$accentColor};}
.bt_bb_progress_bar_advanced p{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_steps .bt_bb_steps_content .bt_bb_steps_content_title{
    font-family: \"{$headingFont}\";}
.bt_bb_steps .bt_bb_steps_content .bt_bb_steps_content_text b{color: {$accentColor};}
.bt_bb_steps:hover .bt_bb_steps_content_title a{color: {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_categories span.btProductCategories a.btProductCategory{font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_categories span.btProductCategories a.btProductCategory:hover{color: {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_categories span.btProductCategories a.btProductCategory:not(:first-child):before{
    background-color: {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_title{
    font-family: \"{$headingFont}\";}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_title a:hover{color: {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_description{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart a.added_to_cart:hover{color: {$accentColor};}
.wp-block-button__link:hover{color: {$accentColor} !important;}
", array() );