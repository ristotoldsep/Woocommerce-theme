<?php

/**
 * Fancy Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fancy Lab By RIX
 */

function fancy_lab_scripts() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri( ) . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true ); //Bootstrap JS
    wp_enqueue_style( 'bootstrap.css', get_template_directory_uri() . '/inc/bootstrap.min.css', '4.3.1','all' ); //Bootstrap CSS

    wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' ); //FILEMTIME TO DISABLE BROWSER CACHE (only during development)
}

add_action('wp_enqueue_scripts', 'fancy_lab_scripts');

function fancy_lab_config() {
    register_nav_menus(
        array(
            'fancy_lab_main_menu' => 'Fancy Lab Main Menu',
            'fancy_lab_footer_menu' => 'Fancy Lab Footer Menu'
        )
    );
}

add_action('after_setup_theme','fancy_lab_config',0 );

?>