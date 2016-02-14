<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<div data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="/wp-content/uploads/2015/11/wood-bground-1-2500x1406-1920x768.jpg" data-natural-width="1920" data-natural-height="768" class="parallax-container-single white">
	<div class="filter"></div>
	<div class="caption">
		<header class="page-header">
			<h1 class="section-title">Sermons</h1>
		</header> 
	</div>
</div>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white">
<section class="content-area">
<p class="text-center">Catch up on a missed Sunday, share with a friend, or explore what the Bible has to say about different topics.</p>
<script src="//connect.soundcloud.com/sdk.js"></script>
<script>
jQuery( document ).ready(function() {
	
SC.initialize({
    client_id: "74279e5d2c33017a341409599e5ba429",
    redirect_uri: "http://example.com/callback.html",
});

/**
Once that's done you are all set and ready to call the SoundCloud API. 
**/



/**
Call to the SoundCloud API. 
Retrieves list of tracks, and displays a list with links to the tracks showing 'tracktitle' and 'track duration'
**/

var userId = 119963434; // user_id of Prutsonic

	SC.get("/tracks", {
	    user_id: userId,
	    limit: 100
	}, function (tracks) {
	
	    var tmp = '';
	   
		function millisToMinutesAndSeconds(millis) {
		  var minutes = Math.floor(millis / 60000);
		  var seconds = ((millis % 60000) / 1000).toFixed(0);
		  return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
		}
		
		function daysAndMonths(factor) {
	    	var date = new Date(factor);
	    	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();
		}

		var avatar;
	    for (var i = 0; i < tracks.length; i++) {
	    	if ( tracks[i].artwork_url == null) {  avatar = tracks[i].user.avatar_url} else { avatar = tracks[i].artwork_url }
	    	
	        tmp1 = '<td class="title"><img src="'+ avatar +'" class="artwork img-responsive" /><a href="' + tracks[i].permalink_url + '" class=\"perma-link\" target=\"_blank\">' + tracks[i].title + '</a></td>';
	       	tmp1 += '<td class="date">' + daysAndMonths(tracks[i].created_at) + '</td>';
	        tmp1 += '<td class="time">' + millisToMinutesAndSeconds(tracks[i].duration)+ '</td>';
	        tmp1 += '<td class="tags">' + tracks[i].tag_list + '</td>';
	    
	       	jQuery("<tr/>").html(tmp1).appendTo("#track-list > tbody");
	        jQuery("<li/>").html(tmp).appendTo("#track-list1");
	    }
	
	});
});
</script>
    <div class="sermon-tables">
    <h2 class="panel-heading text-center" id="<?php echo $stid = '#'.strtolower($member_group_term->name); ?>"><?php echo $st = strtolower($member_group_term->name); ?></h2>
    <table  id="track-list" class="table-striped">
    	<thead>
    		<tr>
    		<th>Title</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Tags</th>
        	</tr>
        </thead>
        <tbody >
    	</tbody>
    </table>
    </div>
</section>

</div>
<section id="QuickLinks" class="cat-quick-links">
<div class="container-fluid text-center">
<h1 class="entry-title">Visit Our Sermon Page on SoundCloud</h1>
<ul>
	<li>
		<a class="btn btn-primary" href="https://soundcloud.com/newport-covenant-church/tracks" title="Leadership" target="blank" role="button">Visit SoundCloud<i class="fa fa-external-link"></i></a>
	</li>
</ul>
</div>
</section>
<?php get_footer(); ?>