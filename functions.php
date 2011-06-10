<?php

	add_filter('gallery_style', create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));

	function remove_wp_widget_recent_comments_style() {
	      remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
	add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style');

	wp_enqueue_script( 'initlab-common', get_bloginfo( 'stylesheet_directory' ) . '/scripts/common.js', array('jquery') );
	wp_enqueue_style( 'initlab-less', get_bloginfo( 'stylesheet_directory' ) . '/styles/lessframework.css' );

	if ( function_exists('register_sidebar') ){

		register_sidebar(
			array(
				'name' => 'homepage',
				'description' => 'This widget area is on top of the content on the homepage',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
			)
		);

	}

	// Fonts loading from Google Web Fonts direcory. JavaScrip loading gives us feedback on the loaded status of every font.
	function load_fonts()
	{																		?>
		<script
			type="text/javascript"
			src="http://www.google.com/jsapi?key=ABQIAAAA0m4OXZCc-BMR9w3Ml16ZMxQ8-tzA9NU1mD3xYgw4R-6I36tNQRS05e8e0tgHafN4dfp4Nb9qtSbkOw">
		</script>
		<script type="text/javascript">
			WebFontConfig = {
				google: {
					families: [ 'PT Sans', 'PT Serif', 'Open Sans' ]
				}
			}

			function wf_load()
			{
				var wf = document.createElement('script');
				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			}
			wf_load();
		</script>
		<?php
	}
	add_filter( 'wp_head', 'load_fonts');

	// Content selection function. Used primarily on the homepage.
	function selectContent($type, $count, $title) {

		if($type=='courses')
		{
			$content = new WP_Query( array( 'post_type' => $type, 'meta_key' => 'project', 'meta_value' => 'true', 'showposts' => $count ) );
		}
		elseif($type=='projects')
		{
			$content = new WP_Query( array( 'post_type' => $type, 'meta_key' => 'project', 'meta_value' => 'true', 'showposts' => $count ) );
		}
		else
		{
			$content = new WP_Query( array( 'post_type' => $type, 'showposts' => $count ) );
		}

		?>

		<div id="<?php echo $type; ?>" class="mod">
		<div class="hdr"><h2><?php echo $title; ?></h2><a href="<?php if($type != 'post'){ echo '/'.$type; } ?>/feed" target="_blank" class="rss">RSS</a></div>
			<ul class="cnt">
			<?php while ( $content->have_posts() ) : $content->the_post(); ?>
				<li id="entry-<?php the_ID(); ?>">
					<span class="entry-header">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
						<?php
							/* Edit Link */
							edit_post_link( __('Edit', 'k2'), '<span class="entry-edit">', '</span>' );
						?>
						<span class="entry-meta">
							<?php  k2_entry_meta(1); ?>
						</span>
						<?php
							/* K2 Hook */
							do_action('template_entry_head');
						?>
					</span>
					<?php if($type=="post"){?>
						<?php the_excerpt(); ?>
					<?php } ?>
				</li>
			<?php endwhile; /* End The Loop */ ?>
			</ul>
			<p><a class="more" href="<?php if($type!='post'){ echo '/'.$type; } ?>">Виж всички &raquo;</a></p>
		</div>

	<?php
	wp_reset_postdata();
	}

?>

