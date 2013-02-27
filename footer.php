<footer id="main-footer" class="wrapper">
    <article id="main-footer-container" class="display-table-content">
    <section id="main-footer-content" class="table-child">
    
    <article id="main-footer-top">
	<h2>Beyond Objective</h2>
	<?php return_footer_menu('footer-nav'); ?>
    </article>
    <article id="main-footer-bottom">
	
	<article id="main-brands" class="display-table">
	
	<section id="site-features" class="table-child footer-menus">
	    <h3>Site Features</h3>
	    <?php return_footer_menu('site-features'); ?>
	</section>
	    
	<section id="squir-features" class="table-child footer-menus">
	    <h3>Created Projects</h3>
	    <?php return_footer_menu('squire-menu'); ?>
	</section>
	    
	<section id="social-features" class="table-child footer-menus">
	    <h3>Social Features</h3>
	    <ul>
		<li><?php print_anchor_image('#', 'source/images/github.png') ?></li>
		<li><?php print_anchor_image('#', 'source/images/facebook.png') ?></li>
		<li><?php print_anchor_image('#', 'source/images/twitter.png') ?></li>
		<li><?php print_anchor_image('#', 'source/images/google-plus.png') ?></li>
		<li><?php print_anchor_image('#', 'source/images/youtube.png') ?></li>
	    </ul>
	</section>
	    
	</article>
    </article>
	
    <article id="main-footer-trademark">
	<p>Copyright © <?php print date('Y'); ?></p>
    </article>
	
    </section>
    </article>
</footer>
<script>
//overall theme functions
$(document).ready(function(){
	var subMenus	= $('.sub-menu');
	var items		= $('.menu-item');
	
	subMenus.hide();
	
	items.hover(
	function()
	{
		var getObjectId		= $(this).attr('id');
		var getPosId		= $(this).position();
		var getSubMenu		= $('#'+ getObjectId + ' ' + 'ul.sub-menu');
		getSubMenu.css('left',getPosId.left + 'px')
				.css('top',getPosId.top + 34 +'px').slideDown(100);
		
	},
	function()
	{
		var getObjectId = $(this).attr('id');
		$('#' + getObjectId + ' ' + '.sub-menu').hide(100);
	});
});
</script>
<!-- footer hooks goes here -->
<?php wp_footer() ?>

</body>
</html>