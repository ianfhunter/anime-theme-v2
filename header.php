<!DOCTYPE html>
<HTML <?php language_attributes(); ?>>
<HEAD>
<link rel="icon" 
      type="image/png" 
      href="http://weeab.eu/wp-content/uploads/2014/09/favicon.ico">
<meta name="description" content="Weeabeu is a gem of anime tech and opinion articles. Written by a Software Engineer and Self-proclaimed otaku." />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php
	global $page, $paged;
	wp_title( '&raquo;', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &raquo; $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' &raquo; ' . sprintf( 'Page %s', max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
wp_head();
?>

<!--Title Font-->
<link href="//fonts.googleapis.com/css?family=Alex%20Brush&amp;subset=latin" rel="stylesheet" type="text/css">
<!--Main Font-->
<link href="//fonts.googleapis.com/css?family=Open%20Sans&amp;subset=latin" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Adamina&amp;subset=latin" rel="stylesheet" type="text/css">
<style>
#title-name, #title-description {
 font-family: 'Alex Brush', sans-serif;
}
p {
 font-family: 'Open Sans', sans-serif;
}
.entry-title {
 font-family: 'Adamina', sans-serif;
}
</style>

</HEAD>

<BODY <?php body_class(); ?>>
<a href="http://weeab.eu" id="banners-main" >
	<img src="/wp-content/uploads/2015/08/cropped-cover3.png" alt="Weeabeu Banner" />
    <!-- <img src="<?php header_image(); ?>" /> -->
</a>
<div id="head_button_container">
	<div class="head_button"> <a href="/?cat=18" >Anime</a> </div>
	<div class="head_button"><a href="/?cat=47" >Personal</a></div>
	<div class="head_button"> <a href="/tag/review/">Reviews</a></div>
	<div class="head_button"> <a href="/?cat=27" >Tech</a></div>
	<div class="head_button all_button"> <a href="/" >All</a> </div>
</div>   

<section id="wrapper">
<section id="wrapper-inner">

<div id="main">
