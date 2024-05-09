<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	<!-- BEGIN head -->
	<head>
		
        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.…">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="google-site-verification" content="-P5lVOqOp9yq-Qihgs1dKSgSxUMBbyJRYxUQuNQyzlE" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if(plsh_gs('favicon')) : ?>
			<?php if(is_ssl()) {
				$favicon_img_url = str_replace("http:", "https:", plsh_gs('favicon'));
			} else {
				$favicon_img_url = plsh_gs('favicon');
			} ?>
			<link rel="shortcut icon" href="<?php echo esc_url($favicon_img_url); ?>" />
        <?php endif; ?>
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
            {
                wp_enqueue_script( 'comment-reply' );
            }
		?>

        <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>


		<?php if(plsh_gs('display_theme_og_tags') == 'on') : ?>

			<!-- if page is content page -->
			<?php if (is_single()) { ?>
			<meta property="og:url" content="<?php the_permalink() ?>"/>
			<meta property="og:title" content="<?php esc_attr(single_post_title('')); ?>" />
			<meta property="og:description" content="<?php echo esc_attr(htmlentities(strip_tags(strip_shortcodes(get_the_excerpt())))); ?>" />
			<meta property="og:type" content="article" />
			<?php
				$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog_thumb_single_small');
				if($img)
				{
					echo '<meta property="og:image" content="' . $img[0] . '" />';
				}
			?>
			<!-- if page is others -->
			<?php } else { ?>
			<meta property="og:site_name" content="<?php esc_attr(bloginfo('name')); ?>" />
			<meta property="og:description" content="<?php esc_attr(bloginfo('description')); ?>" />
			<meta property="og:type" content="website" />
			<meta property="og:image" content="<?php echo esc_url(plsh_gs('logo_image')); ?>" />
			<?php } ?>

		<?php endif; ?>
		<!-- script async src='https://tag.simpli.fi/sifitag/40a761f0-59a9-0139-aa75-06a60fe5fe77'></script -->
		<!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KJ8ZQYEB4T"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-KJ8ZQYEB4T');
        </script>
        <?php wp_head(); ?>
	</head>
    <?php $body_class = 'preload'; ?>
	<body <?php body_class($body_class); ?> >

        <?php echo do_shortcode('[bsa_pro_ad_space id=12]'); ?>

        <?php wp_body_open(); ?>
            <?php get_template_part('theme/templates/header'); ?>

