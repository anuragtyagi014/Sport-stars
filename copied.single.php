<?php get_header(); ?>

<div id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="breadcrumb">
		<?php echo dimox_breadcrumbs(); ?>
	</div><!--breadcrumb-->
	<h1 class="headline"><?php the_title(); ?></h1>
	<div id="post-info-wrapper">
		<ul class="post-info">
			<li><div class="post-author"><?php _e( 'By', 'mvp-text' ); ?> <?php the_author_posts_link(); ?></div></li>
			<?php $gd_socialbox = get_option('gd_socialbox'); if ($gd_socialbox == "true") { ?>
				<li>
					<ul class="post-social">
						<li>
							<div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
						</li>
						<li>
							<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>
						</li>
						<li>
							<g:plusone size="medium" annotation="bubble" width="120"></g:plusone>
						</li>
						<li>
						<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
						</li>
                        <li>
                       
                          <!-- Your share button code -->
                          <div class="fb-share-button" 
                            data-href="<?php echo get_permalink($post->ID); ?>" 
                            data-layout="button" data-size="small" data-mobile-iframe="true">
                          </div>
						</li>
					</ul>
				</li>
			<?php } ?>
			<li><div class="post-update"><?php _e( 'Updated', 'mvp-text' ); ?>: <?php the_time(get_option('date_format')); ?></div></li>
		</ul>
	</div><!--post-info-wrapper-->
	<div id="post-area" <?php post_class(); ?>>
		<?php $gd_featured_img = get_option('gd_featured_img'); if ($gd_featured_img == "true") { ?>
			<?php if(get_post_meta($post->ID, "mvp_video_embed", true)): ?>
				<?php echo get_post_meta($post->ID, "mvp_video_embed", true); ?>
			<?php else: ?>
				<?php $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_show_hide == "hide") { ?>
				<?php } else { ?>
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<div class="post-image">
						<?php the_post_thumbnail('post-thumb'); ?>
						<?php if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
							<span class="photo-credit"><?php echo get_post_meta($post->ID, "mvp_photo_credit", true); ?></span>
						<?php endif; ?>
					</div><!--post-image-->
					<?php } ?>
				<?php } ?>
			<?php endif; ?>
		<?php } ?>
		<div id="content-area">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
			<?php if(get_option('gd_article_ad')) { ?>
				<div id="article-ad">
					<?php $articlead = get_option('gd_article_ad'); if ($articlead) { echo stripslashes($articlead); } ?>
				</div><!--article-ad-->
			<?php } ?>
			<div class="post-tags">
				<?php the_tags('','','') ?>
			</div><!--post-tags-->
			<?php if( 'scoreboard' == get_post_type() ) { ?>
			<?php } else { ?>
			<?php $gd_prev_next = get_option('gd_prev_next'); if ($gd_prev_next == "true") { ?>
			<div class="prev-next-wrapper">
				<div class="prev-post">
					<?php previous_post_link('&larr; '.__('Previous Story', 'mvp-text').' %link', '%title', TRUE); ?>
				</div><!--prev-post-->
				<div class="next-post">
					<?php next_post_link(''.__('Next Story', 'mvp-text').' &rarr; %link', '%title', TRUE); ?>
				</div><!--next-post-->
			</div><!--prev-next-wrapper-->
			<?php } ?>
			<?php } ?>
		</div><!--content-area-->
		<?php getRelatedPosts(); ?>
			
		<?php comments_template(); ?>
		<?php endwhile; endif; ?>	
	</div><!--post-area-->
	<?php $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ($mvp_post_temp == "fullwidth") { ?>
	<?php } else { ?>
	<?php get_sidebar(); ?>
	<?php } ?>

</div><!--main -->


<?php get_footer(); ?>