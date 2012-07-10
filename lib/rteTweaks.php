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

?>
