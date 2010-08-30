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

while ( have_posts() ): the_post(); ?>

	<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-header">
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php /* Edit Link */ edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' ); ?>
			<div class="entry-meta">
				<?php k2_entry_meta(1); ?>
			</div>

			<?php /* K2 Hook */ do_action('template_entry_head'); ?>
		</div>

		<div class="entry-content">
			<?php if ( function_exists('has_post_thumbnail') and has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 75, 75 ), array( 'class' => 'alignleft' ) ); ?></a>
			<?php endif; ?>
			<?php the_content( sprintf( __('Continue reading \'%s\'', 'k2'), the_title('', '', false) ) ); ?>
		</div>
		<?php /* ?>
		<?php if ( 'post' == $post->post_type ): ?>
			<div class="entry-footer">
				<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:', 'k2') . '</span>', 'after' => '</div>' ) ); ?>

				<div class="entry-meta">
					<?php k2_entry_meta(2); ?>
				</div><!-- .entry-meta -->

				<?php do_action('template_entry_foot'); ?>
			</div><!-- .entry-footer -->
		<?php endif; ?>
		<?php */ ?>
	</div><!-- #entry-ID -->

<?php endwhile; /* End The Loop */ ?>

