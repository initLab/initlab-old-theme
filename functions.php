<?php

    add_filter( 'use_default_gallery_style', '__return_false' ); //Remove Gallery Inline Styling

    // Year Shortcode
    function year_shortcode() {
      $year = date('Y');
      return $year;
    }
    add_shortcode('year', 'year_shortcode');

    //Turn On More Buttons in the WordPress Visual Editor
    function add_more_buttons($buttons) {
     $buttons[] = 'hr';
     $buttons[] = 'del';
     $buttons[] = 'sub';
     $buttons[] = 'sup';
     $buttons[] = 'fontselect';
     $buttons[] = 'fontsizeselect';
     $buttons[] = 'cleanup';
     $buttons[] = 'styleselect';
     return $buttons;
    }
    add_filter("mce_buttons_3", "add_more_buttons");

    // Detect Gists and Embed Them

    // [gist id="ID" file="FILE"]
    function gist_shortcode($atts) {
      return sprintf(
        '<script src="https://gist.github.com/%s.js%s"></script>',
        $atts['id'],
        $atts['file'] ? '?file=' . $atts['file'] : ''
      );
    } add_shortcode('gist','gist_shortcode');

    // Remove this function if you don't want autoreplace gist links to shortcodes
    function gist_shortcode_filter($content) {
      return preg_replace('/https:\/\/gist.github.com\/([\d]+)[\.js\?]*[\#]*file[=|_]+([\w\.]+)(?![^<]*<\/a>)/i', '[gist id="${1}" file="${2}"]', $content );
    } add_filter( 'the_content', 'gist_shortcode_filter', 9);


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
