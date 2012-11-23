<?php
	get_header();

		if (have_posts())
		{
			while (have_posts())
			{
				the_post();

				if(is_single())
				{
					include 'loop/single.php';
				}else{
					include 'loop/default.php';
				}
			}
		}

	get_footer();
?>

