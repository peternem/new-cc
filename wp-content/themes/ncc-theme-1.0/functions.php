<?php
/**
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

if (!isset($content_width)) $content_width = 770;

/**
 * upbootwp_setup function.
 * 
 * @access public
 * @return void
 */
function upbootwp_setup() {

	require 'inc/general/class-Upbootwp_Walker_Nav_Menu.php';

	load_theme_textdomain('upbootwp', get_template_directory().'/languages');

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	function my_theme_add_editor_styles() {
    	add_editor_style( 'css/custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );

	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	add_image_size( 'careers-featured', 1500, 980, true );
    add_image_size( 'careers-featured-narrow', 2500, 700, array( 'left', 'top' ) );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'homepage-thumb', 300, 200, array( 'left', 'top' )  ); // Hard crop left top
	add_image_size( 'homepage-thumb-port', 350, 350,  array( 'left', 'top' ));
	add_image_size( 'homepage-thumb-land', 350, 188,  array( 'left', 'top' ));
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Bootstrap WP Primary' ),
		'secondary' => __( 'Secondary Menu', 'Bootstrap WP Secondary' )
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'upbootwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
	
	
}

add_action( 'init', 'themes_taxonomy');
function themes_taxonomy() {
register_taxonomy(
    'careers','careers',
    array(
        'hierarchical'      => true,
        'label'             => 'Categories',
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true
        )
    ); 
} 

add_action( 'init', 'codex_career_init' );

function codex_career_init() {
    $labels = array(
        'name'               => _x( 'Careers', 'post type general name'),
        'singular_name'      => _x( 'Careers Item', 'post type singular name'),
        'menu_name'          => _x( 'Careers', 'admin menu'),
        'name_admin_bar'     => _x( 'Careers', 'add new on admin bar'),
        'add_new'            => _x( 'New', 'Career News Item'),
        'add_new_item'       => __( 'Add New Career News Item'),
        'new_item'           => __( 'New Career Item'),
        'edit_item'          => __( 'Edit Careers Item'),
        'view_item'          => __( 'View Careers Item'),
        'all_items'          => __( 'All Careers'),
        'search_items'       => __( 'Search Careers'),
        'parent_item_colon'  => __( 'Parent Careers:'),
        'not_found'          => __( 'No Careers Found.'),
        'not_found_in_trash' => __( 'No Careers Found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite' => array( 'slug' => 'careers','with_front' => true),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'        => array('post_tag') // this is IMPORTANT
    );
    register_post_type( 'careers', $args ); 
}




add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('post','careers', 'nav_menu_item');
        $query->set('post_type',$post_type);
    return $query;
    }
}






















function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Control Excerpt Length using Filters
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action( 'after_setup_theme', 'upbootwp_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function upbootwp_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar','upbootwp'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'upbootwp_widgets_init' );

function upbootwp_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '20130908');
	wp_enqueue_style( 'customized-bootstrap', get_template_directory_uri().'/css/ncc-bootstrap-style.css', array(), '20130908');
	wp_enqueue_style( 'font-awesome-icons', get_template_directory_uri().'/css/font-awesome.min.css' );
	
	// Add Modernizr for better HTML5 and CSS3 support
    
	//wp_enqueue_script('upbootwp-jQuery', get_template_directory_uri().'/js/jquery.js',array(),'2.0.3',true);
	wp_enqueue_script('upbootwp-jQuery-ui', get_template_directory_uri().'/js/jquery-ui.js',array(),'1.11.2',true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.custom.92053.js', array('jquery'), 'v2.8.3');
	wp_enqueue_script('upbootwp-basefile', get_template_directory_uri().'/bootstrap-34/js/bootstrap.js',array(),'20130905',true);
	wp_enqueue_script('cycle', get_template_directory_uri().'/js/jquery.cycle2.js',array(),'20130905',true);
	wp_enqueue_script('tile', get_template_directory_uri().'/js/jquery.cycle2.tile.js',array(),'20130905',true);
	wp_enqueue_script('carousel', get_template_directory_uri().'/js/jquery.cycle2.carousel.js',array(),'20130905',true);
	
	
	// if( ( is_home() || is_front_page() )) {    }
	    // wp_enqueue_script( 'big-video-script', get_template_directory_uri().'/js/bigvideo.js', 'v1.0' );
        // wp_enqueue_script( 'big-video-script-x', get_template_directory_uri().'/js/video.js', 'v1.0' );
        

 
    wp_enqueue_script( 'javascript', get_template_directory_uri().'/js/main.js',array(),'20130905',true);

}
add_action( 'wp_enqueue_scripts', 'upbootwp_scripts' );


/**
 * upbootwp_less function.
 * Load less for development or even on the running website. If you want to use less just enable this function
 * @access public
 * @return void
 */
function upbootwp_less() {
	printf('<link rel="stylesheet" type="text/less" href="%s" />', get_template_directory_uri().'/less/bootstrap.less?ver=0.1'); // raus machen :) 
	printf('<script type="text/javascript" src="%s"></script>', get_template_directory_uri().'/js/less.js');
}
// Enable this when you want to work with less
//add_action('wp_head', 'upbootwp_less');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';


/**
 * upbootwp_breadcrumbs function.
 * Edit the standart breadcrumbs to fit the bootstrap style without producing more css
 * @access public
 * @return void
 */
function upbootwp_breadcrumbs() {

	$delimiter = '<i class="fa fa-angle-double-right"></i>';
	$home = 'Home';
	$before = '<li class="active">';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {
		echo '<ol class="breadcrumb">';
		global $post;
		$homeLink = get_bloginfo('url');
		
		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';
		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;
		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;
		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;
		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</ol>';
	}
}


// Register custom footer and sidbar widget widgets
register_sidebar( array(
	'name' => __( 'Global Footer 1', 'tto' ),
	'id' => 'sidebar-4',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer 2', 'tto' ),
	'id' => 'sidebar-5',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer 3', 'tto' ),
	'id' => 'sidebar-6',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Left', 'tto' ),
	'id' => 'sidebar-7',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</h3></div><div class="panel-body">',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Middle', 'tto' ),
	'id' => 'sidebar-8',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</h3></div><div class="panel-body">',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Right', 'tto' ),
	'id' => 'sidebar-9',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</h3></div><div class="panel-body">',
) );

// Post Attachment image function. Image URL for CSS Background.
function the_post_image_url($size=large) {
	global $post;
	$linkedimgurl = get_post_meta ($post->ID, 'image_url', true);
	if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_image_src($image->ID, $size);
			$attachmenturl=$attachmenturl[0];
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmenturl.'';
		}
	} elseif ( $linkedimgurl ) {
		echo $linkedimgurl;
	} elseif ( $linkedimgurl && $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_image_src($image->ID, $size);
			$attachmenturl=$attachmenturl[0];
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmenturl.'';
		}
	} else {
		echo ''.get_bloginfo('template_url').'/img/no-attachment.gif';
	}
}

// Post Attachment image function. Direct link to file.
function the_post_image($size=thumbnail) {
	global $post;
	$linkedimgtag = get_post_meta ($post->ID, 'image_tag', true);
	if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmentimage.'';
		}
	} elseif ( $linkedimgtag ) {
		echo $linkedimgtag;
	} elseif ( $linkedimgtag && $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmentimage.'';
		}
	} else {
		echo '<img src="'.get_bloginfo ('template_url').'/img/no-attachment-large.gif" />';
	}
}
?>