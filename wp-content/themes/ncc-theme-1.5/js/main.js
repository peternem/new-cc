// JavaScript Document
jQuery(document).ready(function() {
	initCycle();
	
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
    	console.log(widthx);
    	//jQuery('#masthead').toggle(jQuery(this).scrollTop() > (vidHeight - 50));
    	if ( widthx >= 1199 ) {
    		jQuery('.home #masthead').toggle(jQuery(this).scrollTop() > (vidHeight - 50));
    	}
	});
    
//    jQuery(window).scroll(function() {
//	  if (jQuery(this).scrollTop() == 0) {
//		  jQuery("#globalFooter").slideUp();
//	      }
//	  else {
//		  jQuery("#globalFooter").slideDown();
//	      }
//    });
	var footer = jQuery('#globalFooter'),
    extra = 10; // In case you want to trigger it a bit sooner than exactly at the bottom.
	footer.css({ opacity: '0', display: 'block' });
	jQuery(window).scroll(function() {
		var scrolledLength = (jQuery(window).height() + extra ) + jQuery(window).scrollTop(), documentHeight = jQuery(document).height();
		console.log( 'Scroll length: ' + scrolledLength + ' Document height: ' + documentHeight )
		if( scrolledLength >= documentHeight ) {
			footer.addClass('bottom').stop().animate({ bottom: '0', opacity: '1' }, 300);
		} else if ( scrolledLength <= documentHeight && footer.hasClass('bottom') ) {
			footer.removeClass('bottom').stop().animate({ bottom: '-100', opacity: '0' }, 300);
		}
	});
});


/**************************************************
 * Begin - Home Page SCOC-RadTiles
 *************************************************/

//window.onload = function(){
	//var car_w= jQuery('.slideshow_cycle').width();
	//jQuery('.slideshow_header').css ("width", car_w);
//}

var slideTime = 8000;
function initCycle() {
    var width = jQuery(document).width(); // Getting the width and checking my layout
   
    if ( width < 768 ) {
        jQuery('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 1,
            //carouselDimension: '366px'
        });

    } else if ( width > 768 && width < 980 ) {  
    	jQuery('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 2,
            //carouselDimension: '366px'
        });
    } else {
    	jQuery('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 3,
            //carouselDimension: '366px'
        });
    }
}


function reinit_cycle() {
    var width = jQuery(window).width(); // Checking size again after window resize
    if ( width < 768 ) {
    	jQuery('.cycle-slideshow').cycle('destroy');
        reinitCycle(1);
    } else if ( width > 768 && width < 980 ) {
    	jQuery('.cycle-slideshow').cycle('destroy');
        reinitCycle(2);
    } else {
    	jQuery('.cycle-slideshow').cycle('destroy');
        reinitCycle(3);
    }
}
function reinitCycle(visibleSlides) {
	jQuery('.cycle-slideshow').cycle({
        fx: 'carousel',
        speed: 600,
        timeout: slideTime,
        slides: 'div.slidetiles',
        carouselVisible: visibleSlides,
        carouselDimension: '366px'
    });
}
var reinitTimer;
jQuery(window).resize(function() {
    clearTimeout(reinitTimer);
    reinitTimer = setTimeout(reinit_cycle, 100); // Timeout limits the number of calculations   
});

