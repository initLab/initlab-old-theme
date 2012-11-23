<?php
	get_header();

		if (have_posts())
		{
			while (have_posts())
			{
				the_post();

				include 'loop/single.php';
			}
		}

	get_footer();
?>
