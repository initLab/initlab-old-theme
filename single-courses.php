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

			<?php

				$ID = get_the_ID();
				$ancestors = get_post_ancestors( $ID );
				$news_page = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $ID, 'name' => "news" ) );

				while ( $news_page->have_posts() ) : $news_page->the_post();
					$news_page_id = get_the_ID();
				endwhile; // End the loop. Whew.
				wp_reset_postdata();

				$news = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $news_page_id ) );
				$program = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $ID, 'name' => "program" ) );

				if($post->post_parent)
				{
					if($post->post_name=="news")
					{
						$page_type = 'newshomepage';
						$news = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $ID ) );
						$program = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $ancestors[count($ancestors)-1], 'name' => "program" ) );
					}
					elseif($post->post_name=="program")
					{
						$page_type = 'programpage';
						$news_page = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $ancestors[count($ancestors)-1], 'name' => 'news' ) );

						while ( $news_page->have_posts() ) : $news_page->the_post();
							$news_page_id = get_the_ID();
						endwhile; // End the loop. Whew.
						wp_reset_postdata();

						$news = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $news_page_id ) );
					}
					else
					{
						$page_type = 'newspage';
						$program = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 1, 'post_parent' => $ancestors[count($ancestors)-1], 'name' => "program" ) );
						$news = new WP_Query( array( 'post_type' => 'courses', 'showposts' => 10, 'post_parent' => $post->post_parent ) );
					}
				}
				else
				{
					$page_type = 'coursehomepage';
				}

				//echo $page_type;
			?>

			<?php if($page_type=='newshomepage'){ ?>

			<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-header">
					<h2>Курс &raquo; "<a href="<?php echo get_permalink($ancestors[count($ancestors)-1]); ?>"><?php echo get_the_title($ancestors[count($ancestors)-1]); ?></a>"</h2>
					<h1 class="entry-title">Новини</h1>
				</div><!-- .entry-header -->
				<div class="entry-content">
					<ul class="newslist">

						<?php
						while ( $news->have_posts() ) : $news->the_post();
						?>
							<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								<span class="info">
									<span class="date">Публикувано на <?php the_date(); ?></span> в <span class="author"><?php the_time(); ?></span>
								</span>
							</li>
						<?php
						endwhile; // End the loop. Whew.
						wp_reset_postdata();
						?>
					</ul>
				</div>
				<div class="entry-footer"></div>
			</div><!-- #entry-ID -->

			<?php }else { ?>

			<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-header">
					<h2>
						<?php if($page_type!="coursehomepage"){ ?>
							Курс &raquo;
							"<a href="<?php echo get_permalink($ancestors[count($ancestors)-1]); ?>"><?php echo get_the_title($ancestors[count($ancestors)-1]); ?></a>" &raquo;
						<?php } ?>
						<?php if($page_type=='newspage'){ ?>
						<a href="<?php echo get_permalink($ancestors[0]); ?>">Новини</a>
						<?php }elseif($page_type=='programpage'){ ?>
							Програма
						<?php } ?>
					</h2>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a></h1>

					<?php /* Edit Link */ edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' ); ?>

					<?php /* K2 Hook */ do_action('template_entry_head'); ?>

				</div><!-- .entry-header -->
				<div class="entry-content">
					<?php if ( function_exists('has_post_thumbnail') and has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) ); ?></a>
					<?php endif; ?>
					<?php the_content( sprintf( __('Continue reading \'%s\'', 'k2'), the_title('', '', false) ) ); ?>
				</div><!-- .entry-content -->
				<div class="entry-footer">

					<?php if($page_type=="newspage"){ ?>
						<div class="entry-meta">
							<?php k2_entry_meta(1); ?>
						</div> <!-- .entry-meta -->
					<?php } ?>
					<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:', 'k2') . '</span>', 'after' => '</div>' ) ); ?>

					<?php /* K2 Hook */ do_action('template_entry_foot'); ?>

				</div><!-- .entry-footer -->
			</div><!-- #entry-ID -->

			<?php } ?>

			<?php
			if ( $program->have_posts() ) {	?>
			<div class="panel" id="program">
				<div class="hdr"><h2>Програма</h2></div>
				<div class="cnt hentry">
					<div class="entry-content">
						<?php
						while ( $program->have_posts() ) : $program->the_post(); ?>

							<?php the_content(); ?>

						<?php
						endwhile; // End the loop. Whew
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<?php } ?>

			<?php
			if ( $news->have_posts()) { ?>
			<div class="panel" id="news">
				<div class="hdr"><h2>Новини</h2></div>
				<div class="cnt">
					<ul class="apps_list">

						<?php
						while ( $news->have_posts() ) : $news->the_post();
						?>
							<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								<span class="info">
									<span class="date"><?php the_date(); ?></span><span class="author"><?php the_time(); ?></span>
								</span>
							</li>
						<?php
						endwhile; // End the loop. Whew.
						wp_reset_postdata();
						?>

					</ul>
				</div>
			</div>
			<?php } ?>

			<div class="cleaner">&nbsp;</div>

			<div id="widgetspost" class="widgets">
				<?php dynamic_sidebar('widgetspost'); ?>
			</div>

			<?php if($page_type == "coursehomepage"){ ?>
				<div class="comments">
					<?php comments_template(); ?>
				</div><!-- .comments -->
			<?php } ?>

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

<?php get_footer(); ?>
