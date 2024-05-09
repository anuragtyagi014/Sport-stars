<?php
   /* *********************************** This template is for Camps page ********************************* */
?>
<?php get_header(); ?>
<?php session_start(); ?>

<?php global $author; $userdata = get_userdata($author); ?>

<!-- jith added -->
<div class="container homepage-content hfeed">
    <div class="main-content-column-1 full-width">
<!-- jith added -->

<style type="text/css">
	input, select {
		height: 32px;
		border: 1px solid black;
		color: black;
		background: #ddd;
	}
	.camps_results {
		display: flex;
		flex-flow: column wrap;
		height: 1696px;
		align-content: space-between;
		padding-bottom: 0px;
		margin-bottom: 10px;
	}
    .camps_search div {
       	float: left;
       	width:auto;
       	margin-right:15px;
		
	}
	.camps_clear {
       	clear:both;
	}
	.camps_search .form-select {
       	padding:3px !important;
	}
	.camps_search {
       	padding: 10px 10px 10px 20px;
		background: #ccc;
		float: left;
		width: 100%;
		font-size: 12px;
	}
	.camp_result, .camps_results .widget-container {
        /*width: 290px;*/
	}
	.widget-inner {
    	/*float: left;*/
    	/*width: 280px;*/
		font: 12px/16px helvetica,arial,sans-serif;
    	padding: 10px;
    	position: relative;
	}
	.widget-camp {
		min-height: 250px;
	}
	.camps_results h4 {
        margin-bottom:10px;
	}
	.camp_result .widget-inner, .camp_result .widget-header, .camps_results .widget-container .widget-header, .camps_results .widget-container .widget-inner {
        /*width:270px;*/
	}
	.widget-inner p {
		margin-bottom: 0px;
	}
	#camps-widget-wrapper {padding-bottom: 0px;}
	.camps_results p {
        font-size: 12px;
        line-height: 16px;
		text-align: justify;
	}
	.camps_results .thumb_image {
        width:100%;
        max-width:150px;
        height:auto;
	}
	.coach_name {
        margin-bottom:20px;
	}
	.more_coaches {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: rgba(237,28,36,1);
        background: -moz-linear-gradient(top, rgba(237,28,36,1) 0%, rgba(178,34,39,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(237,28,36,1)), color-stop(100%, rgba(178,34,39,1)));
        background: -webkit-linear-gradient(top, rgba(237,28,36,1) 0%, rgba(178,34,39,1) 100%);
        background: -o-linear-gradient(top, rgba(237,28,36,1) 0%, rgba(178,34,39,1) 100%);
        background: -ms-linear-gradient(top, rgba(237,28,36,1) 0%, rgba(178,34,39,1) 100%);
        background: linear-gradient(to bottom, rgba(237,28,36,1) 0%, rgba(178,34,39,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ed1c24', endColorstr='#b22227', GradientType=0 );
        text-transform:uppercase;
        color:white;
        font-size: 12px;
        font-family: 'Oswald', sans-serif;
        padding:10px;
        text-decoration:none;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition:.5s;
        cursor:pointer;
	}
	.more_coaches:hover {
        background: rgba(178,34,39,1);
        background: -moz-linear-gradient(top, rgba(178,34,39,1) 0%, rgba(237,28,36,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(178,34,39,1)), color-stop(100%, rgba(237,28,36,1)));
        background: -webkit-linear-gradient(top, rgba(178,34,39,1) 0%, rgba(237,28,36,1) 100%);
        background: -o-linear-gradient(top, rgba(178,34,39,1) 0%, rgba(237,28,36,1) 100%);
        background: -ms-linear-gradient(top, rgba(178,34,39,1) 0%, rgba(237,28,36,1) 100%);
        background: linear-gradient(to bottom, rgba(178,34,39,1) 0%, rgba(237,28,36,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b22227', endColorstr='#ed1c24', GradientType=0 );
	}
	.camps_cta_btn {
        float:left;
        margin-left: 0px;
        width:30%;
        text-align:center;
	}
	.camps_cta_btn a {
	    color:white !important;
	}
	.camps_cta_btn a:hover {
        text-decoration:none;
	}
	.camps_cta_intro {
        float:left;
        width:75%;
        text-align:left;
	}
	.camps_cta_intro h3 {
        float:left;
        width:50%;
		font-size: 16px !important;
	}
	.camps_cta {
        width:100%;
        height:40px;
	}
	.body_text p {
        margin:15px 0;
	}
	.widget-container, .camp_result {
        background: #fff;
                -ms-box-shadow: 0 2px 7px -1px #aaa;
                -moz-box-shadow: 0 2px 7px -1px #aaa;
                -o-box-shadow: 0 2px 7px -1px #aaa;
                -webkit-box-shadow: 0 2px 7px -1px #aaa;
        box-shadow: 0 2px 7px -1px #aaa;
        float:left;
        margin: 20px 0 0 20px;
        padding: 0px;
        position: relative;
        width: 300px;
        }
	.blog-cat-title {
        color: #000;
        font: 700 16px/16px 'Oswald', sans-serif;
        position: absolute;
                top: 0;
                left: 0;
        text-shadow: 1px 1px 0 #aaa;
        text-transform: uppercase;
        z-index: 10;
        }

	.blog-cat li,
	.blog-cat-title {
        display: none;
        float: left;
        margin-right: 2px;
        padding: 5px;
    }

	.blog-cat a,
	.blog-cat-title a {
        color: #fff;
        text-shadow: 1px 1px 0 #000;
    }

	.blog-cat a:visited,
	.blog-cat-title a:visited {
        color: #fff;
    }

	.blog-cat a:hover,
	.blog-cat-title a:hover {
        text-decoration: none;
    }
    .camp_cat {
        position:relative;
        margin-left:-10px !important;
        margin-top:-10px !important;
    }
	.blog-cat-title {
		background: #ff5732;
	}
	h4.widget-header {
        background: #222;
	}
	h4.widget-header a, h4.widget-header a:visited {
        color: #fff;
	}
	h4.widget-header {
		font: 700 12px/12px 'Open Sans Condensed',sans-serif;
		padding: 5px 10px !important;
		text-transform: uppercase;
		float: left;
		text-shadow: 1px 1px 0 #000;
		margin: -10px 0 10px -10px !important;
		width: 300px !important;
		min-height: 46px;
	}
	
/************************************************
	Pagination
************************************************/

.nav-links {
	float: left;
	margin: 10px 0 5px;
	position: relative;
	width: 100%;
	}
#nav_links {
	margin-top: 0px;
	}
.pagination {
	clear: both;
	position: relative;
	font: bold 12px/12px helvetica, arial, sans-serif !important;
    padding: 12px;
    background: #ddd;
	}
 
.pagination span, .pagination a {
	background: #555 url(/wp-content/themes/goliath/images/pagin-bg.png) repeat-x bottom !important;
	border: 1px solid #333 !important;
	border-radius: 3px !important;
	-ms-box-shadow: 0 3px 5px -1px #aaa !important;
	-moz-box-shadow: 0 3px 5px -1px #aaa !important;
	-o-box-shadow: 0 3px 5px -1px #aaa !important;
	-webkit-box-shadow: 0 2px 3px -1px #aaa !important;
	box-shadow: 0 3px 5px -1px #ccc !important;
	color: #fff !important;
	display:block !important;
	float:left !important;
	margin: 2px 5px 2px 0 !important;
	padding: 9px 12px 8px 12px !important;
	text-decoration: none !important;
	width: auto !important;
	line-height: 1.6 !important;
	}
 
.pagination .current, .pagination a:hover {
	background: #999 url(/wp-content/themes/goliath/images/pagin-bg.png) repeat-x bottom !important;
	border: 1px solid #777 !important;
	color: #eee !important;
	}

.pagination a,
.pagination a:visited {
	color: #fff !important
	}

img.aligncenter {
	display: block;
	max-width:230px;
	max-height:95px;
	width: auto;
	height: auto;
	margin: 5px auto 5px auto;
}
#camps_submit {
	background: #444;
	color: #fff;
	border: none;
}
</style>
		
<div id="main" class="full">
    <div class="camps_cta">
            <div class="camps_cta_intro">
                <h3><em>Want to add or update your camp in this list?</em></h3>
                <div class="camps_cta_btn"><a class="more_coaches" href="<?php echo home_url(); ?>/camps-registration/">Register&nbsp;Your&nbsp;Camp&nbsp;Profile</a></div>
            </div>
            <div class="camps_clear"></div>
    </div>
	<div class="camps_clear"></div>
	<div class="camps_search">
    	<form method="get" action="/camps/">
            <div class="field">
            	Sport:<br> 
            	<select name="sportname" class="form-select" id="sportname">
                	<option value="All" selected="selected">&lt;Any&gt;</option>
                    <option value="football">Football</option>
                    <option value="basketball">Basketball</option>
                    <option value="baseball">Baseball/Softball</option>
                    <option value="soccer">Soccer</option>
                    <option value="hockey">Hockey</option>
                    <option value="volleyball">Volleyball</option>
                    <option value="biking">Cycling</option>
                    <option value="cheer">Cheer/Gymnastics</option>
                    <option value="cross-country">Cross Country</option>
                    <option value="equestrian">Equestrian</option>
                    <option value="enrichment">Enrichment</option>
                    <option value="golf">Golf</option>
                    <option value="lacrosse">Lacrosse</option>
                    <option value="martial-arts">Martial Arts</option>
                    <option value="multi-sport">Multi-Sport</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="rugby">Rugby</option>
                    <option value="swimming">Swimming/Diving</option>
                    <option value="tennis">Tennis</option>
                    <option value="track">Track and Field</option>
                    <option value="training">Training/Fitness</option>
                    <option value="water-polo">Water Polo</option>
                    <option value="wrestling">Wrestling</option>
                </select>
            </div>
            <div class="field">
            	Keyword:<br> 
            	<input type="text" name="keyword" id="keyword">
            </div>
            <!--<div class="field">
            	Sort by: 
            	<select name="sortorder" class="form-select" id="sortorder">
                	<option value="title" selected="selected">Alphabetical</option>
                    <option value="date">Date</option>
                </select>
            </div>-->
            <div class="field">
				<br>
            	<input type="submit" id="camps_submit" name="camps_submit" value="Filter Results">
            </div>
        </form>
    </div>
    <div class="camps_clear"></div>
    <div class="camps_results" id="camps-widget-wrapper">
    	<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$sportname;
			$keyword;
			if (!get_query_var('paged')) {
				unset($_SESSION['sportname']);
				unset($_SESSION['keyword']);
			}
			if(isset($_GET['sportname']))
			{
				$sportname = strip_tags( trim( $_GET[ 'sportname' ] ) );
				if ($sportname != "All") $_SESSION['sportname'] = $sportname;
				//echo $_SESSION['sportname'];
			}
			if(isset($_GET['keyword']))
			{
				$keyword = strip_tags( trim( $_GET[ 'keyword' ] ) );
				$_SESSION['keyword'] = $keyword;
			}
			if (get_query_var('paged')) {
				echo $_SESSION['sportname'];
				if(isset($_SESSION['sportname']))
    			{
					$sportname = $_SESSION['sportname'];
					$keyword = $_SESSION['keyword'];
				}
			}
			
			$orderby = strip_tags( trim( $_GET[ 'sortorder' ] ) );
			$order;
			$metakey;
			if ($orderby == 'title')  { $order = 'title'; $metakey = ''; }
			if ($orderby == 'date')  { $order = 'meta_value_num'; $metakey = 'camp_date'; }
			
			$args = array (
					'post_type'              => array( 'camps' ),
					'nopaging'               => false,
					'order'                  => 'ASC',
					'orderby'				 => 'title',
					'paged' 				 => $paged
				);	
				if(isset($sportname)) {
					if ($sportname == "All") {
						$args['meta_key'] = $metakey;
					}
					else 
					{
						$metaArray = array(
							array(
								'key'       => 'sport',
								'value'     => $sportname,
							),
						);
						$args['meta_key'] = $metakey;
						$args['meta_query'] = $metaArray;
					}
				}
				if (!is_null ($keyword))
				{
					$args['s'] = $keyword;
				}			

			// The Query
			$wp_query = new WP_Query( $args );
			$post_count = 0;
			// The Loop
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$post_id = get_the_ID();
					
					if ($post_count == 2) { ?>
						<div class="widget-container camp_result">
                    	<div class="widget-inner">
						<?php echo do_shortcode('[bsa_pro_ad_space id=10]'); ?>
						</div>
		                </div>
                    	<?php if (!function_exists('register_sidebar') || !register_sidebar('Camps Page Ad 1')): endif; 
					} ?>
                    
                    <?php if ($post_count == 4) { ?>
		                <div class="widget-container camp_result">
                    	<div class="widget-inner">
		                <?php echo do_shortcode('[bsa_pro_ad_space id=27]'); ?>
						</div>
		                </div>
                    	<?php if (!function_exists('register_sidebar') || !register_sidebar('Camps Page Ad 2')): endif; 
					} ?>
		
                    <?php if ($post_count == 4) { ?>
		                <div class="widget-container camp_result">
                    	<div class="widget-inner">
		                <?php echo do_shortcode('[bsa_pro_ad_space id=35]'); ?>
						</div>
		                </div>
                    	<?php if (!function_exists('register_sidebar') || !register_sidebar('Camps_Sky 1')): endif; 
					} ?>
					
		
                    <div class="widget-container camp_result">
                    	<div class="widget-inner widget-camp">
                        <h4 class="widget-header"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                        <?php $category = get_the_category(); 
						if (!empty($category)) { ?>
                        <span class="blog-cat-title camp_cat">
							<?php 
							
							echo $category[0]->cat_name;
							?>
                         </span>
                       	<?php } ?>

                    <?php 
						$image = get_field('camp_logo');
						$oldImageUrl = get_post_meta( $post_id, 'camp_logo', true );
					    
						if ( FALSE === get_post_status( $oldImageUrl ) ) { 
							if( !empty($image) ): ?>
                            	<?php if (@getimagesize($image['url'])) { ?>
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" class="thumb_image alignleft"></a>
                                	<?php } ?>
								<?php endif; 
							} else {
						 ?>
                         		<?php if( !empty($oldImageUrl) ) { ?>
                                	<!-- ?php if (@getimagesize(wp_get_attachment_url($oldImageUrl))) { ? -->
                            	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url($oldImageUrl); ?>" alt="<?php the_title(); ?>" class="aligncenter"></a>
                                	<!-- ?php } ? -->
                            	<?php } ?>
                            <?php }	?>
                        <p><?php 
							$introduction_body_text = get_field('introduction_text');
          					echo substr($introduction_body_text, 0, 250); ?>... <strong><a href="<?php the_permalink();?>">Read&nbsp;More</a></strong></p>
                        </div>
		             </div>
                     <p><!--test jith--></p>
		
                    <?php $post_count++; ?>
                    
                    <?php
					
				} ?>
                
			<?php } else {
				// no posts found
				echo "<h3 style='margin-top:20px;'>No Camps or Clinics were found that match your criteria</h3>";
			}
			
			// Restore original Post Data
			wp_reset_postdata(); ?>
    
    </div>
    <div class="clear"></div>
                <div class="nav-links" id="nav_links">
					<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
				</div><!--nav-links-->
				

</div>
<!-- jith added -->
		</div>
	</div>
<!-- jith added -->
		
<?php //echo do_shortcode('[bsa_pro_ad_space id=12]'); ?>













<?php get_footer(); ?>
