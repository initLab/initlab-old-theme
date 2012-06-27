<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link href="<?php bloginfo('template_url'); ?>/css/common.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/css/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--[if IE]>
    <link href="/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->

	<?php if ( is_singular() ): ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

