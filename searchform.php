	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Type keyword', 'noel' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="" />
		<div class="clear"></div>
	</form>
