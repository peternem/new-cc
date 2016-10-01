jQuery('#big-video-wrap .vjs-loading-spinner').prepend(
		'<img src="../css/spinner.gif" alt="Loading...">');

/* =========== VIDEO PLAYER ================== */
jQuery(function() {

	// Use Modernizr to detect for touch devices,
	// then serve them alternate background image content
	var isTouch = Modernizr.touch;

	// vars for auto hiding
	var isShowingPlaylist = false;
	var isHidden = false;
	var autoHideTimer;
	var $showContentButton = jQuery('<div id="stopPlay" class="btn btn-primary touchscreen-show-button box">Stop</div>');

	// initialize BigVideo
	var BV = new jQuery.BigVideo({
		forceAutoplay : isTouch
	});
	BV.init();
	// show background image
	BV.show('/wp-content/themes/ncc-theme/img/the_edge-sceenshot.jpg');

	// Playlist button click starts video, enables autohiding
	if (isTouch) {
		BV.show('/wp-content/themes/ncc-theme/img/the_edge-sceenshot.jpg');
		jQuery('.nav.box').hide();
	}
	jQuery(".playlist-btn")
			.click(
					function(e) {

						if (isTouch) {
							BV.show('video-poster.jpg');
							jQuery('.nav.box').hide();
						} else {
							e.preventDefault();
							BV.show(jQuery(this).attr('href'));
							isShowingPlaylist = false;
							// jQuery('#fullScreen').prepend($showContentButton);
							jQuery(".playlist-btn").text('Stop the Video');
							jQuery("#videoTitle").fadeOut('fast');
							jQuery("#big-video-control-timer").show();

							if (jQuery(this).hasClass('playing')) {
								BV.getPlayer().pause();
								jQuery(".playlist-btn").text('Play the Video');
								jQuery("#videoTitle").fadeIn('fast');
								BV
										.show('/wp-content/themes/ncc-theme/img/the_edge-sceenshot.jpg');
							} else {
								jQuery('#stopPlay').addClass('playing');
								BV.getPlayer().play();
							}
							jQuery(this).toggleClass('playing');
						}

					});
	BV.getPlayer().on("ended", function() {
		BV.show('/wp-content/themes/ncc-theme/img/the_edge-sceenshot.jpg');
		jQuery("#videoTitle").fadeIn('fast');
		jQuery(".playlist-btn").text('Play the Video');
	});

});