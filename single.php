<?php
/**
 * The template for displaying all single posts
 * Template Name: Single post
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Start_theme_kit
 */

get_header(); ?>
        <div class="content single">
            <?php while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'main' );
            endwhile; // End of the loop. ?>
        </div>
	</main>
<?php get_footer();
