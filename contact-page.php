<?php
/**
 * The template for displaying all pages
 * Template Name: Contact Us
 * Template Post Type: post, page, event, product
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Start_theme_kit
 */

get_header(); ?>
        <div class="content content-contact">
            <?php while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'main' );

                get_template_part( 'template-parts/content', 'contact-us' );

            endwhile; // End of the loop. ?>
        </div>

	</main>
<?php get_footer();
