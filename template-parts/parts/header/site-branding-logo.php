<div class="site-branding">
    <?php
    $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    $blog_name = get_bloginfo( 'name' );

    if ( $custom_logo__url !== false ) :
        for ( $index_logo = 0; $index_logo < count( $custom_logo__url ) && is_array( $custom_logo__url ); $index_logo++ ) :
            if ( $custom_logo__url[ $index_logo ] !== false ) :
                if ( is_front_page() || is_home()) :
                    $logo_html = '<span class="site-theme-logotype">';
                    if ( !empty( $custom_logo__url[ $index_logo ] )) :
                        $logo_html .= '<img class="img" src="'. $custom_logo__url[ $index_logo ] .'" alt="' . get_bloginfo() . '" title="' . get_bloginfo() . '">';
                    endif;
                    $logo_html .= '</span>';
                    echo $logo_html;
                else :
                    $logo_html = '<a class="site-theme-logotype" href="'. esc_url( home_url( '/' )) .'" rel="home">';
                    if ( !empty( $custom_logo__url[ $index_logo ] )) :
                        $logo_html .= '<img class="img" src="'. $custom_logo__url[ $index_logo ] .'" alt="' . get_bloginfo() . '" title="' . get_bloginfo() . '">';
                    endif;
                    $logo_html .= '</a>';
                    echo $logo_html;
                endif;
            endif;
        endfor;
    else :
        $logo_html = '<span class="site-theme-logotype">';
        $logo_html .= $blog_name;
        $logo_html .= '</span>';
        echo $logo_html;
    endif;
    $start_theme_kit_description = get_bloginfo( 'description', 'display' );
    if ( $start_theme_kit_description || is_customize_preview() ) :
        $desc_html = '<p class="site-description">'. $start_theme_kit_description .'</p>';
        echo $desc_html;
    endif; ?>
</div>
