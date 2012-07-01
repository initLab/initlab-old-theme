<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<!-- Included CSS Files -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css">
	<![endif]-->

	<?php if ( is_singular() ): ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif; ?>

	<!--
	<script src="<?php bloginfo('template_url'); ?>/scripts/foundation/modernizr.foundation.js"></script>
	-->

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


	<!-- container -->
	<div class="container">

