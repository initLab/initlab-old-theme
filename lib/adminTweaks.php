<?php

	function updateMenu()
	{
		global $menu;

		$restricted = array(__('Themes'), __('Tools'), __('Links'), __('Media'), __('Plugins'), __('Appearance'));
		// $restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}

		add_menu_page( 'Menus', 'Menus', 'add_users', 'nav-menus.php', '', '', 25);
		add_menu_page( 'Widgets', 'Widgets', 'add_users', 'widgets.php', '', '', 59);
	}

	if(is_admin())
	{
		if(!current_user_can('manage_options'))
		{
			add_action('admin_menu', 'updateMenu');
		}
	}

?>
