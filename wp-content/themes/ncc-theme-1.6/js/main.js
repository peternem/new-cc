// JavaScript Document
jQuery(document).ready(function() {
	function wpex_staticheader() {
		var header_height = jQuery('.navbar').outerHeight();
		jQuery('#page, #main').css({
			paddingTop: header_height
		});	
		
		if (jQuery('#wpadminbar').length) {
			var admin_height = jQuery('#wpadminbar').outerHeight();
			jQuery('.navbar').css({
				position: 'fixed',
				top: admin_height
			});
	
		}
	}
	
	wpex_staticheader();
	
	jQuery(window).resize(function () {
		wpex_staticheader();
	});
	
	jQuery(window).bind('orientationchange', function(event) {
		var header_height = jQuery('.navbar').outerHeight();
		jQuery('#page, #main').css({
			paddingTop: header_height
		});
		
		if (jQuery('#wpadminbar').length) {
			var admin_height = jQuery('#wpadminbar').outerHeight();
			jQuery('.navbar').css({
				position: 'fixed',
				top: admin_height
			});
	
		}
	})
	
    /* ===========  VIDEO PLAYER  ================== */
	//jQuery('.parallax-container').parallax();	
	var myWindow = jQuery(window).innerHeight();
	jQuery(function(){
		jQuery('.parallax-container').css({ height: myWindow });
		jQuery(window).resize(function(){
			myWindow = jQuery(window).innerHeight()
			jQuery('.parallax-container').css({ height: myWindow });
		});
	});
	var myDiv = jQuery('.jumbotron').innerHeight();
	jQuery(function(){
		jQuery('.caption').css({ height: myDiv });
		jQuery(myDiv).resize(function(){
			myDiv = jQuery('.jumbotron').innerHeight()
			jQuery('.caption').css({ height: myDiv });
		});
	});
	
	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});

	
	//Click event to scroll to top
	jQuery('.navbar-collapse.collapse a').click(function(){
		jQuery('.navbar-collapse.collapse').toggleClass('in');
	});
	
	jQuery(function() {
		jQuery('#Carousel a[href*=#]:not([href=#]), #main-menu a[href*=#]:not([href=#]), #menu-main-sub-nav a[href*=#]:not([href=#]), .carousel-caption a[href*=#]:not([href=#]), .jumbotron a[href*=#]:not([href=#]), .locationArrow a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = jQuery(this.hash);
		      console.log(target)
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: (target.offset().top-50)
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
    

    
	// Listen for orientation changes
    
    /**** Video Wrap resize on window screen size height change. ***/
    var vidHeight = jQuery('.content-overlay').height();
    jQuery('#big-video-vid, .vjs-tech').css({'height': vidHeight});

    jQuery(document).scroll(function() {
    	var widthx = jQuery(document).width();
    	//console.log(widthx);
    	//jQuery('#masthead').toggle(jQuery(this).scrollTop() > (vidHeight - 50));
    	if ( widthx >= 1199 ) {
    		jQuery('.home #masthead').toggle(jQuery(this).scrollTop() > (vidHeight - 50));
    	}
	});
    

//	var footer = jQuery('#globalFooter'),
//    extra = 10; // In case you want to trigger it a bit sooner than exactly at the bottom.
//	footer.css({ opacity: '0', display: 'block' });
//	jQuery(window).scroll(function() {
//		var scrolledLength = (jQuery(window).height() + extra ) + jQuery(window).scrollTop(), documentHeight = jQuery(document).height();
//		//console.log( 'Scroll length: ' + scrolledLength + ' Document height: ' + documentHeight )
//		if( scrolledLength >= documentHeight ) {
//			footer.addClass('bottom').stop().animate({ bottom: '0', opacity: '1' }, 300);
//		} else if ( scrolledLength <= documentHeight && footer.hasClass('bottom') ) {
//			footer.removeClass('bottom').stop().animate({ bottom: '-100', opacity: '0' }, 300);
//		}
//	});
});