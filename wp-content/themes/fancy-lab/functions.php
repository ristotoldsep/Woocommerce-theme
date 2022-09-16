<?php

/**
 * Fancy Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fancy Lab By RIX
 */

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    if (!file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
        // File does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }
}
add_action('after_setup_theme', 'register_navwalker');

// Creating Custom customizer panels - for learning!
require_once get_template_directory() . '/inc/customizer.php';

function fancy_lab_scripts()
{
    //Bootstrap js and css files
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '4.3.1', true); //Bootstrap JS
    wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/inc/bootstrap.min.css', '4.3.1', 'all'); //Bootstrap CSS

    //Main stylesheet
    wp_enqueue_style('fancy-lab-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all'); //FILEMTIME TO DISABLE BROWSER CACHE (only during development)

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script');

    // Flexslider Javascript and CSS files
    wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '', true);
    wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all');
    wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'fancy_lab_scripts');

function fancy_lab_config()
{
    register_nav_menus(
        array(
            'fancy_lab_main_menu' => __('Fancy Lab Main Menu', 'fancy-lab'),
            'fancy_lab_footer_menu' => __('Fancy Lab Footer Menu', 'fancy-lab'),
        )
    );


    //For translations and internationalization
    $textdomain = 'fancy-lab';
    load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages/' );
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/' );

    //Adding woocommerce support to the theme
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width'    => 255,
        'product_grid'          => array(
            'default_rows'    => 10,
            'min_rows'        => 5,
            'max_rows'        => 10,
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,
        )
    ));

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('custom-logo', array(
        'height' => 85,
        'width' => 160,
        'flex_height' => true,
        'flex_width' => true,
    ) );
    
    add_theme_support( 'post_thumbnails' );
    //Creating image sizes for slider
    add_image_size('fancy-lab-slider',1920, 800,array('center', 'center') );
    add_image_size('fancy-lab-blog',960, 640,array('center', 'center') );

    //Mandatory max content width by default
    if (!isset($content_width)) {
        $content_width = 600;
    }

    //Important for page title and SEO!
    add_theme_support( 'title-tag' );
}

add_action('after_setup_theme', 'fancy_lab_config', 0);

//Only load these if WC is activated
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment');

function fancy_lab_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

<?php
    $fragments['span.items'] = ob_get_clean();
    return $fragments;
}

//Register sidebars
add_action('widgets_init','fancy_lab_sidebars' );
function fancy_lab_sidebars() {
    register_sidebar( array(
        'name' => 'Fancy Lab Main Sidebar',
        'id' => 'fancy-lab-sidebar-1',
        'description' => 'Drag and drop your widgets here',
        'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name'            => 'Sidebar Shop',
        'id'            => 'fancy-lab-sidebar-shop',
        'description'    => 'Drag and drop your WooCommerce widgets here',
        'before_widget'    => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4 class="widget-title">',
        'after_title'    => '</h4>',
    ));
    register_sidebar(array(
        'name'            => 'Footer Sidebar 1',
        'id'            => 'fancy-lab-sidebar-footer1',
        'description'    => 'Drag and drop your widgets here',
        'before_widget'    => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4 class="widget-title">',
        'after_title'    => '</h4>',
    ));
    register_sidebar(array(
        'name'            => 'Footer Sidebar 2',
        'id'            => 'fancy-lab-sidebar-footer2',
        'description'    => 'Drag and drop your widgets here',
        'before_widget'    => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4 class="widget-title">',
        'after_title'    => '</h4>',
    ));
    register_sidebar(array(
        'name'            => 'Footer Sidebar 3',
        'id'            => 'fancy-lab-sidebar-footer3',
        'description'    => 'Drag and drop your widgets here',
        'before_widget'    => '<div id="%1$s" class="widget %2$s widget-wrapper">',
        'after_widget'    => '</div>',
        'before_title'    => '<h4 class="widget-title">',
        'after_title'    => '</h4>',
    ));
}



?>