<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage K2
 * @since K2 unknown
 */

get_header(); ?>

<div class="wrapper">

	<?php if ( is_active_sidebar('widgets-top') ) : ?>
	<div id="widgets-top" class="widgets">
		<?php dynamic_sidebar('widgets-top'); ?>
	</div>
	<?php endif; ?>

	<div class="primary">

		<a name="startcontent"></a>

		<?php /* K2 Hook */ do_action('template_primary_begin'); ?>

		<?php /* Top Navigation  k2_navigation('nav-above'); */ ?>

		<div class="content hfeed">

			<?php

			// Post index for semantic classes
			$post_index = 1;

			global $wp_query;
			$args = array_merge( $wp_query->query, array( 'post_type' => 'courses', 'posts_per_page' => 10, 'meta_key' => 'project', 'meta_value' => 'true' ) );
			query_posts( $args );

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

		</div>

		<?php /* Bottom Navigation */ k2_navigation('nav-below'); ?>

		<?php /* K2 Hook */ do_action('template_primary_end'); ?>

	</div>

	<?php get_sidebar(); ?>

	<?php if ( is_active_sidebar('widgets-bottom') ) : ?>
	<div id="widgets-bottom" class="widgets">
		<?php dynamic_sidebar('widgets-bottom'); ?>
	</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>
