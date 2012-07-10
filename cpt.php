<?php
	get_header();

	global $wp;
	$type = $wp->query_vars["post_type"];


	if (have_posts())
	{
		while (have_posts())
		{
			the_post();

			if(is_single())
			{
				include 'loop/'.$type.'-single.php';
			}
			else
			{
				include 'loop/'.$type.'.php';
			}
		}
	}

	get_footer();
?>
