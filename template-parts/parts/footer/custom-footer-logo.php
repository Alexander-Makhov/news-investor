<?php
$pages_footer_custom_logo_group = get_field( "pages_footer_custom_logo_group", "option" );
$additions_footer_group = get_field( "additions_footer_group", "option" );
if ( !empty( $additions_footer_group[ "additions_footer_group_logo_group" ])) :
    $additions_footer_group_logo_group = $additions_footer_group[ "additions_footer_group_logo_group" ];
    if ( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_query" ] === true && !empty( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_images" ]) ) :
        if ( is_front_page() || is_home()) :
            echo '<div class="site-branding">';
                echo '<span class="site-theme-logotype">';
                    echo '<img class="img" src="'. $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_images" ] .'" alt="' . esc_html__( !empty( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ]) ? $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ] : get_bloginfo(), "start-theme-kit" ) . '" title="' . esc_html__( !empty( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ]) ? $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ] : get_bloginfo(), "start-theme-kit" ) . '">';
                echo '</span>';
            echo '</div>';
        else :
            echo '<div class="site-branding">';
                echo '<a class="site-theme-logotype" href="'. esc_url( home_url( '/' )) .'" rel="home">';
                    echo '<img class="img" src="'. $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_images" ] .'" alt="' . esc_html__( !empty( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ]) ? $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ] : get_bloginfo(), "start-theme-kit" ) . '" title="' . esc_html__( !empty( $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ]) ? $additions_footer_group_logo_group[ "additions_footer_group_logo_group_view_custom_logo_alt" ] : get_bloginfo(), "start-theme-kit" ) . '">';
                echo '</a>';
            echo '</div>';
        endif;
    else :
        $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

        if ( $custom_logo__url !== false ) :
            for ( $index_logo = 0; $index_logo < count( $custom_logo__url ) && is_array( $custom_logo__url ); $index_logo++ ) :
                if ( $custom_logo__url[ $index_logo ] !== false ) :
                    if ( is_front_page() || is_home()) :
                        $logo_html = '<div class="site-branding">';
                            $logo_html .= '<span class="site-theme-logotype">';
                            if ( !empty( $custom_logo__url[ $index_logo ] )) :
                                $logo_html .= '<img class="img" src="'. $custom_logo__url[ $index_logo ] .'" alt="' . get_bloginfo() . '" title="' . get_bloginfo() . '">';
                            endif;
                            $logo_html .= '</span>';
                        $logo_html .= '</div>';
                        echo $logo_html;
                    else :
                        $logo_html = '<div class="site-branding">';
                            $logo_html .= '<a class="site-theme-logotype" href="'. esc_url( home_url( '/' )) .'" rel="home">';
                            if ( !empty( $custom_logo__url[ $index_logo ] )) :
                                $logo_html .= '<img class="img" src="'. $custom_logo__url[ $index_logo ] .'" alt="' . get_bloginfo() . '" title="' . get_bloginfo() . '">';
                            endif;
                            $logo_html .= '</a>';
                        $logo_html .= '</div>';
                        echo $logo_html;
                    endif;
                endif;
            endfor;
        endif;
    endif;
endif;
