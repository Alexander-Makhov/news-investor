<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Start_theme_kit
 */

get_header(); ?>
		<div class="content search">
            <section class="section">
                <div class="container">
                    <?php if ( have_posts() ) : ?>
                        <header class="page-title">
                            <h1 class="title-h1">
                                <?php printf( esc_html__( 'Search Results for: %s', 'start-theme-kit' ), ' ' . get_search_query() ); ?>
                            </h1>
                        </header>
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'search' );
                        endwhile;
                        the_posts_navigation(); ?>
                    <?php else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif; ?>
                </div>
            </section>
        </div>

	</main>

<?php get_footer();
