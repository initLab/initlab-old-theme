<?php
	wp_enqueue_script( 'initlab-common', get_bloginfo( 'stylesheet_directory' ) . '/scripts/common.js', array('jquery') );

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
					families: [ 'PT Sans' ]
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
	//add_filter( 'wp_head', 'load_fonts');

?>
