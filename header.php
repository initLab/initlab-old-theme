<?php
/**
 * The template for displaying the header.
 *
 * @package WordPress
 * @subpackage K2
 * @since K2 unknown
 */

	// Prevent users from directly loading this theme file
	defined( 'K2_CURRENT' ) or die ( __('Error: This file can not be loaded directly.', 'k2') );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://microformats.org/profile/hcard
               http://microformats.org/profile/hatom
               http://microformats.org/profile/rel-nofollow
               http://microformats.org/profile/rel-tag
               http://microformats.org/profile/xoxo
               http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="template" content="K2 <?php k2info('version'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>


	<?php if ( get_option('k2usestyle') != 0 ): ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/style.css" />
	<?php endif; ?>

	<?php /* Child Themes */ if ( K2_CHILD_THEME ): ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php endif; ?>

	<?php if ( is_singular() ): ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php endif; ?>

	<?php wp_head(); ?>

	<?php wp_get_archives('type=monthly&format=link'); ?>
</head>

<body <?php body_class(); ?>>

<?php /* K2 Hook */ do_action('template_body_top'); ?>

	<?php

	global $wp_query;
	$cur_post = $wp_query->get_queried_object();
	$cur_post_meta = get_post_meta($cur_post->ID, 'sidebarless');

	?>

	<div id="page"<?php if ($cur_post_meta[0]){ echo ' class="no-sidebar"'; } ?>>

	<?php /* K2 Hook */ do_action('template_before_header'); ?>

	<div id="header">

		<?php locate_template( array('blocks/k2-header.php'), true ); ?>

		<?php /* K2 Hook */ do_action('template_header'); ?>

	</div> <!-- #header -->

	<hr />

	<?php /* K2 Hook */ do_action('template_before_content'); ?>
