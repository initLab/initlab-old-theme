<?php

    // Helper functions
    function de($var, $debug=true)
    {
        if($debug)
        {
            echo '<div class="debug">';
                var_dump($var);
            echo '</div>';
        }
    }

    // Includes
    include 'lib/adminTweaks.php';
    include 'lib/rteTweaks.php';
    include 'lib/rteShortCodes.php';
    include 'lib/customwidgets.php';
    include 'lib/createCustomPostType.php';
    include 'breadcrumbs.php';

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

    register_nav_menu( 'header', 'Header' );
    register_nav_menu( 'sidebar', 'Sidebar');
    register_nav_menu( 'sitemap', 'Sitemap');
    register_nav_menu( 'footer', 'Footer');


?>
