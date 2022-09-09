<?php 
/**
 * Fancy lab Theme Customizer
 * 
 * @package Fancy Lab By Rix
 */

function fancy_lab_customizer( $wp_customize ) {
    
    //Copyright Section

    $wp_customize->add_section(
        'sec_copyright', array(
            'title' => 'Copyright Settings',
            'description' => 'Copyright Section',
        )
    );

            //Field 1 - Copyright Text Box
            $wp_customize->add_setting(
                'set_copyright', array(
                    'type' => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_copyright', array(
                    'label' => 'Copyright',
                    'description' => 'Please, add your copyright info here',
                    'section' => 'sec_copyright',
                    'type' => 'text',
                )
            );

    /**--------------------------------------------- */
    //Slider Section
    $wp_customize->add_section(
        'sec_slider',
        array(
            'title' => 'Slider Settings',
            'description' => 'Slider Section',
        )
    );

    //Field 1 - Slider Page Number 1
    $wp_customize->add_setting(
        'set_slider_page1',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_page1',
        array(
            'label' => 'Set Slider Page 1',
            'description' => 'Set Slider Page 1',
            'section' => 'sec_slider',
            'type' => 'dropdown-pages',
        )
    );

    //Field 2 - Slider Button Text Number 1
    $wp_customize->add_setting(
        'set_slider_button_text1',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text1',
        array(
            'label' => 'Button text for Page 1',
            'description' => 'Button text for Page 1',
            'section' => 'sec_slider',
            'type' => 'text',
        )
    );

    //Field 3 - Slider Button URL Number 1
    $wp_customize->add_setting(
        'set_slider_button_url1',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_button_url1',
        array(
            'label' => 'URL for Page 1',
            'description' => 'URL for Page 1',
            'section' => 'sec_slider',
            'type' => 'url',
        )
    );  


    //Field 1 - Slider Page Number 2
    $wp_customize->add_setting(
        'set_slider_page2',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_page2',
        array(
            'label' => 'Set Slider Page 2',
            'description' => 'Set Slider Page 2',
            'section' => 'sec_slider',
            'type' => 'dropdown-pages',
        )
    );

    //Field 2 - Slider Button Text Number 2
    $wp_customize->add_setting(
        'set_slider_button_text2',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text2',
        array(
            'label' => 'Button text for Page 2',
            'description' => 'Button text for Page 2',
            'section' => 'sec_slider',
            'type' => 'text',
        )
    );

    //Field 3 - Slider Button URL Number 2
    $wp_customize->add_setting(
        'set_slider_button_url2',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_button_url2',
        array(
            'label' => 'URL for Page 2',
            'description' => 'URL for Page 2',
            'section' => 'sec_slider',
            'type' => 'url',
        )
    );


    //Field 1 - Slider Page Number 3
    $wp_customize->add_setting(
        'set_slider_page3',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_page3',
        array(
            'label' => 'Set Slider Page 3',
            'description' => 'Set Slider Page 3',
            'section' => 'sec_slider',
            'type' => 'dropdown-pages',
        )
    );

    //Field 3 - Slider Button Text Number 3
    $wp_customize->add_setting(
        'set_slider_button_text3',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field', 
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text3',
        array(
            'label' => 'Button text for Page 3',
            'description' => 'Button text for Page 3',
            'section' => 'sec_slider',
            'type' => 'text',
        )
    );

    //Field 3 - Slider Button URL Number 3
    $wp_customize->add_setting(
        'set_slider_button_url3',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_slider_button_url3',
        array(
            'label' => 'URL for Page 3',
            'description' => 'URL for Page 3',
            'section' => 'sec_slider',
            'type' => 'url',
        )
    );

    /**--------------------------------------------- */
    //Homepage Settings
    $wp_customize->add_section(
        'sec_home_page',
        array(
            'title' => 'Home Page Products and Blog Settings',
            'description' => 'Home Page Settings Section',
        )
    );

    //Popular Products Title
    $wp_customize->add_setting(
        'set_popular_products_title', array(
            'type' => 'theme_mod',
            'default' => 'Popular Products',
            'sanitize_callback' => 'sanitize_text_field',
        )
        );

    $wp_customize->add_control(
        'set_popular_products_title', array(
            'label' => 'Add Popular Products Section Title',
            'description' => 'Default: Popular Products',
            'section' => 'sec_home_page',
            'type' => 'text',
        )
        );

    //Setting 1 - Popular Products Max Number
    $wp_customize->add_setting(
        'set_popular_max_num',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_popular_max_num',
        array(
            'label' => 'Popular Products Max Number',
            'description' => 'Popular Products Max Number (Default: 4)',
            'section' => 'sec_home_page',
            'type' => 'number',
        )
    );

    //Setting 2 - Popular Products Max Column Number
    $wp_customize->add_setting(
        'set_popular_max_col',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_popular_max_col',
        array(
            'label' => 'Popular Products Max Columns',
            'description' => 'Popular Products Max Columns (Default: 4)',
            'section' => 'sec_home_page',
            'type' => 'number',
        )
    );

    //New Arrivals Title
    $wp_customize->add_setting(
        'set_new_arrivals_title',
        array(
            'type' => 'theme_mod',
            'default' => 'New Arrivals',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'set_new_arrivals_title',
        array(
            'label' => 'Add New Arrivals Section Title',
            'description' => 'Default: New Arrivals',
            'section' => 'sec_home_page',
            'type' => 'text',
        )
    );

    //Setting 2 - New Arrivals Max Number
    $wp_customize->add_setting(
        'set_new_arrivals_max_num',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_new_arrivals_max_num',
        array(
            'label' => 'New Arrivals Max Number',
            'description' => 'New Arrivals Max Number (Default: 4)',
            'section' => 'sec_home_page',
            'type' => 'number',
        )
    );

    //Setting 2 - New Arrivals Max Column Number
    $wp_customize->add_setting(
        'set_new_arrivals_max_col',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
        )
    );

    $wp_customize->add_control(
        'set_new_arrivals_max_col',
        array(
            'label' => 'New Arrivals Max Columns',
            'description' => 'New Arrivals Max Columns (Default: 4)',
            'section' => 'sec_home_page',
            'type' => 'number',
        )
    );

    //DEAL OF THE WEEK CHECKBOX
    $wp_customize->add_setting(
        'show_deal_of_the_week',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'fancy_lab_sanitize_checkbox', //Custom function below to sanitize checkbox input
        )
    );

    $wp_customize->add_control(
        'show_deal_of_the_week',
        array(
            'label' => 'Show Deal of the Week?',
            'description' => 'Checked = show, Unchecked = Do Not Show',
            'section' => 'sec_home_page',
            'type' => 'checkbox',
        )
    );

    //Deal of the week Title
    $wp_customize->add_setting(
        'set_dotw_title',
        array(
            'type' => 'theme_mod',
            'default' => 'Deal of the Week',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'set_dotw_title',
        array(
            'label' => 'Add Deal of the Week Section Title',
            'description' => 'Default: Deal of the Week',
            'section' => 'sec_home_page',
            'type' => 'text',
        )
    );


    //DEAL OF THE WEEK PRODUCT ID
    $wp_customize->add_setting(
        'set_deal_of_the_week_id',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint', //Returns positive integer
            'validate_callback' => 'validate_sale_price',
        )
    );

    $wp_customize->add_control(
        'set_deal_of_the_week_id',
        array(
            'label' => 'DEAL OF THE WEEK PRODUCT ID',
            'description' => 'DEAL OF THE WEEK PRODUCT ID',
            'section' => 'sec_home_page',
            'type' => 'number',
        )
    );

    //Blog Section Title
    $wp_customize->add_setting(
        'set_blog_title',
        array(
            'type' => 'theme_mod',
            'default' => 'News From Our Blog',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'set_blog_title',
        array(
            'label' => 'Add Blog Section Title',
            'description' => 'Default: Deal of the Week',
            'section' => 'sec_home_page',
            'type' => 'text',
        )
    );

   

}
add_action ( 'customize_register', 'fancy_lab_customizer');

function fancy_lab_sanitize_checkbox( $checked ) {
    return ((isset($checked) && true == $checked ) ? true : false );
}

function validate_sale_price( $validity, $product ) {
    $sale_validation = get_post_meta( $product, '_sale_price', true );
    if ( empty( $sale_validation ) ) {
        $validity->add( 'sale_price_not_set', sprintf( __('Please Add Sale Price - Product ID: %1$s', 'fancy-lab'), $product) );
    }
    return $validity;
}