<?php

	//Turn On More Buttons in the WordPress Visual Editor
	function add_more_buttons($buttons)
	{
		$buttons[] = 'styleselect';
		$buttons[] = 'hr';
		$buttons[] = 'del';
		$buttons[] = 'sub';
		$buttons[] = 'sup';
		return $buttons;
	}
	add_filter("mce_buttons_3", "add_more_buttons");

	// Remove With & Height attributes from images
	function remove_width_attribute( $html ) {
		$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		return $html;
	}
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
?>
