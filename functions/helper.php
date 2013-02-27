<?php

/*
 * Helper functions
 */
    function print_anchor($url,$text,$att = '')
    {
	$format = '<a href="%s" %s >%s</a>';
	print_object(sprintf($format, $url,$att,$text));
    }
    
    function print_anchor_image($url,$img,$att = '')
    {
	$format = '<a href="%s" %s > <img src="%s"> </a>';
	print_object(sprintf($format, $url,$att, base_url($img)));
    }

    function print_object($object)
    {
	print $object;
    }

    function styling($url) 
    {
	return '<link rel="stylesheet" type="text/css" href="'. base_url($url) .'"/>';
    }
    
    function base_url($url) 
    {
	return get_bloginfo('template_url').'/'.$url;
    }

    function blog_url($url) 
    {
	return get_bloginfo('url').'/'.$url;
    }