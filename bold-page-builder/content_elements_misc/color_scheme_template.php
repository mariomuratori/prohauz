<?php

$custom_css = "

	/* Icons */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a { color: {$color_scheme[1]}; }
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a { color: {$color_scheme[2]}; }
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a span { color: {$color_scheme[2]}; }
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover .bt_bb_icon_holder:before {
		background-color: {$color_scheme[1]};
		box-shadow: 0 0 0 2em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 2em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 0px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover a.bt_bb_icon_holder:before {
		box-shadow: 0 0 0 0px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}
	

	/* Buttons */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a {
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a:hover {
		box-shadow: 0 0 0 3em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a {
		box-shadow: none;
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a:hover {
		box-shadow: 0 2px 5px rgba(0,0,0,.2);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a {
		color: {$color_scheme[1]};
	}


	/* Services */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service .bt_bb_icon_holder {
		box-shadow: 0 0 0 3px {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service .bt_bb_icon_holder {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_service .bt_bb_service_content .bt_bb_service_content_text em {
		color: {$color_scheme[1]};
	}


	/* Steps */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_steps .bt_bb_steps_icon_holder .bt_bb_steps_icon .bt_bb_icon_holder {
		box-shadow: 0 0 0 3px {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_steps .bt_bb_steps_icon_holder .bt_bb_steps_icon:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_steps .bt_bb_steps_icon_holder .bt_bb_steps_icon:before {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_steps .bt_bb_steps_icon_holder .bt_bb_steps_before,  .bt_bb_color_scheme_{$scheme_id}.bt_bb_steps .bt_bb_steps_icon_holder .bt_bb_steps_after {
		background: {$color_scheme[2]};
	}


	/* Headline */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_superheadline {
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline b {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_dash_top .bt_bb_headline_content:after,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_dash_top_bottom .bt_bb_headline_content:before,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_dash_top_bottom .bt_bb_headline_content:after,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline.bt_bb_dash_bottom .bt_bb_headline_content:after {
		color: {$color_scheme[2]};
	}
	

	/* Tabs */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li.on {
		border-color: {$color_scheme[1]};
		color: {$color_scheme[1]};
		background-color: transparent;
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li.on,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li {
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
		border-color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_tabs_header li {
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_tabs_header li.on {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}

	/* Accordion */
	
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id} .bt_bb_accordion_item {
		border-color: {$color_scheme[1]};
	}

	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item_title {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item.on .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item .bt_bb_accordion_item_title:hover {
		background-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item .bt_bb_accordion_item_number {
		background-color: transparent;
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item.on .bt_bb_accordion_item_number,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item:hover .bt_bb_accordion_item_number {
		background-color: {$color_scheme[1]};
	}
	
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_accordion_item_content {
		background-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item.on .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		background-color: {$color_scheme[2]};
	}
	
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_accordion_item_number {
		background-color: {$color_scheme[2]};
	}

	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_number {
		background-color: transparent;
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title:hover,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
		color: {$color_scheme[2]} !important;
	}


	/* Price List */
	
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} {
		border-color: {$color_scheme[2]};
	}
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_title {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}

	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} ul li {
		border-color: {$color_scheme[2]};
	}

	/* Section */
	
	.bt_bb_section.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}

	/* Slider */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider.bt_bb_arrows_style_filled button.slick-arrow {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider.bt_bb_arrows_style_filled button.slick-arrow:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider.bt_bb_arrows_style_borderless button.slick-arrow:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li.slick-active {
		background: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li:hover {
		background: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider.bt_bb_arrows_style_filled .slick-dots li.slick-active {
		background: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_content_slider.bt_bb_arrows_style_filled .slick-dots li:hover {
		background: {$color_scheme[2]};
	}

	/* Progress bar */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_progress_bar.bt_bb_style_filled .bt_bb_progress_bar_bg {
		background: {$color_scheme[1]} !important;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_progress_bar.bt_bb_style_outline .bt_bb_progress_bar_inner {
		border-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_progress_bar.bt_bb_style_line .bt_bb_progress_bar_inner {
		border-color: {$color_scheme[2]};
	}


	/* Rating */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_rating .bt_bb_rating_icon .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_rating .bt_bb_rating_icon:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}

	/* Counter with icon */
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_counter_icon_holder .bt_bb_counter_icon_content .bt_bb_counter_icon_number {
		color: {$color_scheme[1]};
	}


	/* Single product */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart a {
		background: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}


	/* Simple Cost Calculator */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_cost_calculator .bt_bb_cost_calculator_total .bt_bb_cost_calculator_total_text {
		background: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_cost_calculator .bt_bb_widget_switch.on {
		background: {$color_scheme[2]};
	}

";