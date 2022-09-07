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
            'sanitize_callback' => 'sanitize_text_field', //Returns positive integer
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

}
add_action ( 'customize_register', 'fancy_lab_customizer');