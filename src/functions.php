<?php


//require get_template_directory() . '/inc/function-admin.php';


add_action('after_setup_theme', function () {
    add_theme_support('menus');
    register_nav_menu('primary', 'Header Navigation');
    register_nav_menu('super-header', 'Above Header Navigation');
    register_nav_menu('footer', 'Footer Navigation');
});


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('coffeestyle', get_template_directory_uri() . '/css/coffee-coffee.css', [], '1.0.0', 'all');
    wp_enqueue_script('coffeejs', get_template_directory_uri() . '/js/coffee-coffee.js', ['jquery'], '1.0.0', true);
});

