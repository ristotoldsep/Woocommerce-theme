<?php

/**
 * Template Name: Home Page
 */
get_header();

?>

<div class="content-area">
    <main>
        <!-- SLIDER -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php

                    for ($i = 1; $i < 4; $i++) {
                        $slider_page[$i] = get_theme_mod('set_slider_page' . $i);
                        $slider_button_text[$i] = get_theme_mod('set_slider_button_text' . $i);
                        $slider_button_url[$i] = get_theme_mod('set_slider_button_url' . $i);
                    }

                    $args = array(
                        'post_type' => 'page',
                        'posts_per_page' => 3,
                        'post__in' => $slider_page,
                        'orderby' => 'post__in',
                    );

                    $slider_loop = new WP_Query($args);
                    $j = 1;
                    if ($slider_loop->have_posts()) :
                        while ($slider_loop->have_posts()) :
                            $slider_loop->the_post();
                    ?>
                            <li>
                                <?php
                                the_post_thumbnail('fancy-lab-slider', array('class' => 'img-fluid'));
                                ?>
                                <div class="container">
                                    <div class="slider-details-container">
                                        <div class="slider-title">
                                            <h1><?php the_title(); ?></h1>
                                        </div>
                                        <div class="slider-description">
                                            <div class="subtitle"><?php the_content(); ?></div>
                                            <a href="<?php echo esc_url( $slider_button_url[$j] ); ?>" class="link"><?php echo esc_html( $slider_button_text[$j] ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                            $j++;
                        //DONT FORGET TO ADD THIS, IN Case we need to use the default wp loop
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
            </div>
        </section>
        <?php if (class_exists('WooCommerce')) :

            $popular_products_title = get_theme_mod('set_popular_products_title', 'Popid tooted');
            $new_arrivals_title = get_theme_mod('set_new_arrivals_title', 'Uued tooted');

        ?>
            <section class="popular-products">
                <?php
                $popular_products_limit = esc_html( get_theme_mod('set_popular_max_num', 4) );
                $popular_col_limit = esc_html( get_theme_mod('set_popular_max_col', 4) );

                $new_arrivals_limit = esc_html( get_theme_mod('set_new_arrivals_max_num', 4) );
                $new_arrivals_col_limit = esc_html( get_theme_mod('set_new_arrivals_max_col', 4) );
                ?>
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo $popular_products_title; ?></h2>
                    </div>
                    <?php echo do_shortcode('[products limit=" ' . esc_attr( $popular_products_limit ) . ' " columns="' . esc_attr( $popular_col_limit ) . '" orderby="popularity"]'); ?>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo $new_arrivals_title; ?></h2>
                    </div>
                    <?php echo do_shortcode('[products limit="' . esc_attr( $new_arrivals_limit ) . '" columns="' . esc_attr( $new_arrivals_col_limit ) . '" orderby="date"]'); ?>
                </div>
            </section>
            <?php
            //DEAL OF THE WEEK

            $showdealoftheweek = get_theme_mod('show_deal_of_the_week', 0);
            $deal_of_the_week_title = esc_html( get_theme_mod('set_dotw_title', __('Deal of the Week', 'fancy-lab') ) );
            $deal_of_the_week_product_id = get_theme_mod('set_deal_of_the_week_id');
            $currency = get_woocommerce_currency_symbol();

            $regular_price = get_post_meta($deal_of_the_week_product_id, '_regular_price', true); //Single value last option
            $regular_price_int = (int) $regular_price;

            $sale_price = get_post_meta($deal_of_the_week_product_id, '_sale_price', true);
            $sale_price_int = (int) $sale_price;

            //For other products than just simple
            $price_variable = get_post_meta($deal_of_the_week_product_id, '_price', false);

            //Global woocommerce product
            $product = wc_get_product($deal_of_the_week_product_id);


            /* echo "<h1>" . $regular_price . "</h1>";
            echo gettype($regular_price) . "<br>";
            $regular_price_int = (int) $regular_price;
            echo gettype($regular_price_int);
            echo "<h1>" . $sale_price . "</h1>";
            echo gettype($sale_price) . "<br>";
            $sale_price_int = (int) $sale_price;
            echo gettype($sale_price_int); */

            if ($showdealoftheweek == 1 && (!empty($deal_of_the_week_product_id))) :
                if (!empty($regular_price_int) && !empty($sale_price_int)) :
                    $discount_percentage = absint(100 - (($sale_price_int / $regular_price_int) * 100));
                endif;
            ?>
                <section class="deal-of-the-week">
                    <div class="container">
                        <div class="section-title">
                            <h2><?php echo $deal_of_the_week_title; ?></h2>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="deal-img col-md-6 col-12 ml-auto text-center">
                                <?php echo get_the_post_thumbnail($deal_of_the_week_product_id, 'large', array('class' => 'img-fluid')); ?>
                            </div>
                            <div class="deal-desc col-md-4 col-12 mr-auto text-center">
                                <?php if ( !empty($sale_price_int) ) : ?>
                                    <span class="discount">
                                        <?php echo esc_html( $discount_percentage ) . esc_html__('% OFF', 'fancy-lab'); ?>
                                    </span>
                                <?php endif; ?>
                                <h3>
                                    <a href="<?php echo esc_url( get_permalink($deal_of_the_week_product_id) ); ?>"><?php echo esc_html( get_the_title( $deal_of_the_week_product_id ) ); ?></a>
                                </h3>
                                <p><?php echo esc_html( get_the_excerpt( $deal_of_the_week_product_id ) ); ?></p>
                                <div class="prices">
                                    <span class="regular">
                                        <?php
                                        // We only show prices for non-variable products
                                        if (!$product->is_type('variable')) {
                                            echo esc_html($currency);
                                            echo esc_html($regular_price_int);
                                        }
                                        ?>
                                    </span>
                                    <?php if (!empty($sale_price_int)) : ?>
                                        <span class="sale">
                                            <?php
                                            // We only show prices for non-variable products
                                            if (!$product->is_type('variable')) {
                                                echo esc_html($currency);
                                                echo esc_html($sale_price_int);
                                            }
                                            ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="sale">
                                            <?php
                                            // We need to care about variable products
                                            if ($product->is_type('variable')) {
                                                $i = 0;
                                                foreach ($price_variable as $variable) {
                                                    if ($i == 0 && ($product->get_variation_sale_price('max') != $product->get_variation_sale_price('min'))) {
                                                        echo esc_html($currency . $variable) . ' - ';
                                                    } else {
                                                        echo esc_html($currency . $variable);
                                                    }
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php if ($product->is_type('variable')) : ?>
                                    <a href="<?php echo esc_url(get_permalink($deal_of_the_week_product_id)) ?>" data-quantity="1" class="add-to-cart button product_type_variable add_to_cart_button" data-product_id="<?php echo esc_attr($deal_of_the_week_product_id); ?>" aria-label="Select options for “<?php echo esc_attr(get_the_title($deal_of_the_week_product_id)) ?>”" rel="nofollow"><?php esc_html_e('Select options', 'fancy-lab') ?></a>
                                <?php elseif ($product->is_type('external')) : ?>
                                    <a href="<?php echo esc_url(get_permalink($deal_of_the_week_product_id)) ?>" data-quantity="1" class="add-to-cart button product_type_variable add_to_cart_button" data-product_id="<?php echo esc_attr($deal_of_the_week_product_id); ?>" aria-label="View details for “<?php echo esc_attr(get_the_title($deal_of_the_week_product_id)) ?>”" rel="nofollow"><?php esc_html_e('View details', 'fancy-lab') ?></a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url('?add-to-cart=' . $deal_of_the_week_product_id); ?>" data-quantity="1" class="add-to-cart button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo esc_attr($deal_of_the_week_product_id); ?>" aria-label="Add “<?php echo esc_attr(get_the_title($deal_of_the_week_product_id)) ?>” to your cart" rel="nofollow"><?php esc_html_e('Add to Cart', 'fancy-lab') ?></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
        <section class="lab-blog">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo esc_html( get_theme_mod('set_blog_title', 'News From Our Blog') ); ?></h2>
                </div>
                <div class="row">
                    <?php

                    $args = array(
                        'post_type'            => 'post',
                        'posts_per_page'    => 3,
                    );

                    $blog_posts = new WP_Query($args);

                    // If there are any posts
                    if ($blog_posts->have_posts()) :

                        // Load posts loop
                        while ($blog_posts->have_posts()) : $blog_posts->the_post();
                    ?>
                            <article class="col-12 col-md-4">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail('fancy-lab-blog', array('class' => 'img-fluid'));
                                    endif;
                                    ?>
                                </a>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="excerpt"><?php the_excerpt(); ?></div>
                            </article>
                        <?php
                        endwhile;
                        wp_reset_postdata(); else :
                        ?>
                        <p><?php esc_html_e('Nothing to display', 'fancy-lab'); ?>.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>