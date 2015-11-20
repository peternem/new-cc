// JavaScript Document

jQuery(document).ready(function() {
	
	// Add Bootstrap form classes to FS Contact Form Plugin
	jQuery( '.fscf-div-clear .fscf-div-field-left' ).addClass( 'form-group' );
	jQuery( '.fscf-div-field .fscf-input-text' ).addClass( 'form-control' );
	jQuery( '.fscf-div-field .fscf-input-textarea' ).addClass( 'form-control' );
	jQuery( '.fscf-div-submit .fscf-button-submit' ).addClass( 'btn btn-primary' );
	
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
	});
	
    /* ===========  VIDEO PLAYER  ================== */
	//jQuery('.parallax-container').parallax();	
	var myWindow = jQuery(window).innerHeight();
	jQuery(function(){
		jQuery('.parallax-container').css({ height: myWindow });
		jQuery(window).resize(function(){
			myWindow = jQuery(window).innerHeight();
			jQuery('.parallax-container').css({ height: myWindow });
		});
	});
	var myDiv = jQuery('.jumbotron').innerHeight();
	jQuery(function(){
		jQuery('.caption').css({ height: myDiv });
		jQuery(myDiv).resize(function(){
			myDiv = jQuery('.jumbotron').innerHeight();
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
	jQuery('#contactLink').click(function(){
		jQuery('ul.spotlight.contact').toggleClass('open-spot');
		setTimeout(function() {
			jQuery('ul.spotlight.contact').removeClass('open-spot');
		}, 3000); // <-- time in milliseconds
		return false;
	});
	jQuery('#mapLink').click(function(){
		jQuery('ul.spotlight.map').toggleClass('open-spot');
		setTimeout(function() {
			jQuery('ul.spotlight.map').removeClass('open-spot');
		}, 3000); // <-- time in milliseconds
		return false;
	});
	
	//Click event to scroll to top
	jQuery('.navbar-collapse.collapse a').click(function(){
		jQuery('.navbar-collapse.collapse').toggleClass('in');
	});
	
	jQuery(function() {
		jQuery('#Carousel a[href*=#]:not([href=#]), #main-menu a[href*=#]:not([href=#]), #menu-main-sub-nav a[href*=#]:not([href=#]), .carousel-caption a[href*=#]:not([href=#]), .jumbotron a[href*=#]:not([href=#]), .locationArrow a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
		      var target = jQuery(this.hash);
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: (target.offset().top)
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
	
	jQuery(function() {
		jQuery('#Media a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
		      var target = jQuery(this.hash);
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: (target.offset().top)
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
	
	var hash = window.location.hash.substring(1);
	var location = window.location;
	if(hash){
		window.onload = function (event) {
		    //window.location.hash = "#" +hash;
		    var yOffset = jQuery("#" +hash).offset().top;
		    //jQuery('html,body').scrollTop(yOffset);
		    jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: (yOffset)
		        }, 1000);
		};
	}


		  
	
});
