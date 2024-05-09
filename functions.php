<?php
/*added for switching dev to live, commented after apache restart and browser refresh
update_option( 'siteurl', 'https://sportstarsmag.com' );
update_option( 'home', 'https://sportstarsmag.com' );*/
	require_once(get_template_directory() . '/core/' . 'init.php');	//initialize framework
	require_once(PLSH_THEME_PATH . 'theme-functions.php');	//initialize theme

/*--------------------------- CUSTOM FUNCTIONS --------------------------*/
/*	Add your custom functions below											 */
/*-----------------------------------------------------------------------*/

    if ( ! isset( $content_width ) )
    {
        $content_width = 680;
    }

/* Turn off the WordPress Admin Bar for all users - added on 16 jan 2024 */
add_filter( 'show_admin_bar', '__return_false' );

/* added on 7 jul 2022 */
/**
 * Modifies the SQL query performed by WordPress Popular Posts,
 * limiting its execution time to 3000 milliseconds (3 seconds) 
 * to reduce the chances of database locks.
 *
 * @see https://dev.mysql.com/doc/refman/5.7/en/optimizer-hints.html#optimizer-hints-execution-time
 *
 * @param string
 * @param array
 * @return string
 */
function wpp_limit_query_execution_time($fields, $options){
    return '/*+ MAX_EXECUTION_TIME(3000) */ ' . $fields;
}
add_filter('wpp_query_fields', 'wpp_limit_query_execution_time', 10, 2);



// Sports Stars Archives List Shortcode
function mag_list_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'cat' => '',
		),
		$atts,
		'sports_stars_mag_list'
	);
	$cat = $atts["cat"];
	$cat_name = get_cat_name( $cat );

	// WP_Query arguments
	$args = array (
		'post_type'              => array( 'magazine_archives' ),
		'cat'                    => $cat,
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'posts_per_page'		 => 200,
		'nopaging' 				 => true
	);

	$html = '';

	// The Query
	$ss_query = new WP_Query( $args );

	// The Loop
	if ( $ss_query->have_posts() ) {
		$html = '<h4>'.$cat_name.'</h4><ul>';
		while ( $ss_query->have_posts() ) {
			$post = $ss_query->the_post();
			$html .= '<li><a href="'.get_permalink( $post->ID ).'">'.get_the_title( $post->ID ).'</a></li>';
		}
		$html .= '</ul>';
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();

	return $html;
}
add_shortcode( 'sports_stars_mag_list', 'mag_list_shortcode' );

// jith added filter to add trailing slash to category URL
add_filter( 'category_link', 'wpse_71666_trailingslash_cat_url' );
add_filter( 'redirect_canonical', 'wpse_71666_trailingslash_cat_url', 20, 2 );

function wpse_71666_trailingslash_cat_url( $url, $request = '' )
{
    if ( 'category_link' === current_filter() )
        return rtrim( $url, '/' ) . '/';

    if ( "$url/" === $request and is_category() )
        return $request;

    return $url;
}

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');

function my_wp_head() {
	$bloginfo = get_template_directory_uri();
	$primarytheme = get_option('gd_primary_theme');
	$secondarytheme = get_option('gd_secondary_theme');
	$link = get_option('gd_link_color');
	$heading = get_option('gd_heading');
	$wallad = get_option('gd_wall_ad');
	echo "
<style type='text/css'>

#nav-main-wrapper { background: $primarytheme url($bloginfo/images/nav-bg.png) repeat-x bottom; }
span.headlines-header, #content-social, span.scroll-more, .search-fly-wrap { background: $primarytheme }

.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce span.onsale,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
	background-color: $primarytheme;
	}

.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
	background: $primarytheme;
	}

#nav-mobi select { background: $primarytheme url($bloginfo/images/triangle-dark.png) no-repeat right; }
.category-heading { background: $primarytheme url($bloginfo/images/striped-bg.png); }
ul.score-nav li.active, ul.score-nav li.active:hover, .blog-cat li, .blog-cat-title, .flex-control-paging li a.flex-active { background: $secondarytheme; }
.prev-post, .next-post { color: $secondarytheme; }
a, a:visited { color: $link; }
h3#reply-title, h2.comments, #related-posts h3, h4.widget-header, h4.widget-header-fb { background: $heading url($bloginfo/images/striped-bg.png); }
/*#wallpaper { background: url($wallad) no-repeat 50% 0; }*/

		</style>";
}
add_action( 'wp_head', 'my_wp_head' );

/////////////////////////////////////
// Register Widgets
/////////////////////////////////////

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'homepage-widget-area',
		'name' => 'Homepage Widget Area',
		'before_widget' => '<div class="widget-container"><div id="%1$s" class="widget-inner %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widget-header">',
		'after_title' => '</h4>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'homepage-widget',
		'name' => 'Homepage Blog Sidebar Widget Area',
		'before_widget' => '<div class="widget-container"><div id="%1$s" class="widget-inner %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widget-header">',
		'after_title' => '</h4>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'sidebar-widget',
		'name' => 'Sidebar Widget Area',
		'before_widget' => '<div class="widget-container"><div id="%1$s" class="widget-inner %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widget-header">',
		'after_title' => '</h4>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'scoreboard-widget',
		'name' => 'Scoreboard Widget Area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'sidebar-woo-widget',
		'name' => 'WooCommerce Sidebar Widget Area',
		'before_widget' => '<div class="widget-container"><div id="%1$s" class="widget-inner %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widget-header">',
		'after_title' => '</h4>',
	));
}

include("widgets/widget-ad125.php");
include("widgets/widget-ad300.php");
include("widgets/widget-catfeat.php");
include("widgets/widget-catlist.php");
include("widgets/widget-facebook.php");
include("widgets/widget-scoreboard.php");

/////////////////////////////////////
// Pagination
/////////////////////////////////////

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
?>
<?php
if ( !function_exists( 'mvp_wp_footer' ) ) {
    function mvp_wp_footer() {
?>
<?php
}
}
add_action( 'wp_footer', 'mvp_wp_footer' );

?>

<?php function theme_admin_css() {
echo '
<style>
th#title {
    width: 12%;
}
</style>
'; }
add_action( 'admin_head', 'theme_admin_css' ); ?>