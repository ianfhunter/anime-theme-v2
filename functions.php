<?php
function noel_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $counter;
	$counter++;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">        
        <div class="comment-info">
            <div class="commenter-gravatar"><?php echo get_avatar( $comment, 60 ); ?></div>
            <div class="commenter-name"><?php comment_author_link(); ?></div>
            <div class="clear"></div>          
        </div>        
        <div class="comment-body">
			<?php comment_text(); ?>
            <?php edit_comment_link( __( 'Edit', 'noel' ), ' ' ); ?>
        </div>        
		<div class="comment-meta commentmetadata">
            <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'noel' ), get_comment_date(),  get_comment_time() ); ?></a>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'noel' ); ?></em>
        <?php else : ?>
			<span class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</span>
		<?php endif; ?>
        <div class="clear"></div>
        </div>        
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'noel' ); ?> <?php comment_author_link(); ?></p><?php edit_comment_link( __( 'Edit', 'noel' ), ' ' ); ?>
	<?php
			break;
	endswitch;
}

if (function_exists('register_sidebar')) {
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'noel' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'noel' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title noel-lock">.:: ',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'noel' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'noel' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title noel-lock">.:: ',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'noel' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'noel' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title noel-lock">.:: ',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'noel' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'noel' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title noel-lock">.:: ',
		'after_title' => '</h3>',
	) );	
}

function new_excerpt_more( $more ) {
	return '<a href="'. get_permalink($post->ID) . '">...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

show_admin_bar(false);
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header',
		array(
			'random-default'=> false,
			'flex-width'    => true,
			'width'         => 1920,
			'height'        => 430,
			'header-text'	=> false,
			'default-image' => get_template_directory_uri() . '/images/banner-3.jpg',
		)
	);
register_default_headers( array(
	'banner-0' => array(
		'url' => '%s/images/banner-0.jpg',
		'thumbnail_url' => '%s/images/banner-0_thumb.jpg',
		'description' => __( 'Banner 0', 'noel' )
	),
	'banner-1' => array(
		'url' => '%s/images/banner-1.jpg',
		'thumbnail_url' => '%s/images/banner-1_thumb.jpg',
		'description' => __( 'Banner 1', 'noel' )
	),
	'banner-2' => array(
		'url' => '%s/images/banner-2.jpg',
		'thumbnail_url' => '%s/images/banner-2_thumb.jpg',
		'description' => __( 'Banner 2', 'noel' )
	),
	'banner-3' => array(
		'url' => '%s/images/banner-3.jpg',
		'thumbnail_url' => '%s/images/banner-3_thumb.jpg',
		'description' => __( 'Banner 3', 'noel' )
	)
) );

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'noel' ),
) );


function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');

if ( ! isset( $content_width ) )
	$content_width = 840;

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

function adminFooter() {
        echo '&copy; MIMIC-Project 2014';
}
add_filter('admin_footer_text', 'adminFooter');

function diw_disable_default_widgets() {
     if(function_exists('unregister_sidebar_widget')) {
          unregister_widget('WP_Widget_Calendar');
     }
}
add_action('widgets_init', 'diw_disable_default_widgets');

if ( ! function_exists( 'noel_credit' ) ) :
function noel_credit() {
	printf( __( '<div id="ex-note">Modified template originally by %2$s.</div>', 'noel' ),
		sprintf( '<a href="%1$s">%2$s</a>',
			'http://wordpress.org',
			'WordPress'
		),
		sprintf( '<a href="%1$s">%2$s</a>',
			'http://mimic-project.com',
			'MIMIC-Project'
		)
	);
}
endif;

add_filter('wp_nav_menu_items', 'add_credit_link', 10, 2);
function add_credit_link($items, $args) {
        $items .= '';
    return $items;
}

add_action('pre_get_posts', 'wp_ignore_sticky');
function wp_ignore_sticky($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('ignore_sticky_posts', true);
}

if ( ! function_exists( 'noel_post_info' ) ) :
function noel_post_info() {
	printf( __( 'Posted by %1$s on %2$s', 'noel' ),
		sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts written by %s', 'noel' ), get_the_author() ) ),
			get_the_author()
		),
		get_the_date()
	);
}
endif;

function noel_theme_menu() {
	add_theme_page( 'Noel Theme Options', 'Theme Options', 'administrator',	'noel_theme_options', 'noel_theme_display' );
}
add_action( 'admin_menu', 'noel_theme_menu' );

