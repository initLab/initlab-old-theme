<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css">
	<!--[if lt IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css"> <![endif]-->
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
			<?php wp_nav_menu( array('theme_location' => 'header') ); ?>
		</header>
		<?php breadcrumbs(); ?>
		<div id="main">


