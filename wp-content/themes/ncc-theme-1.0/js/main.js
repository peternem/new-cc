// JavaScript Document
jQuery(document).ready(function() {
	initCycle();
	
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
		jQuery('.carousel-caption a[href*=#]:not([href=#]), .jumbotron a[href*=#]:not([href=#]), .content-overlay a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = jQuery(this.hash);
		      console.log(target)
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		          scrollTop: target.offset().top - 200
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
    /* ===========  VIDEO PLAYER  ================== */
    /* ==============================================
    VIDEO PLAYER
    =============================================== */
    
    jQuery(function() {
      //var BV = new jQuery.BigVideo();
     //BV.init();
     // BV.show('/wp-content/themes/ncc-theme-1.0/video/sbg-video3.mp4',{ambient:true});
    	var BV = new jQuery.BigVideo();
    	BV.init();
    	var isDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    	if (isDevice) {
    		BV.show('/wp-content/uploads/2015/06/Screen-Shot-2015-06-24-at-4.36.08-PM.png');
    		jQuery('#masthead').show();
    		jQuery('#video-wrap').hide();
    	} else {
    		BV.show('/wp-content/themes/ncc-theme-1.0/video/NCC Placeholder_3.mp4',{ambient:true});
    		jQuery('.content-overlay').show();
    	}
        
//        var BV = new jQuery.BigVideo();
//        BV.init();
//        if (Modernizr.touch) {
//            BV.show('/wp-content/uploads/2015/06/parallax_01_1500x9802.jpg');
//            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//            	jQuery('#video-wrap').hide();
//            } 
//        } else {
//            BV.show('/wp-content/themes/ncc-theme-1.0/video/sbg-video3.mp4',{ambient:true});
//        }

    });    

    
	// Listen for orientation changes
    
    /**** Video Wrap resize on window screen size height change. ***/
    var vidHeight = jQuery('.content-overlay').height();
    console.log(vidHeight);
    jQuery('#big-video-vid, .vjs-tech').css({'height': vidHeight});
	//jQuery('.content-overlay').css({'height': vidHeight});	
    
    jQuery(document).scroll(function() {
    	var widthx = jQuery(document).width();
    	console.log(widthx);
    	if ( widthx >= 768 ) {
    		jQuery('#masthead').toggle(jQuery(this).scrollTop() > (vidHeight - 50));
    	}
	});
});


/**************************************************
 * Begin - Home Page SCOC-RadTiles
 *************************************************/

//window.onload = function(){
	//var car_w= $('.slideshow_cycle').width();
	//$('.slideshow_header').css ("width", car_w);
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

