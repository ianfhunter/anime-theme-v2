<?php get_header(); ?>

<div id="container">
	<div id="content">
		
			<article id="post-0" class="post error404 not-found">
				<div class="entry-header">
					<h1 class="entry-title"><?php _e( 'Not Found', 'noel' ); ?></h1>
				</div>				
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'noel' ); ?></p>
					<?php get_search_form(); ?>
					<img style="display:block;margin:20px auto;" src="<?php bloginfo('template_url') ?>/images/404.gif">
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
        
    </div><!-- #content -->
</div><!-- #container -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>
