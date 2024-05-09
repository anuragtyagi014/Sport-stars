        <!-- Footer -->
		<!-- footer class="container footer">
            <!--?php
                dynamic_sidebar('footer');
            ?-->
		<!-- /footer -->

		<!-- Copyright footer -->
		<div class="container copyright footer">
			<div style="float: none; clear: both;">&nbsp;</div>
			<div class="center">
				<ul style="margin: auto;">
					<?php plsh_language_selector_flags(); ?>
					<?php
					wp_nav_menu( array(
						'menu'              => 'footer-menu',
						'theme_location'    => 'footer-menu',
						'depth'             => 1,
						'container'         => false,
						'container_class'   => '',
						'container_id'      => '',
						'menu_class'        => '',
						'items_wrap'        => '%3$s',
						'fallback_cb'       => false
					));
					?>
				</ul>
			</div>
			<div style="float: none; clear: both;">&nbsp;</div>
			<div class="center">
					<?php
					if(plsh_gs('show_footer_social') == 'on') {

						if(plsh_gs('social_facebook') != '')
						{
							echo '<a title="facebook" href="' . plsh_gs('social_facebook') . '" target="_blank"><i class="fa fa-facebook-square"></i></a>';
						}
						if(plsh_gs('social_twitter') != '')
						{
							echo '<a title="twitter" href="' . plsh_gs('social_twitter') . '" target="_blank"><i class="fa fa-twitter-square"></i></a>';
						}
						if(plsh_gs('social_instagram') != '')
						{
							echo '<a title="instagram" href="' . plsh_gs('social_instagram') . '" target="_blank"><i class="fa fa-instagram"></i></a> ';
						}
						if(plsh_gs('social_rss') != '')
						{
							echo '<a title="rss" href="' . plsh_gs('social_rss') . '" target="_blank"><i class="fa fa-rss-square"></i></a>';
						}
						if(plsh_gs('social_youtube') != '')
						{
							echo '<a href="' . plsh_gs('social_youtube') . '" target="_blank"><i class="fa fa-youtube-square"></i></a>';
						}
						if(plsh_gs('social_pinterest') != '')
						{
							echo '<a href="' . plsh_gs('social_pinterest') . '" target="_blank"><i class="fa fa-pinterest-square"></i></a>';
						}
						if(plsh_gs('social_gplus') != '')
						{
							echo '<a href="' . plsh_gs('social_gplus') . '" target="_blank"><i class="fa fa-google-plus-square"></i></a>';
						}
						if(plsh_gs('social_linkedin') != '')
						{
							echo '<a href="' . plsh_gs('social_linkedin') . '" target="_blank"><i class="fa fa-linkedin-square"></i></a> ';
						}
					}
					?>
			</div>
			<div class="center">
				<img src="/wp-content/uploads/2016/07/sportstars_logo-1.png" alt="SportStars" style="width:150px;">
			</div>
			<div class="center">
				<?php echo get_wpml_admin_text_string('copyright'); ?>
			</div>
		</div>
		
		<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
        
        <?php wp_footer();?>
	<!-- END body -->
<script type="text/javascript">
var infolinks_pid = 3402573;
var infolinks_wsid = 1;

jQuery(document).ready(function(){
setTimeout(function(){

     //var tag_new = jQuery("template").eq(38).attr("id");
     var tag_new = jQuery("template").last().attr("id");
     console.log(tag_new);

     //alert(tag_new);
     jQuery("#" + tag_new).css("display", "none");
     jQuery("#" + tag_new).next().next().css("display", "none");
}, 100);
});

</script>

<!--script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script-->
	</body>
<!-- END html -->
</html>