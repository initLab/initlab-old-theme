<?php

    include 'lib/adminTweaks.php';
    include 'lib/rteTweaks.php';
    include 'lib/rteShortCodes.php';
    include 'lib/customwidgets.php';

    add_filter( 'use_default_gallery_style', '__return_false' ); //Remove Gallery Inline Styling

    register_sidebar(
        array(
            'name' => 'Index',
            'description' => 'This widget area is on top of the content on the homepage',
            'before_widget' => '<section id="%1$s" class="panel %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<header><h2>',
            'after_title'   => '</h2></header>'
        )
    );

    register_nav_menus(
        array(
            'header' => 'Header',
            'sidebar' => 'Sidebar',
            'footer' => 'Footer'
        )
    );

    function my_wp_nav_menu_args( $args = '' )
    {
        $args['container'] = false;
        return $args;
    }
    add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

?>
