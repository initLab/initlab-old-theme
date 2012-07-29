<!DOCTYPE html>
<html class="wf-active">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css">
	<!--[if lt IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css"> <![endif]-->
	<!--[if lt IE 7]> <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie6.css"> <![endif]-->
	<?php if ( is_singular() ): ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<header>
			<h1><a href="/">init Lab</a></h1>
			<?php

				wp_nav_menu( array('theme_location' => 'header') );

				breadcrumbs();

				if(is_user_logged_in()){
					wp_nav_menu( array('menu' => 'Header Bar (logged-in)', 'container' => '', 'menu_class' => 'headerbar_menu', 'fallback_cb' => '') );
				}else {
					wp_nav_menu( array('menu' => 'Header Bar (logged-out)', 'container' => '', 'menu_class' => 'headerbar_menu', 'fallback_cb' => '') );
				}

			?>
		</header>
		<div id="main">


