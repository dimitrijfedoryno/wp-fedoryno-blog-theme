<?php
/**
 * wpboot functions and definitions
 *
 * @package FedorynoBlog
 */


add_action( 'after_setup_theme', 'wpboot_theme_setup' );
function wpboot_theme_setup() {

	global $content_width;
	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
	$content_width = 617;

	/* Add theme support for automatic feed links. */
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'big-thumb', 617, 9999);
}

/* Add your nav menus function to the 'init' action hook. */
   add_action( 'init', 'wpboot_register_menus' );

/* Add custom actions. */
   add_action( 'widgets_init', 'wpboot_register_sidebars' );


// Add menu features 
function wpboot_register_menus() {
	register_nav_menus(array('primary'=>__( 'Primary Menu' ), ));
}

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
function wpboot_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wpboot_page_menu_args' );

function wpboot_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar', 'wpboot' ),
			'description' => __( 'The following widgets will appear in the main sidebar div.', 'wpboot' ),
			'before_widget' => '<div id="%1$s" class="sidebar-module widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		)
	);
}

function wpboot_scripts() {

 		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', null, '3.0.0' );
 
		wp_enqueue_style( 'style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpboot_scripts' );

//Set up title if SEO plugin is not used.

function wpboot_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wpboot' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wpboot_wp_title', 10, 2 );

function wpboot_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpboot_excerpt_length', 999 );

function wpboot_excerpt_more($more) {
       global $post;
	return '... <span class="read-more"><a href="'. get_permalink($post->ID) . '">Číst dále &rarr;</a></span>';
}
add_filter('excerpt_more', 'wpboot_excerpt_more');