<?php

	add_filter('gallery_style', create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));

	function my_get_posts( $query ) {

		if ( is_home() && false == $query->query_vars['suppress_filters'] )
			$query->set( 'post_type', array( 'post', 'events', 'articles', 'events', 'projects', 'courses', 'news' ) );

		return $query;
	}
	add_filter( 'pre_get_posts', 'my_get_posts' );

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

		register_sidebar(array(
			'name' => 'music',
			'description' => 'Widgets for music section',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		));

	}
?>
