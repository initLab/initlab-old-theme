jQuery(document).ready(function ($) {

	WebFontConfig = {
		google: { families: [ 'PT+Sans' ] },
		custom: { families: [ 'PictosWeb' ], urls: [ '/content/themes/initlab/css/fonts/fonts.css' ] },
		loading: function() {
			// Called when all the specified web-font provider modules (google, typekit, and/or custom) have reported that they have started loading fonts.

		},
		active: function() {
			// Called when all of the web fonts have either finished loading or failed to load, as long as at least one loaded successfully.

		},
		inactive: function() {
			// Called if the browser does not support web fonts or if none of the fonts could be loaded.

		}
	};

	(function(){
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();

	/* Load Tweets on the homepage */
	$("#tweets").tweet({
		join_text: "",
		avatar_size: 52,
		count: 6,
		query: "#initlab",
		loading_text: "Loading tweets...",
		template: "{avatar}{text}{user}{time}"
	});

	$(".widget_flickrRSS li a").each(function(){
	
		var url_i_square = $(this).attr('data-image-square');

		$(this).html('<img src="'+url_i_square+'" />');

	});


	//$(window).load(function() {
		//$('.tweet_avatar img').each(function(){
			//var imgClass = $(this).attr('class');
			//$(this).wrap('<span class="image-wrap glossy" style="width: auto; height: auto;"/>');
			//$(this).removeAttr('class');
		//});
	//});


  /* Use this js doc for all application specific JS */

  /* TABS --------------------------------- */
  /* Remove if you don't need :) */

  function activateTab($tab) {
    var $activeTab = $tab.closest('dl').find('dd.active'),
        contentLocation = $tab.children('a').attr("href") + 'Tab';

    // Strip off the current url that IE adds
    contentLocation = contentLocation.replace(/^.+#/, '#');

    // Strip off the current url that IE adds
    contentLocation = contentLocation.replace(/^.+#/, '#');

    //Make Tab Active
    $activeTab.removeClass('active');
    $tab.addClass('active');

    //Show Tab Content
    $(contentLocation).closest('.tabs-content').children('li').hide();
    $(contentLocation).css('display', 'block');
  }

  $('dl.tabs dd a').on('click.fndtn', function (event) {
    activateTab($(this).parent('dd'));
  });

  if (window.location.hash) {
    activateTab($('a[href="' + window.location.hash + '"]'));
    $.foundation.customForms.appendCustomMarkup();
  }

  /* ALERT BOXES ------------ */
  $(".alert-box").delegate("a.close", "click", function(event) {
    event.preventDefault();
    $(this).closest(".alert-box").fadeOut(function(event){
      $(this).remove();
    });
  });

  /* PLACEHOLDER FOR FORMS ------------- */
  /* Remove this and jquery.placeholder.min.js if you don't need :) */
  // $('input, textarea').placeholder();

  /* TOOLTIPS ------------ */
  // $(this).tooltips();

  /* UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE6/7/8 SUPPORT AND ARE USING .block-grids */
  //  $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
  //  $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
  //  $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
  //  $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});

});
