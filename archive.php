<?php get_header(); noel_banner_primary(); ?>

<div id="container">
	<div id="content">
		
<?php 
	if ( have_posts() )
		the_post();
?>

<div class="entry-header">
	<h2 class="entry-title page-title">
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: <span>%s</span>', 'noel' ), get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: <span>%s</span>', 'noel' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'noel' ) ) ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: <span>%s</span>', 'noel' ), get_the_date( _x( 'Y', 'yearly archives date format', 'noel' ) ) ); ?>
		<?php else : ?>
			<?php _e( 'Blog Archives', 'noel' ); ?>
		<?php endif; ?>
	</h2>
</div>


<?php
	rewind_posts();
	get_template_part( 'loop', 'archive' );
?>
        
    </div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>