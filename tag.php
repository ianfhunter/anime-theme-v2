<?php get_header(); noel_banner_primary(); ?>
<div id="container">
	<div id="content">    
	<div class="entry-header">
		<h2 class="entry-title page-title"><?php printf( __( 'Tag Archives: %s', 'noel' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h2>
	</div>
<?php get_template_part( 'loop', 'tag' ); ?>      
    </div>
</div>
<?php get_footer(); ?>