function noel_theme_display() {
?>
	<div class="wrap">
		<h2><?php _e( 'Noel Theme Options', 'noel' ); ?></h2>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'noel_theme_general_options' );
				do_settings_sections( 'noel_theme_general_options' );
				submit_button();
			?>
		</form>
		<hr/>
		<h3><?php _e( 'News', 'noel' ); ?></h3>
		<ul style="list-style-type:disc;padding-left:20px;">
		<?php
		   require_once(ABSPATH . WPINC . '/rss.php');
				
		   $resp = _fetch_remote_file('http://mimic-project.com/feed/');
		   if ( is_success( $resp->status ) ) {
			  $rss =  _response_to_rss( $resp );			
			  $blog_posts = array_slice($rss->items, 0, 4);
			  
			  $posts_arr = array();
			  foreach ($blog_posts as $item) {
				 echo '<li><a href="'.$item['link'].'" style="font-size:120%;">'.$item['title'].'</a><br>'.$item['description'].'</li>';
			  }
		   } 
		   print('</ul>');
		?>
	</div>
<?php
}

function noel_theme_default_general_options() {
	$defaults = array(
		'noel_social_facebook'		=>	'',
		'noel_social_twitter'		=>	'',
		'noel_social_googleplus'	=>	'',
		'noel_rss'					=>	'',
		'noel_google_analytics'		=>	'',
		'noel_banner'				=>	'',
	);
	return apply_filters( 'noel_theme_default_general_options', $defaults );
}

function noel_initialize_theme_options() {
	if( false == get_option( 'noel_theme_general_options' ) ) {	
		add_option( 'noel_theme_general_options', apply_filters( 'noel_theme_default_general_options', noel_theme_default_general_options() ) );
	}
	add_settings_section( 'general_settings_section', __( 'General Settings', 'noel' ),	'noel_general_options_callback', 'noel_theme_general_options' );
	add_settings_field(	'noel_social_facebook', 'Facebook', 'noel_social_facebook_callback', 'noel_theme_general_options', 'general_settings_section', array( __( 'Put a link to your Facebook page. Leave it empty to disable the icon link.', 'noel' ) ) );
	add_settings_field(	'noel_social_twitter', 'Twitter', 'noel_social_twitter_callback', 'noel_theme_general_options', 'general_settings_section', array( __( 'Put a link to your Twitter page. Leave it empty to disable the icon link.', 'noel' ) ) );
	add_settings_field( 'noel_social_googleplus', 'Google+', 'noel_social_googleplus_callback',	'noel_theme_general_options', 'general_settings_section', array( __( 'Put a link to your Google+ page. Leave it empty to disable the icon link.', 'noel' ) ) );
	add_settings_field( 'noel_rss', 'RSS', 'noel_rss_callback', 'noel_theme_general_options', 'general_settings_section', array( __( 'Activate this setting to display RSS icon link.', 'noel' ) ) );
	add_settings_field( 'noel_google_analytics', 'Google Analytics', 'noel_google_analytics_callback', 'noel_theme_general_options', 'general_settings_section', array( __( 'Put your Google Analytics tracker code here. Leave it empty to disable Google Analytics.', 'noel' ) ) );
	add_settings_field( 'noel_banner', 'Noel Banner', 'noel_banner_callback', 'noel_theme_general_options', 'general_settings_section', array( __( 'Check this option to disable the theme\'s pre-installed banner ads.', 'noel' ) ) );
	
	register_setting( 'noel_theme_general_options', 'noel_theme_general_options', 'noel_theme_validate_general_options' );
}
add_action( 'admin_init', 'noel_initialize_theme_options' );

