<?php get_header(); ?>

	<article class="entry">
		<header>
			<h1><?php the_title(); ?></h1>
			<p class="meta"> Пуснато на: 27 Юни 2012 в 12:45 от <a href="#"><?php the_author(); ?></a></p>
		</header>

		<?php the_content(); ?>

	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
