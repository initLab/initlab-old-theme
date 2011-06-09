<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage K2
 * @since K2 unknown
 */
?>

	<?php /* K2 Hook */ do_action('template_after_content'); ?>

	<div class="clear"></div>

	<hr />

	<?php /* K2 Hook */ do_action('template_before_footer'); ?>

	<div id="footer">

		<?php locate_template( array('blocks/k2-footer.php'), true ); ?>

		<?php /* K2 Hook */ do_action('template_footer'); ?>

	</div><!-- #footer -->

</div> <!-- Close Page -->
<?php wp_footer(); ?>

</body>
</html>
