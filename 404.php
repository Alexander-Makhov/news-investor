<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Start_theme_kit
 */
get_header(); ?>
    <div class="content section error-404 not-found">
        <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'main' );

        endwhile; // End of the loop. ?>
        <div class="container">
            <div class="page-title title-h2">
                <h2 class="title-h2">Page not found.</h2>
            </div>
            <div class="link-inner">
                <a class="link-item item--pages" href="/">
                    <span><?= esc_html__( "Back to home page.", "start-theme-kit" ); ?></span>
                </a>
            </div>
        </div>
    </div>

    </main>
<?php get_footer();
