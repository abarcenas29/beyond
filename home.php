<?php get_header(); ?>
<article id="home-main" class="wrapper">
    <!-- Home Content -->
    <article id="home-container" class="display-table-content">
    <section id="home-content" class="table-child padding">
	
	<!-- Post Loop -->
	<article id="home-posts" class="table wrapper">
	<section id="home-loop" class="table-child">
		
	<div id="home-post-header" class="wrapper">
	
	<!-- Header Post -->
	<?php 
	    $header_post = home_header();
	    if($header_post->found_posts > 0):
		while($header_post->have_posts()):
		$header_post->the_post();
	?>
	<div class="header-post">
		<img src="<?php print catch_that_image(); ?>" 
		 class="header-post-image">
	    <div class="header-info-wrapper">
	    <div class="header-info-content">
	    </div>
	    <div class="header-info-text">
		<h2>
			<?php print_anchor(get_permalink(), get_the_title()) ?>
		</h2>
		<p>By:<span><?php print get_the_author() ?></span></p>
		<p class="header-post-excerpt" style="display:none;"><?php print get_the_excerpt(); ?></p>
	    </div>
	    </div>
	</div>
	<?php 
		endwhile;
	    endif;
	?>
	
	<!-- The Rest of The Loop Content -->
	<div id="home-more-content" class="wrapper">
	<h3 class="content-title">More Posts</h3>
	<?php 
	    $home_posts = home_loop();
	    if($home_posts->found_posts > 0):
		while($home_posts->have_posts()):
		$home_posts->the_post();
	?>
	<div class="home-posts display-table padding wrapper">
	    <a href="<?php print_object(get_permalink()) ?>">
	<div class="home-thumb table-child">
		<img src="<?php print catch_that_image(true); ?>">
	</div>
	<div class="home-post-content table-child">
	    <h4><?php print_object(get_the_title()); ?></h4>
	    <p><?php print_object(get_the_excerpt()) ?></p>
	    <p class="sub-text">
		Posted On: <?php print_object(get_the_time('Y-m-d')); ?> Filed Under: Blah Blah
	    </p>
	</div>
	</a>
	</div>
	<?php
		endwhile;
	    endif;
	?>
	</div>
	
	</div>
	
	    
	</section>
	</article>
    
    </section>
    <!-- Aside Content -->
    <aside id="home-sidebar" class="table-child padding">
	<ul id="aside-sidebar">
	<?php dynamic_sidebar('aside-sidebar'); ?>
	</ul>
    </aside>
    </article>
</article>
<script>
$(window).load(
function()
{
    //get the height of the image to proportionate the post container
    $('.header-post').each(function(i)
    {
	var getHeight = $('.header-post-image').eq(i).height();
	var getWidth = $('.header-post-image').eq(i).width();
	$(this).css('height', getHeight+'px').css('width',getWidth+'px');
	if(getHeight > 500)
	{
		$('.header-post-excerpt').show();
	}
    });
    
}
);
</script>
<?php get_footer(); ?>