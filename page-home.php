<?php
/**
 * Template Name: Homepage
 */
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

			<div id="welcome" class="widgets">
				<?php dynamic_sidebar('homepage'); ?>
			</div>

			<?php selectContent('news', 	'5', 'Новини'); ?>
			<?php selectContent('events', 	'5', 'Събития'); ?>
			<div class="cleaner"></div>

			<?php selectContent('courses', 	'5', 'Курсове'); ?>
			<?php selectContent('projects', '5', 'Проекти'); ?>
			<div class="cleaner"></div>

			<?php selectContent('post', '5', 'Последно от Блогa'); ?>
			<div class="cleaner"></div>

			<?php if (have_posts() && false) : while (have_posts()) : the_post(); ?>
			<div class="mod" id="calendarmod">
				<div class="hdr"><h2>Календар</h2></div>
				<div class="hentry">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>


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
