<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Start_theme_kit
 */

?>

<article <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>
    <div class="entry-summary">
        <?php if ( have_rows( "section_flexible" )) : while ( have_rows( "section_flexible" )) : the_row();
            if ( get_row_index() ) :
                if ( have_rows( 'section_flexible_options_group_content_repeater' )) :
                    while ( have_rows( 'section_flexible_options_group_content_repeater' )) {
                        the_row();
                        if ( get_row_index()) {
                            $content_select = get_sub_field( "group_content_repeater_select" );

                            if ( $content_select === "Category" ) :

                                get_template_part( "template-parts/component/content", "category" );

                            endif;
                        }
                    }
                endif;
            endif;
        endwhile; endif;
        ?>
    </div>
</article>
