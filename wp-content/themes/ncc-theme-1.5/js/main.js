// JavaScript Document
jQuery(document).ready(function() {
	
	//jQuery('#main-menu .menu-item').first().addClass('active');
    /* ===========  VIDEO PLAYER  ================== */
	
    jQuery(function() {
    	var BV = new jQuery.BigVideo();
    	BV.init();
    	BV.show('/wp-content/themes/ncc-theme-1.0/video/NCC Placeholder_3.mp4',{ambient:true});
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

	
	jQuery(function() {
		jQuery('#main-menu a[href*=#]:not([href=#]), #menu-main-sub-nav a[href*=#]:not([href=#]), .carousel-caption a[href*=#]:not([href=#]), .jumbotron a[href*=#]:not([href=#]), .locationArrow a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = jQuery(this.hash);
		      console.log(target)
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: target.offset().top
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
    

	var footer = jQuery('#globalFooter'),
    extra = 10; // In case you want to trigger it a bit sooner than exactly at the bottom.
	footer.css({ opacity: '0', display: 'block' });
	jQuery(window).scroll(function() {
		var scrolledLength = (jQuery(window).height() + extra ) + jQuery(window).scrollTop(), documentHeight = jQuery(document).height();
		//console.log( 'Scroll length: ' + scrolledLength + ' Document height: ' + documentHeight )
		if( scrolledLength >= documentHeight ) {
			footer.addClass('bottom').stop().animate({ bottom: '0', opacity: '1' }, 300);
		} else if ( scrolledLength <= documentHeight && footer.hasClass('bottom') ) {
			footer.removeClass('bottom').stop().animate({ bottom: '-100', opacity: '0' }, 300);
		}
	});
});