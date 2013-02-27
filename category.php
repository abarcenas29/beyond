<?php get_header(); ?>
<article id="category-main" class="wrapper">
	<section id="category-container" class="display-table-content">
	<article id="category-content" class="table-child padding">
	<header id="category-title">
		<h2>Category: <?php single_cat_title(); ?></h2>
	</header>
	<section id="category-loop">
	<article id="category-loop-container" class="display-table">
	<?php while(have_posts()): the_post(); ?>
	
	<section class="category-post" class="table-row">
	<div class="table-child padding">
		<img src="<?php print catch_that_image(true); ?>" />
	</div>
	<div class="table-child padding">
		<h3><?php print_anchor(get_permalink() , get_the_title()); ?></h3>
		<?php the_excerpt(); ?>
		<p>By: <?php print get_the_author() ?> 
			Published On: <?php print get_the_time('Y-m-d') ?></p>
	</div>
	</section>
		
	<?php endwhile; ?>
	</article>
	</section>
		
	<footer id="category-pagination" class="wrapper display-table">
	<section class="table-child">
		<?php previous_posts_link('<< Previous',true); ?>
	</section>
	<section class="table-child">
		<?php next_posts_link('Next >>',true); ?>
	</section>
	</footer>
		
	</article>
		
	<aside id="home-sidebar" class="table-child padding">
	<ul id="aside-sidebar">
	<?php dynamic_sidebar('aside-sidebar'); ?>
	</ul>
    </aside>	
	
	</section>
</article>
<?php get_footer(); ?>