</div><!-- #main -->
</section><!-- #wrapper-inner -->
</section><!-- #wrapper -->

<footer id="footer">
	<div id="footer-widget">
	
	<?php
		if (   ! is_active_sidebar( 'first-footer-widget-area'  )
			&& ! is_active_sidebar( 'second-footer-widget-area' )
			&& ! is_active_sidebar( 'third-footer-widget-area'  )
			&& ! is_active_sidebar( 'fourth-footer-widget-area' )
		) :
	?>

	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
	<?php endif; ?>	
	<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<div id="second" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</ul>
				</div><!-- #second .widget-area -->
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<div id="third" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
					</ul>

				</div><!-- #third .widget-area -->
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
				<div id="fourth" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
					</ul>
				</div><!-- #fourth .widget-area -->
	<?php endif; ?>
			
	</div><!-- #footer-widget -->
	<?php noel_credit(); ?>
</footer><!-- #footer -->

<?php wp_footer(); ?>

<script type="text/javascript">
function _pcm(u){setTimeout(function(){
 var d=document, p="//desv383oqqc0.cloudfront.net/",
 s=d.createElement("script");s.type="text/javascript";s.async=true;s.src=p+u+".js";
 var e=d.getElementsByTagName("script")[0];e.parentNode.insertBefore(s,e);
 },1);}_pcm("53998eda565ce10200003d32");
</script>
</body>
</HTML>
