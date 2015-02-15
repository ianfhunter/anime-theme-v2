<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="post-page" style="margin-right: 40px;" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>
    <div class="entry-content">
    	<?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <?php edit_post_link( __( 'Edit', 'noel' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
</article>
<?php endwhile; ?>