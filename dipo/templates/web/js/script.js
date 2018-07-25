var $ = jQuery.noConflict();

$(document).ready(function($) {
	/* ---------------------------------------------------------------------- */
	/*	Sliders - [Flexslider]
	/* ---------------------------------------------------------------------- */
  	try {
		$('.version1 .flexslider').flexslider({
			animation: "fade",
			pausePlay: false,
			start: function(slider){
		        $('#slider.version1 .flex-pause-play').on("click", function() {
		        	if($(this).hasClass('pause')){
		        		$(this).removeClass('pause');
		        		slider.resume();
		        	} else {
		        		$(this).addClass('pause');
		        		slider.pause();
		        	}
		        });
		    }
		});

		$('.version3 .flexslider').flexslider({
			animation: "fade",
			controlNav: "thumbnails",
			directionNav: true
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Dropdown Menu - Superfish
	/*-------------------------------------------------*/
	$('ul.sf-menu').superfish({
		delay: 400,
		autoArrows: false,
		speed: 'fast',
		animation: {opacity:'show', height:'show'}
	});

	/*-------------------------------------------------*/
	/* =  Mobile Menu
	/*-------------------------------------------------*/
	// Create the dropdown base
    $("<select />").appendTo(".navigation");
    
    // Create default option "Go to..."
    $("<option />", {
    	"selected": "selected",
    	"value"   : "",
    	"text"    : "MENU WEBSITE"
    }).appendTo(".navigation select");
    
    // Populate dropdown with menu items
    $(".sf-menu a").each(function() {
    	var el = $(this);
    	if(el.next().is('ul.sub-menu')){
    		$("<optgroup />", {
	    	    "label"    : el.text()
	    	}).appendTo(".navigation select");
    	} else {
    		$("<option />", {
	    	    "value"   : el.attr("href"),
	    	    "text"    : el.text()
	    	}).appendTo(".navigation select");
    	}
    });

    // Change style
    $('.navigation select').selectbox({
		effect: "slide"
	});
    
	// To make dropdown actually work
	// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    $(".navigation select").change(function() {
      window.location = $(this).find("option:selected").val();
    });

	/*-------------------------------------------------*/
	/* =  Gallery in Singlepost
	/*-------------------------------------------------*/
	try {
		$('.page-container .gallery').flexslider({
			directionNav: false
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  jCarousel - Gallery and Posts
	/*-------------------------------------------------*/
	try {
		$('.carousel ul.slides').jcarousel({
			scroll: 1
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Fancybox Images
	/*-------------------------------------------------*/
	try {
		$(".carousel.gallery ul.slides a, .page-container .gallery .slides a, .post-image a").fancybox({
			nextEffect	: 'fade',
			prevEffect	: 'fade',
			openEffect	: 'fade',
	    	closeEffect	: 'fade',
	          helpers: {
	              title : {
	                  type : 'float'
	              }
	          }
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Fancybox Videos
	/*-------------------------------------------------*/
	try {
		$('.video-container li > a').fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '75%',
			height		: '75%',
			type 		: 'iframe',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'fade',
			closeEffect	: 'fade'
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/
	$('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });

    /*-------------------------------------------------*/
	/* =  Categories - Toggle
	/*-------------------------------------------------*/
	/*$('.widget_categories li:has(ul.children)').on('click', function(){
		$(this).find('> ul.children').slideToggle();
		return false;
	});*/

    /*-------------------------------------------------*/
	/* =  Tabs Widget - { Popular, Recent and Comments }
	/*-------------------------------------------------*/
	$('.tab-links li a').live('click', function(e){
		e.preventDefault();
		if (!$(this).parent('li').hasClass('active')){
			var link = $(this).attr('href');

			$(this).parents('ul').children('li').removeClass('active');
			$(this).parent().addClass('active');

			$('.tabs-widget > div').hide();

			$(link).fadeIn();
		}
	});

    /* ---------------------------------------------------------------------- */
	/*	Comment Tree
	/* ---------------------------------------------------------------------- */
	try {
		$('#content ul.children > li, ol#comments > li').each(function(){
			if($(this).find(' > ul.children').length == 0){
				$(this).addClass('last-child');
			}
		});

		$("#content ul.children").each(function() {
			if($(this).find(' > li').length > 1) {
				$(this).addClass('border');
			}
		});

		$('ul.children.border').each(function(){
			$(this).append('<span class="border-left"></span>');

			var _height = 0;

			for(var i = 0; i < $(this).find(' > li').length - 1; i++){
				_height = _height + parseInt($(this).find(' > li').eq(i).height()) + parseInt($(this).find(' > li').eq(i).css('margin-bottom'));
			}

			_height = _height + 29;

			$(this).find('span.border-left').css({'height': _height + 'px'});
		});
	} catch(err) {

	}

	$(window).bind('resize', function(){
		try {
			$('ul.children.border').each(function(){
				var _height = 0;

				for(var i = 0; i < $(this).find(' > li').length - 1; i++){
					_height = _height + parseInt($(this).find(' > li').eq(i).height()) + parseInt($(this).find(' > li').eq(i).css('margin-bottom'));
				}

				_height = _height + 29;

				$(this).find('span.border-left').css({'height': _height + 'px'});
			});
		} catch(err) {

		}
	});

	/*-------------------------------------------------*/
	/* =  Toggle Shortcodes
	/*-------------------------------------------------*/
	$('.toggle-style-1 > ul > li > h6, .toggle-style-2 > ul > li > h6').live('click', function(){
		if (!$(this).hasClass('expand')){
			$(this).parents('ul').find('h6.expand').removeClass('expand');
			$(this).addClass('expand');

			$(this).parents('ul').find('div.inner').removeClass('active').stop(true,true).slideUp(200);

			$(this).parent('li').children('div.inner').addClass('active').stop(true,true).slideDown(200);
		} else {
			$(this).parents('ul').find('h6.expand').removeClass('expand');
			$(this).parents('ul').find('div.inner').removeClass('active').stop(true,true).slideUp(200);
		}
	});

	/*-------------------------------------------------*/
	/* =  Tabs Shortcodes
	/*-------------------------------------------------*/
	$('.tabs > ul > li > a').live('click', function(e){
		e.preventDefault();
		if (!$(this).parent('li').hasClass('active')){
			var link = $(this).attr('href');

			$(this).parents('ul').children('li').removeClass('active');
			$(this).parent().addClass('active');

			$('.tabs > div').removeClass('active').hide();

			$(link).addClass('active').fadeIn();
		}
	});

    /* ---------------------------------------------------------------------- */
	/*	Contact Map
	/* ---------------------------------------------------------------------- */
	var contact = {"lat":"42.672421", "lon":"21.16453899999999"}; //Change a map coordinate here!

	try {
		$('#map').gmap3({
		    action: 'addMarker',
		    latLng: [contact.lat, contact.lon],
		    map:{
		    	center: [contact.lat, contact.lon],
		    	zoom: 14
		   		},
		    },
		    {action: 'setOptions', args:[{scrollwheel:true}]}
		);
	} catch(err) {

	}

	$(window).bind('resize', function(){		
		//Carousel Fix
		try {
			$('.jcarousel-list-horizontal').css({'left': '0px'});

			$('.jcarousel-list-horizontal').each(function(){
				var _width = 0;

				$(this).children('li.jcarousel-item').each(function(){
					_width = _width + parseInt($(this).width()) + parseInt($(this).css('margin-left')) + parseInt($(this).css('margin-right'));
				});

				$(this).width(_width);
			});
		} catch(err) {

		}
	});
});

/*-------------------------------------------------*/
/* =  Masonry Effect
/*-------------------------------------------------*/
$(window).load(function(){
	$('#sidebar').masonry({
		singleMode: true,
		itemSelector: '.widget',
		columnWidth: 300,
		gutterWidth: 20
	});
});