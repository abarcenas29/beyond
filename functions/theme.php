<?php

    function home_loop()
    {
	$args = array(
	    'category__not_in'	=> array(1),
	    'offset'		=> 1
	);
	
	$q = new WP_Query($args);
	$q->post_count = 10;
	return $q;
    }

    function home_header()
    {
	$args = array(
	    'category__not_in'	=> array(1),
	);
	$q = new WP_Query($args);
	$q->post_count = 1;
	return $q;
    }
	
	function single_breadcrumb($post_id)
	{
		$cat_id = wp_get_post_categories($post_id);
		
		$breadcrumb = array();
		$c = 0;
		foreach($cat_id as $cat)
		{
			$cat_object = get_category($cat);
			$breadcrumb[$c]['cat-url']  = blog_url('category/'.$cat_object->slug);
			$breadcrumb[$c]['name']		= $cat_object->name;
			$c++;
		}
		return $breadcrumb;
	}
?>