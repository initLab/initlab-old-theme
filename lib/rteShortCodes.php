<?php

	// Year Shortcode
	function year_shortcode()
	{
		$year = date('Y');
		return $year;
	}
	add_shortcode('year', 'year_shortcode');

	// Detect Gists and Embed Them [gist id="ID" file="FILE"]
	function gist_shortcode($atts)
	{
		return sprintf(
			'<script src="https://gist.github.com/%s.js%s"></script>',
			$atts['id'],
			$atts['file'] ? '?file=' . $atts['file'] : ''
		);
	}
	add_shortcode('gist','gist_shortcode');

	// Remove this function if you don't want autoreplace gist links to shortcodes
	function gist_shortcode_filter($content)
	{
		return preg_replace('/https:\/\/gist.github.com\/([\d]+)[\.js\?]*[\#]*file[=|_]+([\w\.]+)(?![^<]*<\/a>)/i', '[gist id="${1}" file="${2}"]', $content );
	}
	add_filter( 'the_content', 'gist_shortcode_filter', 9);

?>
