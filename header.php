<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title><?php print get_bloginfo('name'); ?></title>
	
	<!-- 
	    Microsoft Metro Tile Image
 
	    Will get into this later.
	-->
	<meta name="application-name" content="Deremoe"/> 
	<meta name="msapplication-TileColor" content="#910000"/> 
	<meta name="msapplication-TileImage" content="bb486ca0-ecb0-44e8-bbe3-873fbb7aecea.png"/>

	<?php 
	    print_object(styling('source/css/style.css'));
	?>
	
	<!-- Script function that are generated by plugins or wordpress start here -->
	<?php wp_head(); ?>
</head>
<body>
<!-- Main Header Tag -->
<header id="main-header" class="wrapper">
    <section id="main-header-container" class="display-table-content">
    <article id="main-header-content">
    <section id="main-header-title" class="table-child">
		<h1><?php print_anchor(blog_url(''), 'Beyond Objective') ?></h1>
    </section>
    <aside id="main-header-side" class="table-child">
	
	<?php get_search_form(); ?>
	
	<!--
	<input type="search" 
	       name="main-header-search" 
	       id="main-header-search"
	       placeholder="Search Posts"/>
    -->
	</aside>
    </article>
    </section>
</header>

<!-- Main Navigation Tag -->
<nav id="main-nav" class="wrapper">
    <section id="main-nav" class="display-table-content">
    <article id="main-nav-content" class="table-child">
    <section id="main-nav-menu">

	<?php return_menu(); ?>
	
    </section>
    </article>
    </section>
</nav>
    