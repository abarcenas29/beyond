<?php

include 'helper.php';

	// smart jquery inclusion

	function add_script_code() 
	{
		wp_deregister_script('jquery');
		
		wp_enqueue_script(
		'jquery',
		base_url('source/js/jquery-1.9.1.js'),
		false,
		'1.9.1');
	}
	
	//add_action('admin_init', 'add_script_code');
	add_action('wp_enqueue_scripts', 'add_script_code');
	
	function _q($args) {
		return new WP_Query($args);
	}
	
	function sbt_auto_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter( 'excerpt_more', 'sbt_auto_excerpt_more', 20 );
	
	function apple_shortcut() {
		print '<link rel="apple-touch-icon" href="'.base_url('source/images/apple-touch-icon-iphone.png').'" />
			  <link rel="apple-touch-icon" sizes="72x72" href="'. base_url('source/images/apple-touch-icon-ipad.png') .'" />
			  <link rel="apple-touch-icon" sizes="114x114" href="'. base_url('source/images/apple-touch-icon-iphone4.png') .'" />';
	}
	add_action('wp_head', 'apple_shortcut');
	
	function ajax_func() {
		print '<script type="text/javascript">
				//<![CDATA[
				ajaxurl = "' . admin_url('admin-ajax.php'). '";
				//]]>
			</script>';
	}
	add_action('wp_footer', 'ajax_func');
	
	function time_format(){
		return 'D, jS M Y';
	}
	
	function show_navmenu($name){
		$args = array(
			'theme_location'  => $name,
			'container' => false,
			'echo'=>true,
			'fallback_cb' =>false
		);
		
		wp_nav_menu($args);
	}
	
	function catch_that_image($thumb = false) {
		global $post, $posts;
		ob_start();
		ob_end_clean();
		
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$image = $matches[1][0];

		$pattern = '#(-([1-9][0-9]{3}|[0-9]{3})[xX](([1-9][0-9]{3}|[0-9]{3})))#';
		$result = preg_match($pattern, $image,$match);
				
		if ($thumb == TRUE) {
			if($result > 0) {
				$url = preg_replace('#'.$match[0].'#', '-290x290', $image);
				} else {
					$result = preg_match('#.(jpeg|jpg|gif|png|bmp)#', $image, $match);
					$url = preg_replace('#'.$match[0].'#','-290x290'.$match[0],$image);
				}
			} else {
				if($result > 0) {
					$url = preg_replace('#'.$match[0].'#', '', $image);
					} 
			}
			
		if (_urlExist($url) == TRUE) {
			return $url;
		} else {
			return base_url('source/images/no-image.jpg');
		}
		
	}
	
	// enable threaded comments
	function enable_threaded_comments(){
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
			}
	}
	add_action('get_header', 'enable_threaded_comments');
	
	// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	
	// custom excerpt length
	function custom_excerpt_length($length) {
		return 50;
	}
	add_filter('excerpt_length', 'custom_excerpt_length');
	
	function _urlExist($url) {
		$header = @get_headers($url);
		if ($header[0] == 'HTTP/1.1 404 Not Found' or 
			$header[0] == 'HTTP/1.1 403 Forbidden' or
			$header[0] == 'HTTP/1.0 403 Forbidden') {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	// add a favicon to your blog
	function blog_favicon() {
		print '<link rel="Shortcut Icon" type="image/x-icon" href="'.base_url('source/images').'/favicon.ico" />';
	}
	add_action('wp_head', 'blog_favicon');
	
	// add a favicon for your admin
	function admin_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
	}
	add_action('admin_head', 'admin_favicon');
	
	// custom admin login logo
	function custom_login_logo() {
		print '<style type="text/css">
		h1 a { background-image: url('.get_bloginfo('template_directory').'/sources/images/deremoe-logo.png) !important; }
		</style>';
	}
	add_action('login_head', 'custom_login_logo');
	
	// kill the admin nag
	if (!current_user_can('edit_users')) {
		add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
		add_filter('pre_option_update_core', create_function('$a', "return null;"));
	}

	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
	// get the first category id
	function get_first_category_ID() {
		$category = get_the_category();
		return $category[0]->cat_ID;
	}
	
	// remove version info from head and feeds
	function complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'complete_version_removal');
?>