function noel_general_options_callback() {
	echo '';
}
function noel_social_facebook_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	$url = '';
	if( isset( $options['noel_social_facebook'] ) ) { $url = esc_url( $options['noel_social_facebook'] ); }
	echo '<input type="text" id="noel_social_facebook" class="regular-text code" name="noel_theme_general_options[noel_social_facebook]" value="' . $url . '" /><p class="description">'  . $args[0] . '</p>';
}
function noel_social_twitter_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	$url = '';
	if( isset( $options['noel_social_twitter'] ) ) { $url = esc_url( $options['noel_social_twitter'] ); }
	echo '<input type="text" id="noel_social_twitter" class="regular-text code" name="noel_theme_general_options[noel_social_twitter]" value="' . $url . '" /><p class="description">'  . $args[0] . '</p>';
}
function noel_social_googleplus_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	$url = '';
	if( isset( $options['noel_social_googleplus'] ) ) {	$url = esc_url( $options['noel_social_googleplus'] ); }
	echo '<input type="text" id="noel_social_googleplus" class="regular-text code" name="noel_theme_general_options[noel_social_googleplus]" value="' . $url . '" /><p class="description">'  . $args[0] . '</p>';
}
function noel_rss_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	$html = '<input type="checkbox" id="noel_rss" name="noel_theme_general_options[noel_rss]" value="1" ' . checked( 1, isset( $options['noel_rss'] ) ? $options['noel_rss'] : 0, false ) . '/>';
	$html .= '<label for="noel_rss">&nbsp;'  . $args[0] . '</label>';
	echo $html;
}
function noel_google_analytics_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	echo '<input type="text" id="noel_google_analytics" name="noel_theme_general_options[noel_google_analytics]" value="' . $options['noel_google_analytics'] . '" /><p class="description">'  . $args[0] . '</p>';
}
function noel_banner_callback($args) {
	$options = get_option( 'noel_theme_general_options' );
	$html = '<input type="checkbox" id="noel_banner" name="noel_theme_general_options[noel_banner]" value="1" ' . checked( 1, isset( $options['noel_banner'] ) ? $options['noel_banner'] : 0, false ) . '/>';
	$html .= '<label for="noel_banner">&nbsp;'  . $args[0] . '</label>';
	echo $html;
}
function noel_theme_validate_general_options( $input ) {
	$output = array();
	foreach( $input as $key => $value ) {
		if( isset( $input[$key] ) ) {
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
		}
	}
	return apply_filters( 'noel_theme_validate_noel_settings', $output, $input );
}

$noel_options = get_option( 'noel_theme_general_options' );
$homelinkoutput = str_replace( array( 'http://', 'https://', 'www.' ), '', home_url() );

function noel_facebook() {
	global $noel_options;
	if ( $noel_options['noel_social_facebook'] ) {
		echo $noel_options['noel_social_facebook'] ? '<a class="noel_social_facebook social-link" href="' . esc_url( $noel_options['noel_social_facebook'] ) . '" target="blank"><img id="site-link-f" src="' . get_template_directory_uri() . '/images/icon02.png" alt="facebook" /></a>' : '';
	}
}
function noel_twitter() {
	global $noel_options;
	if ( $noel_options['noel_social_twitter'] ) {
		echo $noel_options['noel_social_twitter'] ? '<a class="noel_social_twitter social-link" href="' . esc_url( $noel_options['noel_social_twitter'] ) . '" target="blank"><img id="site-link-t" src="' . get_template_directory_uri() . '/images/icon03.png" alt="twitter" /></a>' : '';
	}
}
function noel_googleplus() {
	global $noel_options;
	if ( $noel_options['noel_social_googleplus'] ) {
		echo $noel_options['noel_social_googleplus'] ? '<a class="noel_social_googleplus social-link" href="' . esc_url( $noel_options['noel_social_googleplus'] ) . '" target="blank"><img id="site-link-g" src="' . get_template_directory_uri() . '/images/icon05.png" alt="googleplus" /></a>' : '';
	}
}
function noel_rss() {
	global $noel_options;
	if( isset( $noel_options['noel_rss'] ) && $noel_options[ 'noel_rss' ] ) {
		echo '<a class="social-link" href="' . home_url() . '/feed" target="_blank"><img id="site-link-r" src="' . get_template_directory_uri() . '/images/icon04.png" alt="rss" /></a>';
	}
}
function google_analytics_tracking_code(){
	global $noel_options;
	global $homelinkoutput;
	if ( $noel_options['noel_google_analytics'] ) { ?>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', '<?php echo $noel_options['noel_google_analytics'] ?>', '<?php echo $homelinkoutput ?>');
	ga('send', 'pageview');
</script>
<?php }
}
add_action('wp_footer', 'google_analytics_tracking_code');
function noel_banner_primary() {
global $noel_options;
	if( isset( $noel_options['noel_banner'] ) && $noel_options[ 'noel_banner' ] ) {}
	else {
		echo '<div id="advert"><div id="ad1" class="pad1"><a target="_blank" title="" href="http://code.ianhunter.ie"><img alt="" src="' . get_site_url() . '/wp-content/uploads/2014/04/bulb.png"></a></div><div id="ad1" class="pad1"><a target="_blank" title="" href="http://ianhunter.ie"><img alt="" src="' . get_site_url() . '/wp-content/uploads/2014/04/kaiki.png"></a></div><div id="ad1" class="pad1"><a target="_blank" title="" href="http://github.com/ianfhunter/"><img alt="" src="' . get_site_url() . '/wp-content/uploads/2014/04/kyoko.png"></a></div><div class="clear"></div></div>';
	}
}
function noel_banner_secondary() {
	global $noel_options;
}