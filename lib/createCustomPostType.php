<?php

	function createPostTypes()
	{
		register_post_type( 'events',
			array(
				'labels' => array(
					'name' => __( 'Events' ),
					'singular_name' => __( 'Events' ),
					'add_new' => __( 'Add new Event' ),
					'all_items' => __( 'All Events' ),
					'add_new_item' => __( 'Add new Event' ),
					'edit_item' => __( 'Edit Event' ),
					'new_item' => __( 'New Event' ),
					'view_item' => __( 'View Event' ),
					'search_items' => __( 'Search Events' ),
					'not_found' => __( 'No Events found' ),
					'not_found_in_trash' => __( 'No Events found in Trash' ),
					'menu_name' => __( 'Events' )
				),
				'menu_position' => 5,
				'public' => true,
				'publicly_queryable' => true,
				'query_var' => 'events',
				'has_archive' => true,
				'rewrite' => array('slug' => 'events'),
				'supports' => array(
					'title',
					'excerpt',
					'editor',
					'author',
					'custom-fields',
					'revisions',
					'page-attributes'
				)
			)
		);

		register_post_type( 'news',
			array(
				'labels' => array(
					'name' => __( 'News' ),
					'singular_name' => __( 'News' ),
					'add_new' => __( 'Add new' ),
					'all_items' => __( 'All News' ),
					'add_new_item' => __( 'Add new' ),
					'edit_item' => __( 'Edit' ),
					'new_item' => __( 'New' ),
					'view_item' => __( 'View' ),
					'search_items' => __( 'Search News' ),
					'not_found' => __( 'No News found' ),
					'not_found_in_trash' => __( 'No News found in Trash' ),
					'menu_name' => __( 'News' )
				),
				'menu_position' => 5,
				'public' => true,
				'publicly_queryable' => true,
				'query_var' => 'news',
				'has_archive' => true,
				'rewrite' => array('slug' => 'news'),
				'supports' => array(
					'title',
					'excerpt',
					'editor',
					'author',
					'custom-fields',
					'revisions',
					'page-attributes'
				)
			)
		);

		register_post_type( 'courses',
			array(
				'labels' => array(
					'name' => __( 'Courses' ),
					'singular_name' => __( 'Course' ),
					'add_new' => __( 'Add new Course' ),
					'all_items' => __( 'All Courses' ),
					'add_new_item' => __( 'Add new Course' ),
					'edit_item' => __( 'Edit Course' ),
					'new_item' => __( 'New Course' ),
					'view_item' => __( 'View Course' ),
					'search_items' => __( 'Search Courses' ),
					'not_found' => __( 'No Courses found' ),
					'not_found_in_trash' => __( 'No Courses found in Trash' ),
					'menu_name' => __( 'Courses' )
				),
				'menu_position' => 5,
				'public' => true,
				'publicly_queryable' => true,
				'query_var' => 'courses',
				'has_archive' => true,
				'rewrite' => array('slug' => 'courses'),
				'supports' => array(
					'title',
					'excerpt',
					'editor',
					'author',
					'custom-fields',
					'revisions',
					'page-attributes'
				)
			)
		);

	}
	add_action( 'init', 'createPostTypes' );


	// Template selection
	function customPostTypeRedirects()
	{
		global $wp;
		global $wp_query;

		$cpts = array( 'events', 'news', 'courses', 'posts', 'page' );

		foreach($cpts as $type)
		{
			if ($wp->query_vars["post_type"] == $type)
			{
				if (have_posts())
				{
					include(TEMPLATEPATH . '/cpt.php');
					die();
				}
				else
				{
					$wp_query->is_404 = true;
				}
			}
		}
	}
	add_action("template_redirect", 'customPostTypeRedirects');
?>
