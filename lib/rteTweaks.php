<?php

	//Turn On More Buttons in the WordPress Visual Editor
	function add_more_buttons($buttons)
	{
		$buttons[] = 'hr';
		$buttons[] = 'del';
		$buttons[] = 'sub';
		$buttons[] = 'sup';
		$buttons[] = 'fontselect';
		$buttons[] = 'fontsizeselect';
		$buttons[] = 'cleanup';
		$buttons[] = 'styleselect';
		return $buttons;
	}
	add_filter("mce_buttons_3", "add_more_buttons");

?>
