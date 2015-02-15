<?php get_header(); noel_banner_primary(); ?>

<div id="container">
	<div id="content">
		
<?php 
	if ( have_posts() )
		the_post();
?>

<div class="entry-header">
</div>

<?php
	rewind_posts();
	get_template_part( 'loop', 'archive' );
?>
        
    </div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>