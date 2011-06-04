<?php

	add_filter('gallery_style', create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));

	function my_get_posts( $query ) {

		if ( is_home() && false == $query->query_vars['suppress_filters'] )
			$query->set( 'post_type', array( 'post', 'articles', 'events', 'projects', 'courses', 'news' ) );

		return $query;
	}
	//add_filter( 'pre_get_posts', 'my_get_posts' );

	function remove_wp_widget_recent_comments_style() {
	      remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
	add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style');

	function import_scripts()
	{
		echo '<script src="/wp-content/themes/initlab/scripts/common.js"></script>';
	}
	add_action('wp_head', 'import_scripts');

	if ( function_exists('register_sidebar') ){

		register_sidebar(
			array(
				'name' => 'homepage',
				'description' => 'This widget area is on top of the content on the homepage',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
			)
		);

	}

	function selectContent($type, $count, $title) {
		$content = new WP_Query( array( 'post_type' => $type, 'showposts' => $count ) ); ?>

		<div id="news" class="mod">
		<div class="hdr"><h2><?php echo $title; ?></h2></div>
			<ul class="cnt">
			<?php while ( $content->have_posts() ) : $content->the_post(); ?>
				<li id="entry-<?php the_ID(); ?>">
					<span class="entry-header">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
						<?php
							/* Edit Link */
							edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' );
						?>
						<span class="entry-meta">
							<?php  k2_entry_meta(1); ?>
						</span>
						<?php
							/* K2 Hook */
							do_action('template_entry_head');
						?>
					</span>
				</li>
			<?php endwhile; /* End The Loop */ ?>
			</ul>
		</div>

	<?php
	wp_reset_postdata();
	} ?>

