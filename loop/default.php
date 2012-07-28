<article class="entry">
	<header>
		<?php if(is_single()) { ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php }else { ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php } ?>
	</header>
		<div class="cnt rte">
			<?php the_content(); ?>
		</div>
	<footer>
	</footer>
</article>

