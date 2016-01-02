<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'noel' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'noel' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('main-loop pad1'); ?>>
    <a class="main-thumbnail-link" href="<?php the_permalink(); ?>">    
	<div class="overlay" > <?php the_title(); ?> </div>
    </a>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			$image = $image[0]; ?>
		<?php else :
			$image = get_stylesheet_directory_uri() . '/images/no-image.png'; ?>
		<?php endif; ?>
		<div class="post-featured-bg" style="background-image: url('<?php echo $image; ?>')">
			<div class="upper-left">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-date"><?php the_time('D m/d'); ?></div>

			</div>
			<div class="upper-right">
				<div class="entry-comments"><?php comments_number(); ?></div>
			</div>    
			<div class="loop-lower">
				<div><?php echo get_excerpt(180); ?></div>    	
			</div>

		</div>
	

</article>

<?php endwhile; ?>

<div class="clear"></div>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="page-nav" class="navigation">
		<div class="nav-older"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&raquo;</span>', 'noel' ) ); ?></div>
		<div class="nav-newer"><?php previous_posts_link( __( '<span class="meta-nav">&laquo;</span> Newer posts', 'noel' ) ); ?></div>
		<div class="clear"></div>
	</nav>
<?php endif; ?>
