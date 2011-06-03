<?php

	add_filter('gallery_style', create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));

	function my_get_posts( $query ) {

		if ( is_home() && false == $query->query_vars['suppress_filters'] )
			$query->set( 'post_type', array( 'post', 'events', 'articles', 'events', 'projects', 'courses' ) );

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


?>
