<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<button type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' )?>" >
		<img src="<?php print_object(base_url('source/images/search.png')) ?>"/>
	</button>
	
	<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
</form>
