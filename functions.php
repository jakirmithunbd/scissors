<?php  
//show_admin_bar(false);

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/template_functions.php';
require get_template_directory() . '/inc/related-post.php';
require get_template_directory() . '/inc/leisure-ajax.php';

function scissors_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list'));


	//load text domain
	load_theme_textdomain('sciss', get_template_directory() . '/language');

	// Menu Register 

	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
			'menu-1'	=>	__('Main Menu', 'sciss'),
			'menu-2'	=>	__('Footer Menu', 'sciss'),
		));
	}
}
add_action('after_setup_theme', 'scissors_setup_theme');

function sciss_assets(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('dashicon');

	//script ===
	wp_enqueue_script('bootstrap', get_theme_file_uri('js/bootstrap.min.js'), array('jquery'), '0.0.1', true);
	wp_enqueue_script('counterup', get_theme_file_uri('/js/counterup.min.js'), array('jquery'), '0.0.2', true);
	wp_enqueue_script('waypoints', get_theme_file_uri('/js/waypoints.min.js'), array('jquery'), '0.0.4', true);
	wp_enqueue_script('slick', get_theme_file_uri('/js/slick.min.js'), array('jquery'), '0.0.3', true);

	$gmap_api = get_field('google_map_api_key', 'options');
	$googleapi = "//maps.googleapis.com/maps/api/js?key=$gmap_api";
	wp_enqueue_script('gmap_api', $googleapi, array(), false, true);

	wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts.js'), array('jquery'), null, true);

	$map_icon = get_field('map_pin', 'options');
	$map_zoom = get_field('map_zoom', 'options');
	$location = get_field('google_map');


	// localize data 
	$data = array(
		'map_icon' => $map_icon,
		'map_zoom' => $map_zoom,
		'gmap_latitude' => $location['lat'],
		'gmap_longitude' => $location['lng'],
		'gmap_address' => $location['address'],
		'site_url'   => get_theme_file_uri(),
		'admin_ajax'   => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script('main_js', 'ajax', $data);

	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/css/bootstrap.min.css'));
	wp_enqueue_style('slick_css', get_theme_file_uri('/css/slick.css'));
	wp_enqueue_style('slick-theme', get_theme_file_uri('/css/slick-theme.css'));
	wp_enqueue_style('fonts', get_theme_file_uri('//fonts.googleapis.com/css?family=PT+Sans+Caption:400,700|PT+Sans:400,400i,700,700i|Roboto+Slab:100,300,400,700" rel="stylesheet', null, true));
	wp_enqueue_style('main_style', get_theme_file_uri('/css/main_style.css', null, time()));
	wp_enqueue_style('leisure_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'sciss_assets');

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// SVG icon support
function leisure_svg_support($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'leisure_svg_support');

/*** Get all page id */
function getPageID() {
  	global $post;
  	$postid = $post->ID;
  	$queried_object = get_queried_object();
  	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
  	}
  	else if (is_front_page()) {
  		$postid = get_option( 'page_on_front' );
  	}
  	else if (is_archive()) {
  		$postid = get_queried_object();
  	}
  	else if ( $queried_object ) {
    	$postid = $queried_object->ID;
   	}

  	return $postid;
}

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  	$gmap_api = get_field('google_map_api_key', 'options');
	return $gmap_api;
});


// User role
function get_user_role($id)
{
    $user = new WP_User($id);
    return array_shift($user->roles);
}