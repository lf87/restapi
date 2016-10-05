<?php
// Register scripts
function scribetech_scripts() {
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'wp-content/plugins/svg-support/js/min/svg-inline-min.js' );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,500,700' );
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/dist/assets/js/main.js','','', true);
}
add_action( 'wp_enqueue_scripts', 'scribetech_scripts', 20 );

// Register Menu
function register_my_menu() {
	register_nav_menu( 'main-menu',__( 'Main Menu' ) );
}
add_action( 'init', 'register_my_menu' );

// Remove classes from Menu
add_filter( 'nav_menu_css_class', function( $classes ) {
    $allowed = array(
        'current-menu-item'
    );
    $output = array();
    foreach ( $classes as $class ) {
        if ( in_array( $class, $allowed ) )
            $output[] = $class;
    }
    return $output;
});

function remove_actions() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action('init', 'remove_actions', 20);

// Edit excerpt ellipses
add_theme_support( 'post-thumbnails' );
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

/* Add custom thumbnail sizes */
if (function_exists('add_image_size')) {
	add_image_size('300x180', 300, 180, true);
}

/*
/--------------/
/-Prepare REST-/
/--------------/
*/

function prepare_rest($data, $post, $request) {
	$_data = $data->data;
	$thumbnail_id = get_post_thumbnail_id( $post_id );

	$thumbnail300x180 = wp_get_attachment_image_src( $thumbnail_id, '300x180' );
	$thumbnailMedium = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
	$thumbnailMedium = wp_get_attachment_image_src( $thumbnail_id, 'full' );

	$_data['fi_300xx180'] = $thumbnail300x180[0];
	$_data['fi_medium'] = $thumbnail300x180[0];
	$_data['fi_full'] = $thumbnail300x180[0];

	$data->data = $_data;
	return $data;
}
add_filter('rest_prepare_post', 'prepare_rest', 10, 3)
?>