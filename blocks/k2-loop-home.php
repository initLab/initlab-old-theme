<?php
/**
 * Default Loop Template
 *
 * This file is loaded by multiple files and used for generating the loop
 *
 * @package K2
 * @subpackage Templates
 */

// Post index for semantic classes
$post_index = 1;

selectContent('events', '10', 'Събития');
selectContent('courses', '10', 'Курсове');
selectContent('projects', '10', 'Проекти');
?>

<div id="posts" class="mod">
	<div class="hdr"><h2>Последно от Блога на Лаб'а</h2></div>
	<ul class="cnt">
	<?php while ( have_posts() ): the_post(); ?>
		<?php if($post->post_type == 'post') { ?>
			<li id="entry-<?php the_ID(); ?>">
				<span class="entry-header">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>

					<?php
						edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' );
					?>
					<span class="entry-meta">
						<?php k2_entry_meta(1); ?>
					</span>
					<?php
						do_action('template_entry_head');
					?>

				</span>
			</li>
		<?php } ?>
	<?php endwhile; ?>
	</ul>
</div>
