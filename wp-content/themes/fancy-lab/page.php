<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fancy Lab By Rix
 */

get_header();
?>
<div class="content-area">
    <main>
        <div class="container">
            <div class="row">
                <?php
                // Load posts loop
                while (have_posts()) : the_post();
                ?>
                    <article class="col">
                        <h1><?php the_title(); ?></h1>
                        <div><?php the_content(); ?></div>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </article>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>