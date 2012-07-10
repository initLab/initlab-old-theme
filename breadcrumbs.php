<?php

	function breadcrumbs( $type, $single ) {

		$link[] = array( 'Home', '/' );
		$link[] = array( $type, '/'.$type );

		if($single){ $link[] = array( 'Permalink', get_permalink() ); }

		echo '<div class="breadcrumbs">';

			foreach($link as $l)
			{
				echo ' &raquo; <a href="'.$l[1].'">'.$l[0].'</a>';
			}

		echo '</div>';
	}

?>
