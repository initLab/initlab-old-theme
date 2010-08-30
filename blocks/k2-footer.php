<?php
/**
 * Footer Template
 *
 * This file is loaded by footer.php and used for content inside the #footer div
 *
 * @package K2
 * @subpackage Templates
 */
?>

<p class="footerpoweredby">
	<?php
		/* translators: 1: WordPress, 2: K2 */ 
		printf( __('Powered by %1$s and %2$s', 'k2'),
			'<a href="http://wordpress.org/">WordPress</a>',
			'<a href="http://getk2.com/" title="' . __('Loves you like a kitten.', 'k2') . '">K2</a>'
		);
	?>
	подтема за WordPress от <a href="http://dankov.name">Мързеливеца</a>
</p>
<p>Всички права запазени &copy; init Lab 2010</p>

<?php if ( get_k2info('style_footer') != '' ): ?>
	<p class="footerstyledwith">
		<?php k2info('style_footer'); ?>
	</p>
<?php endif; ?>