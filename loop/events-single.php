<article class="entry">
	<header>
		<?php if(is_single()) { ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php }else { ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php } ?>
			<p class="meta"> Пуснато на: <?php the_date(); ?> в <?php the_time(); ?> от <a href="#"><?php the_author(); ?></a></p>
	</header>
		<div class="cnt rte">
			<?php the_content(); ?>
		</div>
	<footer>
	</footer>
</article>
