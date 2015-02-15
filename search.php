<?php get_header(); ?>
<div id="container">
	<div id="content">
<?php if ( have_posts() ) : ?>
				<div class="entry-header">
					<h1 class="entry-title page-title"><?php printf( __( 'Search Results for: %s', 'noel' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
				<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h1 class="entry-title page-title"><?php _e( 'Nothing Found', 'noel' ); ?></h1>
					</div>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'noel' ); ?></p>
						<img style="display:block;margin:20px auto;" src="<?php get_template_directory_uri() ?>/images/404.jpg" />
					</div>
				</div>
<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>