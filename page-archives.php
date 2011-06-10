<?php
/**
 * The template for displaying pages with page slug archives.
 *
 * @package WordPress
 * @subpackage K2
 * @since K2 unknown
 */

/*
Template Name: Archives (Do Not Use Manually)
*/
?>

<?php /* Statistics for your blog */
	$numpostsarray = wp_count_posts('post');
	$numposts = $numpostsarray->publish;

	$numeventsarray	= wp_count_posts('events');
	$numevents = $numeventsarray->publish;

	$numprojectsarray = wp_count_posts('projects');
	$numprojects = $numprojectsarray->publish;

	$numcommsarray = wp_count_comments();
	$numcomms = $numcommsarray->approved;
	$numcats = count(get_all_category_ids());
?>

<?php get_header(); ?>

<div class="wrapper">

	<?php if ( is_active_sidebar('widgets-top') ) : ?>
	<div id="widgets-top" class="widgets">
		<?php dynamic_sidebar('widgets-top'); ?>
	</div>
	<?php endif; ?>

	<div class="primary">
		<a name="startcontent"></a>

		<div class="content hfeed">

			<?php the_post(); ?>

			<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-header">
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
					</h1>

					<?php /* Edit Link */ edit_post_link(__('Edit', 'k2'), '<span class="entry-edit">', '</span>'); ?>

					<?php /* K2 Hook */ do_action('template_entry_head'); ?>
				</div><!-- .entry-header -->

				<div class="entry-content">

					<h2>Архив Постове</h2>
					<br />

					<div class="col w3">
						<h3>Дата</h3>
						<ul class="archive-list">
							<?php wp_get_archives( array('type'=>'postbypost', 'show_post_count' => true, 'limit'=> 15 ) ); ?>
						</ul>
					</div>

					<div class="col w3">
						<h3>Години</h3>
						<ul class="archive-list">
							<?php wp_get_archives( array('type'=>'yearly', 'show_post_count' => true) ); ?>
						</ul>
					</div>

					<div class="col w3">
						<h3>Месеци</h3>
						<ul class="archive-list">
							<?php wp_get_archives( array('type'=>'monthly', 'show_post_count' => true) ); ?>
						</ul>
					</div>

					<div class="cleaner"></div>

					<div class="col w3">
						<h3>Автори</h3>
						<ul class="archive-list">
							<?php wp_list_authors( array( 'orderby'=>'name', 'order'=>'ASC' ) ); ?>
						</ul>
					</div>

					<?php /* ?>
					<h3><?php _e('Browse by Category', 'k2'); ?></h3>
					<ul class="archive-list">
						<?php wp_list_cats('hierarchical=1&optioncount=1'); ?>
					</ul>
					<?php */ ?>

				</div><!-- .entry-content -->

				<div class="entry-footer">
					<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:', 'k2') . '</span>', 'after' => '</div>' ) ); ?>

					<?php /* K2 Hook */ do_action('template_entry_foot'); ?>
				</div><!-- .entry-footer -->
			</div><!-- #entry-ID -->

			<?php if ( get_post_custom_values('comments') ): ?>
			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->
			<?php endif; ?>

		</div><!-- .content .hfeed -->

	</div><!-- .primary -->

	<?php if ( ! get_post_custom_values('sidebarless') ) get_sidebar(); ?>

	<?php if ( is_active_sidebar('widgets-bottom') ) : ?>
	<div id="widgets-bottom" class="widgets">
		<?php dynamic_sidebar('widgets-bottom'); ?>
	</div>
	<?php endif; ?>

</div> <!-- .wrapper -->

<?php get_footer(); ?>
