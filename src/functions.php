<?php


//require get_template_directory() . '/inc/function-admin.php';


// Theme setup
add_action( 'after_setup_theme', function () {
	// Add a menu location
	register_nav_menu( 'primary', 'Header Navigation' );

	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumbnail', 180, 120, true );

	// Add post format support
	add_theme_support( 'post-formats', [ 'status', 'image', 'gallery', 'video' ] );


	// Specify which functionality the theme will support
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'menus' );
} );


// Include scripts and style sheets on the front end
add_action( 'wp_enqueue_scripts', function () {
	// Style sheets
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', [ ], '3.3.7', 'all' );
	wp_enqueue_style( 'bootstrap-theme', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"', [ ], '3.3.7', 'all' );
	wp_enqueue_style( 'coffeestyle', get_template_directory_uri() . '/css/coffee-coffee.css', [ ], '1.0.0', 'all' );

	// JavaScripts
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array( 'jquery' ), '3.1.1', true ); // we need the jquery library for bootsrap js to function
	wp_enqueue_script( 'bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true ); // all the bootstrap javascript goodness
	wp_enqueue_script( 'coffeejs', get_template_directory_uri() . '/js/coffee-coffee.js', [ 'jquery' ], '1.0.0', true );
} );


// Include scripts and style sheets on the back end
add_action( 'admin_enqueue_scripts', function() {
	// Style sheets
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', [ ], '3.3.7', 'all' );
	wp_enqueue_style( 'bootstrap-theme', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"', [ ], '3.3.7', 'all' );
	wp_enqueue_style( 'adminstyle', get_template_directory_uri() . '/css/admin.css', [ ], '1.0.0', 'all' );

	// JavaScripts
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array( 'jquery' ), '3.1.1', true ); // we need the jquery library for bootsrap js to function
	wp_enqueue_script( 'bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true ); // all the bootstrap javascript goodness
	wp_enqueue_script( 'adminjs', get_template_directory_uri() . '/js/admin.js', [ 'jquery' ], '1.0.0', true );

});



// Register the sidebar
add_action( 'widgets_init', function () {
	register_sidebar( [
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'class'         => 'custom',   // WP renders this as 'sidebar-custom'
		'description'   => 'Standard Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	] );
} );

// Add page to set theme options
add_action( 'admin_menu', function () {
	add_options_page( 'Coffee Coffee Theme Options', 'Theme Options', 'manage_options', 'coffee-coffee-identifier', function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page' ) );
		}
		get_template_part( 'theme', 'options' );
	} );
} );


// ref: http://wordpress.stackexchange.com/questions/121489/split-content-and-gallery
function strip_shortcode_gallery( $content ) {
	preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

	if ( ! empty( $matches ) ) {
		foreach ( $matches as $shortcode ) {
			if ( 'gallery' === $shortcode[2] ) {
				$pos = strpos( $content, $shortcode[0] );
				if ( false !== $pos ) {
					return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
				}
			}
		}
	}

	return $content;
}