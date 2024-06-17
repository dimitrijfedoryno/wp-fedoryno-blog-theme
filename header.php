<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>

    <div class="blog-masthead">
      <div class="container">
	<nav class="blog-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
	</nav>
      </div>
    </div>

    <div class="container">
	
	<div class="blog-header"></div>