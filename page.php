<?php get_header(); ?>
<?php the_post();   ?>
<article id="home-main" class="wrapper">
    <!-- Home Content -->
    <article id="home-container" class="display-table-content">
    <section id="home-content" class="table-child padding">
	<!-- Start of Single Loop -->
	<article id="single-post">
	<header>
	    <ul>
		<?php foreach (single_breadcrumb(get_the_ID()) as $cat): ?>
		<li><?php print_anchor($cat['cat-url'], $cat['name']); ?></li>
		<?php endforeach; ?>
	    </ul>
	</header>
	<section id="single-header">
	    <h2><?php print_object(get_the_title()) ?></h2>
	</section>
	<section id="single-content">
	    <?php the_content(); ?>
	</section>
	<footer id="single-footer">
		
	</footer>
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
<?php get_footer(); ?>