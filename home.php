<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

	<div class="row line1">
		<?php dynamic_sidebar("Homepage"); ?>
	</div>
	<div class="row line2">
		<section class="twitter">
			<header>
				<h3>#initlab в Twitter</h3>
			</header>
			<div class="content" id="tweets">
			</div>
		</section>
	</div>
	<div class="row line3">
		<section class="twitter">
			<header>
				<h3>Кой e в Лаб'а?</h3>
			</header>
			<div class="content" id="presence">
			</div>
		</section>
	</div>
	<?php /* ?>
	<div class="row line3">
		<section class="twitter">
			<header>
				<h3>Кой влезе последно в Лаб'а?</h3>
			</header>
			<div class="content" id="gatekeeper">
			</div>
		</section>
	</div>
	<?php */ ?>
	<div class="row line3">

		<!--
		<section class="panel">
			<header>
				<h3>Кой е в лаба сега?</h3>
			</header>
			<div class="content" id="now">
				<ul class="tweet_list">
					<li><a class="avatar" href="http://twitter.com/disastacre"><img src="http://a0.twimg.com/profile_images/1635250142/IMG_3798_normal.JPG" height="52" width="52" alt="disastacre's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/disastacre">disastacre</a></span></li>
					<li><a class="avatar" href="http://twitter.com/disastacre"><img src="http://a0.twimg.com/profile_images/1635250142/IMG_3798_normal.JPG" height="52" width="52" alt="disastacre's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/disastacre">disastacre</a></span></li>
					<li><a class="avatar" href="http://twitter.com/disastacre"><img src="http://a0.twimg.com/profile_images/1635250142/IMG_3798_normal.JPG" height="52" width="52" alt="disastacre's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/disastacre">disastacre</a></span></li>
					<li><a class="avatar" href="http://twitter.com/ickoooo"><img src="http://a0.twimg.com/profile_images/1505616255/image201108210004_normal.jpg" height="52" width="52" alt="ickoooo's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/ickoooo">ickoooo</a></span></li>
					<li><a class="avatar" href="http://twitter.com/andrewradev"><img src="http://a0.twimg.com/profile_images/1534823526/london_small_normal.jpg" height="52" width="52" alt="andrewradev's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/andrewradev">andrewradev</a></span></li>
					<li><a class="avatar" href="http://twitter.com/Bloodymirova"><img src="http://a0.twimg.com/profile_images/2196748827/profile_1_normal.jpg" height="52" width="52" alt="Bloodymirova's avatar"></a><span class="tweet_text"><a class="tweet_user" href="http://twitter.com/Bloodymirova">Bloodymirova</a></span></li>
				</ul>
			</div>
		</section>
		-->

		<section class="panel" id="calendar">
			<header>
				<h2>Предстоящи събития</h2>
			</header>
			<div class="content">
				<?php echo apply_filters('the_content', '{CALENDAR}'); ?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>
