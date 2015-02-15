<?php get_header(); noel_banner_primary(); ?>

<div id="container">
	<div id="content">
	
    <div class="entry-header">
	<h2 class="entry-title page-title"><?php printf( __( 'Category Archives: %s', 'noel' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
	</div>
	<?php
		$category_description = category_description();
		if ( ! empty( $category_description ) )
			echo '<div class="archive-meta">' . $category_description . '</div>';
	get_template_part( 'loop', 'category' );
	?>
      
    </div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>