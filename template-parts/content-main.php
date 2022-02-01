<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Start_theme_kit
 */
if ( have_rows( "section_flexible" )) : while ( have_rows( "section_flexible" )) : the_row();
    if ( get_row_index() ) :
        $section_options = get_sub_field( "section_flexible_options_group" );

        $options_fullwidth = $section_options[ "section_flexible_options_group_fullwidth" ];
        $options_css_class = $section_options[ "section_flexible_options_group_css_class" ];
        $options_view_background_query = $section_options[ "section_flexible_options_group_view_background_images_query" ];
        $options_background_images = $section_options[ "section_flexible_options_group_background_images_group" ];
        $options_view_background_parallax_query = $section_options[ "section_flexible_options_group_background_images_group" ][ "section_flexible_options_group_background_images_parallax_query" ];
        $options_content_repeater = get_sub_field( "section_flexible_options_group_content_repeater" );
        $options_category_text = explode( '-', $options_css_class ); ?>
        <section
            class="section section-<?= get_row_index(); ?><?= !empty( $options_css_class ) ? ' ' . $options_css_class : ''; ?>"
            data-after-text="<?= !empty( $options_category_text[0] ) ? esc_html__( ucfirst( $options_category_text[0]), "start-theme-kit" ) : ''; ?>"
            data-before-text="<?= !empty( $options_category_text[1] ) ? esc_html__( ucfirst( $options_category_text[1]), "start-theme-kit" ) : ''; ?>"
            <?= $options_view_background_parallax_query ? $options_view_background_query === true && !empty( $options_background_images[ "section_flexible_options_group_background_images_url" ]) ? 'style="background:url('. $options_background_images[ "section_flexible_options_group_background_images_url" ] .')no-repeat center center; background-attachment: fixed;"' : '' : 'style="background:url('. $options_background_images[ "section_flexible_options_group_background_images_url" ] .')no-repeat center center;"'; ?>
        >
            <div class="<?= $options_fullwidth === true ? 'container-fullwidth' : 'container' ?>">
                <?php
                if ( $options_view_background_query === true ) : ?>
                    <div class="parallax-background-content">
                <?php endif;
                    if ( have_rows( 'section_flexible_options_group_content_repeater' )) :
                        while ( have_rows( 'section_flexible_options_group_content_repeater' )) {
                            the_row();
                            if ( get_row_index()) {
                                $content_select = get_sub_field( "group_content_repeater_select" );

                                if ( $content_select === "Title" ) :

                                    get_template_part( "template-parts/component/content", "title" );

                                elseif ( $content_select === "Textarea" ) :

                                    get_template_part( "template-parts/component/content", "textarea" );

                                elseif ( $content_select === "Images" ) :

                                    get_template_part( "template-parts/component/content", "images" );

                                elseif ( $content_select === "Shortcode" ) :

                                    get_template_part( "template-parts/component/content", "shortcode" );

                                elseif ( $content_select === "Share button" ) :

                                    get_template_part( "template-parts/component/content", "share-button" );

                                elseif ( $content_select === "Button/Links" ) :

                                    get_template_part( "template-parts/component/content", "button-links" );

                                elseif ( $content_select === "Category" ) :

                                    get_template_part( "template-parts/component/content", "category" );

                                endif;
                            }
                        }
                    endif;
                if ( $options_view_background_query === true ) : ?>
                    </div>
                <?php endif;
                if ( is_single()) : ?>
                    <nav class="post-nav">
                        <ul class="nav-pages">
                            <li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
                            <li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </section>
    <?php endif;
endwhile; endif; ?>
