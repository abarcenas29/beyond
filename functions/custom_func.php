<?php	
	register_sidebar(array(
		'id'			=> 'aside-sidebar',
		'description'	=> 'Place All Widgets For Theme',
		'class'			=> '',
		'before_widget' => '<li class="aside-widget padding">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h3 class="aside-widget-title">',
		'after_title'	=> '</h3>'
	));
	register_nav_menu('header-nav', 'Header Main Nav Menu');
	register_nav_menu('footer-nav', 'Footer Navigation');
	register_nav_menu('site-features', 'Site Features Menu');
	register_nav_menu('squire-menu', 'external links');
	
	function return_menu()
	{
		$arg = array(
			'theme_location'	=> 'header-nav',
			'container'			=> false,
			'container_id'		=> 'main-nav-items',
		);
		
		wp_nav_menu($arg);
	}
	
	function return_footer_menu($location)
	{
		$arg = array(
			'theme_location'	=> $location,
		);
		
		wp_nav_menu($arg);
	}
?>