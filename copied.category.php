<?php get_header(); ?>
<div id="main">
<?php 

// get the current taxonomy term
$term = get_queried_object();

$image = get_field('logo_file', $term);
$logoLink = get_field('logo_link', $term);

?>

<!-- jith added -->
<div class="container homepage-content hfeed">
    <div class="main-content-column-1 full-width">
<!-- jith added -->

	<h1 class="headline archive-header">
		<?php single_cat_title(); ?>
        <?php if( $image ) { ?>
        	<div class="ss_category_logo">
            	<?php if ( $logoLink ) { ?>
                	<a href="<?php echo $logoLink; ?>" target="blank">
                <?php } ?>
            	<img src="<?php echo $image['url']; ?>">
                <?php if ($logoLink) { ?>
                	</a>
                <?php } ?>
            </div>
        <?php } ?>
    </h1>
	<div id="archive-area">
    	<?php 
			$cat = get_query_var('cat');
			$yourcat = get_category ($cat);
			$cat_id = $yourcat->term_id;
		
		?>
		<?php $mvp_featured_cat = get_option('gd_featured_slider_cat'); if ($mvp_featured_cat == "true") { ?>
		<?php if ( $paged < 2 ) : ?>
		<div id="featured-cat">
			<div class="flexslider">
				<ul class="slides">
					<?php //$current_category = single_cat_title("", false); $category_id = get_cat_ID($current_category); $cat_posts = new WP_Query('showposts=2&cat='.$category_id); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; ?>
                    <?php $cat_posts = new WP_Query('showposts=2&cat='.$cat_id); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('slider-thumb'); ?>
                        </a>
						<div class="featured-text-cat">
							<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
							<h2 class="slider-headline-cat"><a href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID, "mvp_featured_headline", true); ?></a></h2>
							<?php else: ?>
							<h2 class="slider-headline-cat"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php endif; ?>
							<p><?php echo excerpt(22); ?></p>
						</div><!--featured-text-cat-->
					</li>
					<?php endwhile; ?>
				</ul>
			</div><!--flexslider-->
		</div><!--featured-cat-->
		<?php endif; ?>
        <?php if ($cat_id == 15){
			$page_object = get_page( 531 );
			echo do_shortcode($page_object->post_content);
		} ?>
		<div id="cat-blog-wrapper">
			<ul>

				<?php $current_category = single_cat_title("", false); $category_id = get_cat_ID($current_category); $cat_posts = new WP_Query('showposts=2&cat='.$category_id); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; ?>
				<?php endwhile; ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); if (in_array($post->ID, $do_not_duplicate)) continue; ?>
				<li class="cat-blog-container">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div class="widget-img">
                    <?php $ss_thumb = get_post_thumbnail_id();
						//echo $ss_thumb;
					?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('large-thumb'); ?>
                        </a>
					</div><!--widget-img-->
					<?php } ?>
					<div class="cat-blog-inner">
						<h3 class="home-title1"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<p><?php echo excerpt(18); ?></p>
					</div><!--cat-blog-inner-->
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div><!--cat-blog-wrapper-->
		<?php } else { ?>
		<div id="cat-blog-wrapper">
			<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li class="cat-blog-container">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div class="widget-img">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('large-thumb'); ?></a>
					</div><!--widget-img-->
					<?php } ?>
					<div class="cat-blog-inner">
						<h3 class="home-title1"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<p><?php echo excerpt(18); ?></p>
					</div><!--cat-blog-inner-->
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div><!--cat-blog-wrapper-->
		<?php } ?>
		<div class="nav-links">
			<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
		</div><!--nav-links-->
	</div><!--archive-area-->

		<!-- jith added -->
		</div>
	</div>
<!-- jith added -->
		
	<?php get_sidebar(); ?>
</div><!--main -->

	
<?php //echo do_shortcode('[bsa_pro_ad_space id=12]'); ?>
<?php get_footer(); ?>