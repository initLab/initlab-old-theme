<?php

	function breadcrumbs() {

		global $wp_query;

		$type = $wp_query->query_vars[post_type];

		$link[] = array( 'Home', '/' );

		if($type){ $link[] = array( ucfirst($type), '/'.$type ); }
		if(is_single()){ $link[] = array( get_the_title(), get_permalink() ); }

		echo '<hr>';
		echo '<div class="breadcrumbs">';

			foreach($link as $l)
			{
				echo ' &raquo; <a href="'.$l[1].'">'.$l[0].'</a>';
			}

		echo '</div>';
		echo '<hr>';
	}

?>
