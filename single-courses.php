<?php
/**
 * The template for displaying all single posts.
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

		<div class="content hfeed">
			
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-header">
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
					</h1>

					<?php /* Edit Link */ edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' ); ?>

					<div class="entry-meta">
						<?php k2_entry_meta(1); ?>
					</div> <!-- .entry-meta -->

					<?php /* K2 Hook */ do_action('template_entry_head'); ?>
				</div><!-- .entry-header -->

				<div class="entry-content">
					<?php if ( function_exists('has_post_thumbnail') and has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) ); ?></a>
					<?php endif; ?>
					<?php the_content( sprintf( __('Continue reading \'%s\'', 'k2'), the_title('', '', false) ) ); ?>
				</div><!-- .entry-content -->

				<div class="entry-footer">
					<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:', 'k2') . '</span>', 'after' => '</div>' ) ); ?>

					<?php /* K2 Hook */ do_action('template_entry_foot'); ?>
				</div><!-- .entry-footer -->
			</div><!-- #entry-ID -->
			
			<div class="panel" id="news">
				<div class="hdr"><h2>Новини</h2></div>
				<div class="cnt">
					<?php
					
					$ID = get_the_ID();
					
					$news_page = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $post->ID, 'name' => "news" ) );
					// echo '<pre>'.print_r($news_page,true).'</pre>';
					while ( $news_page->have_posts() ) : $news_page->the_post();
						$news_page_id = get_the_ID();
					endwhile; // End the loop. Whew. ?>
					<ul class="apps_list">
						
						<?php
						$news = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $news_page_id ) );
						while ( $news->have_posts() ) : $news->the_post();
						?>
							<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								<span class="info">
									<span class="date"><?php the_date(); ?></span><span class="author"><?php the_author(); ?></span>
								</span>
							</li>
						<?php
						endwhile; // End the loop. Whew.
						
						
						?>
					</ul>
				</div>
			</div>
			
			<div class="panel" id="program">
				<div class="hdr"><h2>Програма</h2></div>
				<div class="cnt hentry">
					<div class="entry-content">
						<?php
						$program = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $ID, 'name' => "program" ) );
						// echo '<pre>'.print_r($program,true).'</pre>';
						while ( $program->have_posts() ) : $program->the_post(); ?>
					
							<?php the_content(); ?>
							
						<?php
						endwhile; // End the loop. Whew	 ?>
					</div>
				</div>
			</div>			
			
			<div id="widgetspost" class="widgets">
				<?php dynamic_sidebar('widgetspost'); ?>
			</div>

			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->

		<?php endwhile; else: define('K2_NOT_FOUND', true); ?>

			<?php locate_template( array('blocks/k2-404.php'), true ); ?>

		<?php endif; ?>

		</div><!-- .content -->

		<?php /* K2 Hook */ do_action('template_primary_end'); ?>

	</div><!-- .primary -->

	<?php if ( ! get_post_custom_values('sidebarless') ) get_sidebar(); ?>

	<?php if ( is_active_sidebar('widgets-bottom') ) : ?>
	<div id="widgets-bottom" class="widgets">
		<?php dynamic_sidebar('widgets-bottom'); ?>
	</div>
	<?php endif; ?>

</div><!-- .wrapper -->

<?php
	/* Initialize Rolling Archives if needed */
	if ( defined('DOING_AJAX') and true == DOING_AJAX ) {
		add_action( 'k2_dynamic_content', array('K2', 'setup_rolling_archives') );
	}
?>

<?php get_footer(); ?>
