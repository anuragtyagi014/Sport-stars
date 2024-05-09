<?php get_header(); ?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
    <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium-thumb'); ?>
    <meta property="og:image" content="<?php echo $thumb['0']; ?>" />
  <?php } ?>
  <?php if (!function_exists('_wp_render_title_tag')) {
    function theme_slug_render_title()
    { ?>
      <title>
        <?php wp_title('|', true, 'right'); ?>
      </title>

  <?php }
    add_action('wp_head', 'theme_slug_render_title');
  } ?>
  <!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/iecss.css" />
<![endif]-->
  <?php if (get_option('gd_favicon')) { ?>
    <link rel="shortcut icon" href="<?php echo get_option('gd_favicon'); ?>" />
  <?php } ?>
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
  <?php $analytics = get_option('gd_tracking');
  if ($analytics) {
    echo stripslashes($analytics);
  } ?>
  <?php wp_head(); ?>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/fancybox/2.1.5/helpers/jquery.fancybox-media.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/fancybox/2.1.5/jquery.fancybox.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/camps_styles.css">
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery(".various").fancybox({
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        width: '70%',
        height: '70%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
      });
      jQuery(".fancyboximg").fancybox();
      jQuery(".more_coaches").click(function() {
        jQuery(".additional_coaches").slideToggle("slow", function() {});
      })
      jQuery(".btn_camp_details").click(function() {
        jQuery(".additional_camp_details").slideToggle("slow", function() {});
      })
      jQuery(".btn_additional").click(function() {
        jQuery(this).siblings(".additional_info").slideToggle("slow", function() {});
      })
      jQuery(function() {
        jQuery('a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
              jQuery('html, body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });




    })
  </script>
</head>

<body <?php body_class(); ?>>
  <?php
  $is_jf = false;
  $is_varsity = false;
  $is_all_star = false;
  $is_admin = false;

  require_once(ABSPATH . 'wp-includes/pluggable.php');
  global $post;
  //setup_postdata();
  $post_author = get_post_field('post_author', $post->ID);

  //If the current user is an admin user
  if (user_can($post_author, 'manage_options')) {
    $is_admin = true;
  }
  //All Star Profile Group
  if ($group = Groups_Group::read_by_name('All Star Profile')) {
    $is_all_star = Groups_User_Group::read($post_author, $group->group_id);
  }
  //JF Profile Group
  if ($group = Groups_Group::read_by_name('	JF Profile')) {
    $is_jf = Groups_User_Group::read($post_author, $group->group_id);
  }
  //Varsity Profile Group
  if ($group = Groups_Group::read_by_name('Varsity Profile')) {
    $is_varsity = Groups_User_Group::read($post_author, $group->group_id);
  }
  ?>




  <?php
  $headerImageURL = "";
  $header_image = get_field("header_image");
  if ($header_image) {
    $headerImageURL = $header_image['url'];
  }
  $logo_image = get_field("camp_logo");
  $logoImageURL = "";
  if ($logo_image) {
    $logoImageURL = $logo_image['url'];
  }
  ?>
  <!-- jith added -->
  <div class="container homepage-content hfeed">
    <div class="main-content-column-1 full-width">
      <!-- jith added -->
      <div class="featured_image_section clearfix" style="background:linear-gradient(
      rgba(0, 0, 0, 0.3), 
      rgba(0, 0, 0, 0.3)
    ), url(<?php echo $headerImageURL; ?>) no-repeat center; background-size: cover;">
        <div class="container">
          <!-- ?php if (@getimagesize($logoImageURL)) { ? -->
          <div class="camp_logo"><img alt="logo" src="<?php echo $logoImageURL ?>"></div>
          <!-- ?php } ? -->
          <div class="title_section">
            <div class="camp_title">
              <?php $camp_title = get_the_title();
              if ($camp_title) {
                echo $camp_title;
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="main_body container clearfix">
        <div class="main_top"></div>
        <div class="main_left">
          <div class="body_content clearfix">
            <div class="intro_text">
              <?php $introduction_text = get_field("introduction_text");
              if ($introduction_text) {
                echo $introduction_text;
              }
              ?>
            </div>
            <div class="body_text">
              <?php $introduction_body_text = get_field("introduction_body_text");
              if ($introduction_body_text) {
                echo $introduction_body_text;
              }
              ?>
            </div>
            <?php if ($is_admin || $is_varsity || $is_all_star) {   ?>
              <?php $camp_director_name = get_field("camp_director_name"); ?>
              <?php if (($camp_director_name) || (have_rows('coaches'))) { ?>
                <div class="coaches">
                  <div class="section_title">Camp Coaches</div>
                  <?php $camp_director_photo = get_field("camp_director_photo");
                  if ($camp_director_photo) { ?>
                    <div class="director_photo"> <img src="<?php echo $camp_director_photo['url']; ?>" /> </div>
                  <?php } ?>

                  <div class="coach_title">
                    <?php if ($camp_director_name) { ?>
                      Camp Director
                    <?php } ?>
                  </div>
                  <div class="coach_name">
                    <?php
                    if ($camp_director_name) {
                      echo $camp_director_name;
                    }
                    ?>
                  </div>
                  <?php $camp_director_bio = get_field("camp_director_bio");
                  if ($camp_director_bio) {   ?>
                    <p><?php echo substr($camp_director_bio, 0, 240); ?></p>
                    <a class="btn_additional">Read Bio</a>
                    <div class="additional_info"><?php echo $camp_director_bio; ?></div>
                  <?php } ?>
                  <?php if (have_rows('coaches')) : ?>
                    <a class="more_coaches">Additional Coaches</a>
                    <div class="additional_coaches">
                      <?php while (have_rows('coaches')) : the_row(); ?>
                        <div class="coach clearfix">
                          <?php $coach_name = get_sub_field('coach_name');
                          $coach_title = get_sub_field('coach_title');
                          $coach_photo = get_sub_field('coach_photo');
                          $coach_bio = get_sub_field('coach_bio');
                          if ($coach_photo) { ?>
                            <div class="coach_photo"> <img src="<?php echo $coach_photo['url']; ?>" /> </div>
                          <?php } ?>
                          <div class="coach_bio">
                            <?php if ($coach_title) { ?>
                              <div class="coach_title"><?php echo $coach_title; ?></div>
                            <?php } ?>
                            <?php if ($coach_name) { ?>
                              <div class="coach_name"><?php echo $coach_name; ?></div>
                            <?php } ?>
                            <div class="coach_bio_content">
                              <?php if ($coach_bio) { ?>
                                <p><?php echo substr($coach_bio, 0, 240); ?></p>
                                <a class="btn_additional">Read Bio</a>
                                <div class="additional_info"><?php echo $coach_bio; ?></div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
          <?php /*?><div class="camp_details"> <a name="campdetails"></a>
      <div class="section_title">Camp Details</div>
      <?php if( have_rows('camp_details_paragraphs') ){ ?>
      <?php 
						$totalLoops = 0;
						$thresholdLoops = 0;
						if ($is_jf) $thresholdLoops = 0;
						if ($is_varsity) $thresholdLoops = 5;
						if ($is_all_star) $thresholdLoops = 5;
						if ($is_admin) $thresholdLoops = 5;
					 ?>
      <?php while ( have_rows('camp_details_paragraphs') ) : the_row(); ?>
      <?php $detail_paragraph = get_sub_field('detail_paragraph'); 
						if ($detail_paragraph) { echo $detail_paragraph; }
						$totalLoops++;
						if ($totalLoops >= $thresholdLoops) {break;}
						?>
      <?php endwhile; ?>
      <?php } else { echo get_the_content(); } ?>
    </div><?php */ ?>
          <?php
          $enable_reviews = get_post_meta(get_the_ID(), 'wpcr3_enable', true);
          if ($enable_reviews) { ?>
            <div class="camper_reviews">
              <div class="section_title">Reviews</div>
              <?php echo do_shortcode('[WPCR_INSERT]'); ?> <?php echo do_shortcode('[WPCR_SHOW] '); ?>
            </div>
          <?php } ?>
        </div>
        <div class="main_right">
          <?php if ($is_admin || $is_varsity || $is_all_star) {   ?>
            <div class="btn_brochure"><a href="#more_details">Camp Dates</a></div>
          <?php } ?>
          <?php if ($is_admin || $is_all_star) {   ?>
            <div class="top_buttons clearfix">
              <?php $link_to_video = get_field("link_to_video");
              if ($link_to_video) {
                echo '<div class="btn_video"><a href="' . $link_to_video . '" target="_blank">Video</a></div>';
              }
              ?>
              <?php $brochure = get_field("brochure");
              if ($brochure) {
                //echo '<div class="btn_brochure">';
                //do_shortcode('[frmmodal type="formidable" id=2 label="Brochure"]');
                echo '<div class="btn_brochure"><a href="' . $brochure['url'] . '">Brochure</a></div>';
                //echo '</div>';
              }
              ?>
            </div>
          <?php } ?>
          <?php if ($is_admin || $is_varsity || $is_all_star) {   ?>
            <div class="camp_gallery clearfix">
              <?php

              $galleryimages = get_field('camp_gallery');

              if ($galleryimages) : ?>
                <ul>
                  <?php foreach ($galleryimages as $image) : ?>
                    <li> <a href="<?php echo $image['url']; ?>" class="fancyboximg" rel="group"> <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /> </a> </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php } ?>
          <?php if ($is_admin || $is_all_star) {   ?>
            <div class="social_icons">
              <div class="share_title">Follow Us</div>
              <?php $camp_fb = get_field("facebook_link");
              if ($camp_fb) {
                echo '<a href="' . $camp_fb . '" target="_blank"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>';
              }
              ?>
              <?php $camp_tw = get_field("twitter_link");
              if ($camp_tw) {
                echo '<a href="' . $camp_tw . '" target="_blank"><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>';
              }
              ?>
              <?php $camp_in = get_field("instagram_link");
              if ($camp_in) {
                echo '<a href="' . $camp_in . '" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>';
              }
              ?>
              <?php $camp_gp = get_field("youtube_account_link");
              if ($camp_gp) {
                echo '<a href="' . $camp_gp . '" target="_blank"><i class="fa fa-youtube fa-3x" aria-hidden="true"></i></a>';
              }
              ?>
            </div>
          <?php } ?>
          <div class="map_details">
            <div class="map_box_title">
              <?php $camp_title = get_the_title();
              if ($camp_title) {
                echo $camp_title;
              }
              ?>
            </div>
            <div class="camp_address">
              <?php
              $camp_street_address = get_field("camp_street_address");
              $camp_city = get_field("camp_city");
              $camp_state = get_field("camp_state");
              $camp_postal_code = get_field("camp_postal_code");

              if ($camp_street_address) {
                echo $camp_street_address . "<br>";
              }
              echo $camp_city . ', ' . $camp_state . ' ' . $camp_postal_code;
              $camp_email_link = get_field('camp_email');
              if ($camp_email_link) {
                echo "<br><a href='mailto:" . $camp_email_link . "'>" . $camp_email_link . "</a>";
              }
              $camp_phone_number = get_field("camp_phone_number");
              if ($camp_phone_number) {
                echo '<div><a href="tel:' . $camp_phone_number . '">' . $camp_phone_number . '</a></div>';
              }

              $sign_up_link = get_field('sign_up_link');
              if ($sign_up_link) {
                echo '<div class="camp_phone"><a href="' . $sign_up_link . '" target="_blank">CLICK HERE TO SIGN UP</a></div>';

              ?>
                <!--<div style="margin-top:10px; margin-bottom:10px;"><a href="<?php echo $sign_up_link; ?>" target="_blank">CLICK HERE TO SIGN UP</a></div>-->
              <?php } ?>
            </div>
            <?php

            ?>
            <div class="map_box">
              <?php if ($is_admin || $is_varsity || $is_all_star) {   ?>
                <div class="map">
                  <?php
                  $camp_street_address = get_field("camp_street_address");
                  $camp_city = get_field("camp_city");
                  $camp_state = get_field("camp_state");
                  $camp_postal_code = get_field("camp_postal_code");
                  //if ($camp_street_address) { 
                  echo do_shortcode('[google_map version="classic" lang="en" link="yes" width="100%" height="250"]' . $camp_street_address . ',' . $camp_city . ',' . $camp_state . $camp_postal_code . '[/google_map]');
                  //}
                  ?>
                </div>
              <?php } ?>
            </div>
            <div class="share_btns">
              <div class="share_title" style="margin-top:20px;">Like This Camp? Share It!</div>
              <?php echo wpfai_social(); ?>
            </div>
          </div>

        </div>
        <div class="clearfix"></div>
        <?php if ($is_admin || $is_varsity || $is_all_star) {   ?>
          <div class="main_bottom"> <a name="more_details"></a>
            <div class="section_title">Camp Dates</div>
            <div class="camp_details">
              <?php
              //$camp_date = get_field('camp_date'); 
              $sign_up_link = get_field('sign_up_link');
              if (have_rows('camp_date')) { ?>
                <?php while (have_rows('camp_date')) : the_row(); ?>
                  <?php
                  $camp_date = get_sub_field('camps_dates');
                  $camp_url = get_sub_field('camp_url');
                  ?>
                  <div class="camp_item clearfix">
                    <div class="item_title"><?php echo $camp_title; ?> - <?php echo $camp_date; ?></div>
                    <!--<div class="item_date"></div>-->
                    <?php if ($camp_url) { ?>
                      <div class="item_signup"><a class="signup_btn" href="<?php echo $camp_url; ?>" target="_blank">Sign Up</a></div>
                    <?php } else { ?>
                      <div class="item_signup"><a class="signup_btn" href="<?php echo $sign_up_link; ?>" target="_blank">Sign Up</a></div>
                    <?php } ?>
                  </div>

                <?php endwhile; ?>
              <?php } else { ?>
                <div class="no_camp_message">Camps dates are currently available on the organizations website.</div>
              <?php }  ?>
            </div>
            <a href="#" class="signup_btn" onclick="window.history.back()">Back to Camps</a>
          </div>
        <?php } ?>
      </div>
      <!-- jith added -->
    </div>
  </div>
  <!-- jith added -->

  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>