<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="post-page">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  >
	    <div class="entry-header">
		    <h1 class="entry-title"><?php the_title(); ?></h1>
		    <div class="entry-meta">
			    <?php noel_post_info(); ?>
		    </div>
	    </div>
        <div class="entry-content">
        	<?php the_content(); ?>
            <?php wp_link_pages('before=<p class="linkpage">Pages: &after=</p>&next_or_number=number&pagelink= %'); ?>
            <?php edit_post_link( 'Edit', '<div class="edit-link">', '</div>' ); ?>
        </div>
        <div class="entry-utility">
        	<span><?php _e( 'Labels:', 'noel' ); ?></span>
        	<?php the_category(' '); ?>
		    <?php the_tags('',' ',''); ?>
            <div class="clear"></div>
        </div>
    </article>
    <?php noel_banner_secondary(); comments_template( '', true ); ?>
</div>

<?php endwhile; ?>
