<?php

   /* *********************************** This template is not being used ********************************* */
?>

<?php get_header(); ?>
<!-- jith added -->
<div class="container homepage-content hfeed">
    <div class="main-content-column-1 full-width">
<!-- jith added -->
		
<div id="main" class="full">
	<div class="camps_cta">
    	<div class="camps_cta_intro test">
        	<h3><em>Want to add your camp to this list?..................</em></h3>
            <div class="camps_cta_btn"><a class="more_coaches" href="<?php echo home_url(); ?>/camps-registration/">Register Your Camp</a></div>
        </div>
        <div class="camps_clear"></div>
    </div>
	<div class="camps_search">
    	<form method="post" action="<?php echo the_permalink(); ?>">
            <div class="field">
            	Sport: 
            	<select name="sportname" class="form-select" id="sportname">
                	<option value="All" selected="selected">&lt;Any&gt;</option>
                    <option value="football">Football</option>
                    <option value="basketball">Basketball</option>
                    <option value="baseball">Baseball/Softball</option>
                    <option value="soccer">Soccer</option>
                    <option value="volleyball">Volleyball</option>
                    <option value="biking">Biking</option>
                    <option value="cross-country">Cross Country</option>
                    <option value="golf">Golf</option>
                    <option value="lacrosse">Lacrosse</option>
                    <option value="martial-arts">Martial Arts</option>
                    <option value="multi-sport">Multi-Sport</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="rugby">Rugby</option>
                    <option value="swimming">Swimming/Diving</option>
                    <option value="tennis">Tennis</option>
                    <option value="track">Track and Field</option>
                    <option value="water-polo">Water Polo</option>
                    <option value="wrestling">Wrestling</option>
                </select>
            </div>
            <div class="field">
            	Sort by: 
            	<select name="sortorder" class="form-select" id="sortorder">
                	<option value="title" selected="selected">Alphabetical</option>
                    <option value="date">Date</option>
                </select>
            </div>
            <div class="field">
            	<input type="submit" id="camps_submit" name="camps_submit" value="Filter Results">
            </div>
        </form>
    </div>
    <div class="camps_clear"></div>
    <div class="camps_results">
    	<?php 
			$sportname;
			if(isset($_POST['sportname']))
			{
				$sportname = strip_tags( trim( $_POST[ 'sportname' ] ) );
			}
			$orderby = strip_tags( trim( $_POST[ 'sortorder' ] ) );
			$order;
			$metakey;
			if ($orderby == 'title')  { $order = 'title'; $metakey = ''; }
			if ($orderby == 'date')  { $order = 'meta_value_num'; $metakey = 'camp_date'; }
			$paged = 1;
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
			if (!isset($_POST['sportname']))
			{
				$args = array (
					'post_type'              => array( 'camps' ),
					'nopaging'               => false,
					'paged'                  => $paged,
					'posts_per_page'         => '20',
					'order'                  => 'ASC',
					'orderby'				 => 'title',
					'paged' 				 => $paged
				);	
			}
			else if ($sportname == "All") {
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'camps' ),
					'nopaging'               => false,
					'paged'                  => $paged,
					'posts_per_page'         => '20',
					'order'                  => 'ASC',
					'meta_key'				 => $metakey,
					'orderby'                => $orderby,
					'paged' 				 => $paged
				);	
			} 
			else 
			{
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'camps' ),
					'nopaging'               => false,
					'paged'                  => $paged,
					'posts_per_page'         => '20',
					'order'                  => 'ASC',
					'meta_key'				 => $metakey,
					'orderby'                => $orderby,
					'paged' 				 => $paged,
					'meta_query'             => array(
						array(
							'key'       => 'sport',
							'value'     => $sportname,
						),
					),
				);
			}
			
			// The Query
			$query = new WP_Query( $args );
			
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$post_id = get_the_ID();
					
					?>
                    <div class="camp_result">
                    <?php 
						$image = get_field('camp_logo');
						$oldImageUrl = get_post_meta( $post_id, 'camp_logo', true );
						if ( FALSE === get_post_status( $oldImageUrl ) ) { 
							if( !empty($image) ): ?>
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" class="thumb_image alignleft"></a>
								<?php endif; 
							} else {
						 ?>
                         		<?php if( !empty($oldImageUrl) ) { ?>
                            	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url($oldImageUrl); ?>" alt="<?php the_title(); ?>" class="thumb_image alignleft"></a>
                            	<?php } ?>
                            <?php }	?>
                        <h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php 
							$introduction_body_text = get_field('introduction_body_text');
          					echo substr($introduction_body_text, 0, 500);
						//substr(the_field('introduction_body_text'),150); ?>...</p>
                        <div class="camps_clear"></div>
                    </div>
                    
                    <?php
					
				} ?>
                <?php if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
                  <nav class="prev-next-posts">
                    <div class="prev-posts-link">
                      <?php echo get_next_posts_link( 'Next Page', $query->max_num_pages ); // display older posts link ?>
                    </div>
                    <div class="next-posts-link">
                      <?php echo get_previous_posts_link( 'Previous Page' ); // display newer posts link ?>
                    </div>
                  </nav>
                <?php } ?>
			<?php } else {
				// no posts found
				echo "<h3 style='margin-top:20px;'>No Camps or Clinics were found that match your criteria</h3>";
			}
			
			// Restore original Post Data
			wp_reset_postdata(); ?>
			
    	
    </div>
</div><!--main -->
<!-- jith added -->
		</div>
	</div>
<!-- jith added -->

<?php get_footer(); ?>