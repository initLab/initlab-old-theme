<?php
/**
 * Template Name: Sitemap
 */
?>

<?php get_header(); ?>
	<div id="sitemap">
		<?php wp_nav_menu( array( 'theme_location'  => 'sitemap') ); ?>
	</div>
<?php get_footer(); ?>
