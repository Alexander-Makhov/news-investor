<?php // Header background images switch slider and title page, sub title page.
$pages_header_images_switch_slider_group = get_field( "pages_header_images_switch_slider_group", get_the_ID() );
$pages_header_title_group = get_field( "pages_header_title_group", get_the_ID() );
$additions_header_group = get_field( "additions_header_group", "option" );

?>
<section class="section section-header">
    <div class="header-heading">
        <div class="container">
            <div class="heading-row">
                <?php if ( !is_page( 21 ) && !is_404()) : ?>
                <div class="heading-col">
                <?php endif; ?>
                    <div class="heading">
                        <?php
                        if ( !is_404()) :
                            // Title page and sub title.
                            if ( $pages_header_title_group[ "pages_header_title_group_view_title_query" ] === true ) :
                                $pages_header_title_group_title_switch_query = $pages_header_title_group[ "pages_header_title_group_title_switch_query" ];
                                if ( $pages_header_title_group_title_switch_query === "div" ) : ?>
                                    <div class="header-title title-<?= $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ]; ?>">
                                        <span class="title-<?= $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ]; ?>" ><?= esc_html__( $pages_header_title_group[ "pages_header_title_group_title" ], "start-theme-kit" ); ?></span>
                                    </div>
                                    <div class="header-sub-title">
                                        <?= esc_html__( $pages_header_title_group[ "pages_header_title_group_sub_title" ], "start-theme-kit" ); ?>
                                    </div>
                                <?php else :
                                    echo '<' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . ' class="header-title title-' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . '"><span class="title-' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . '">' . esc_html__( $pages_header_title_group[ "pages_header_title_group_title" ], "start-theme-kit" ) . '</span></' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . '>';
                                    echo '<div class="header-sub-title">' . esc_html__( $pages_header_title_group[ "pages_header_title_group_sub_title" ], "start-theme-kit" ) . '</div>';
                                endif;
                            elseif ( $additions_header_group[ "additions_header_group_view_title_page_query" ] === true ) :
                                $additions_header_group_title_page_switch_query = $additions_header_group[ "additions_header_group_view_title_page_query" ];
                                if ( $additions_header_group_title_page_switch_query === "div" ) : ?>
                                    <div class="header-title title-<?= $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ]; ?>">
                                        <span class="title-<?= $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ]; ?>" ><?= esc_html__( $pages_header_title_group[ "additions_header_group_title" ], "start-theme-kit" ); ?></span>
                                    </div>
                                    <div class="header-sub-title">
                                        <?= esc_html__( $pages_header_title_group[ "additions_header_group_sub_title" ], "start-theme-kit" ); ?>
                                    </div>
                                <?php else :
                                    echo '<' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . ' class="header-title title-' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . '">' . esc_html__( $pages_header_title_group[ "additions_header_group_title" ], "start-theme-kit" ) . '</' . $pages_header_title_group[ "pages_header_title_group_title_heading_size_select" ] . '>';
                                    echo '<div class="header-sub-title">' . esc_html__( $pages_header_title_group[ "additions_header_group_sub_title" ], "start-theme-kit" ) . '</div>';
                                endif;
                            endif;
                        else : ?>
                            <h1 class="header-title">
                                <span class="page-title title-h1" style="font-weight: 900;"><?= $error_message = "Error 404"; esc_html__( $error_message, "start-theme-kit" ); ?></span>
                            </h1>
                        <?php endif; ?>
                    </div>
                <?php if ( !is_page( 21 ) && !is_404()) : ?>
                </div>
                <?php endif; if ( !is_page( 21 ) && !is_404()) : ?>
                    <div class="heading-col">
                        <div class="form-inner subscribe">
                            <div class="form-subscribe-title"><?= esc_html__( "Subscribe", "start-theme-kit" ); ?></div>
                            <?= do_shortcode( '[contact-form-7 id="31" title="Subscribe"]' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php // Images switch slider.
    if ( $pages_header_images_switch_slider_group[ "pages_header_view_images_switch_slider_query" ] === true ) :
        if ( $pages_header_images_switch_slider_group[ "pages_header_images_switch_slider_query" ] === "Images" ) :
            $pages_header_images_group = $pages_header_images_switch_slider_group[ "pages_header_images_group" ];
            if ( !empty( $pages_header_images_group[ "pages_header_images_url" ] )) : ?>
                <figure class="header-background-images">
                    <img class="img" src="<?= $pages_header_images_group[ "pages_header_images_url" ]; ?>" alt="<?= esc_html__( $pages_header_images_group[ "pages_header_images_alt" ], 'start-theme-kit' ); ?>">
                </figure>
            <?php endif;
        else :
            if ( $pages_header_images_switch_slider_group[ "pages_header_images_switch_slider_query" ] === "Slider" ) :
                if ( !empty( $pages_header_images_switch_slider_group[ "pages_header_slider_repeater" ]) ) :
                    $pages_header_slider_repeater = $pages_header_images_switch_slider_group[ "pages_header_slider_repeater" ]; ?>
                    <div class="slider-inner pages-header-slider">
                        <div class="slider-item">
                            <?php for ( $index = 0; $index < count( $pages_header_slider_repeater ); $index++ ) : ?>
                                <figure class="slide-item">
                                    <img class="img" src="<?= $pages_header_slider_repeater[ $index ][ "pages_header_slider_repeater_url" ]; ?>" alt="<?= esc_html__( $pages_header_slider_repeater[ $index ][ "pages_header_slider_repeater_alt" ], "start-theme-kit" ); ?>" title="<?= esc_html__( $pages_header_slider_repeater[ $index ][ "pages_header_slider_repeater_alt" ], "start-theme-kit" ); ?>">
                                </figure>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endif;
            endif;
        endif;
    elseif ( $additions_header_group[ "additions_header_group_view_images_switch_slider_query" ] === true ) :
        if ( $additions_header_group[ "additions_header_group_images_switch_slider_query" ] === "Images" ) :
            $additions_header_group_images_group = $additions_header_group[ "additions_header_group_images_group" ];
            if ( !empty( $additions_header_group_images_group[ "addition_header_images_url" ] )) : ?>
                <figure class="header-background-images">
                    <img class="img" src="<?= $additions_header_group_images_group[ "addition_header_images_url" ]; ?>" alt="<?= esc_html__( $additions_header_group_images_group[ "addition_header_images_alt" ], 'start-theme-kit' ); ?>" title="<?= esc_html__( $additions_header_group_images_group[ "addition_header_images_alt" ], 'start-theme-kit' ); ?>">
                </figure>
            <?php endif;
        else :
            if ( !empty( $additions_header_group[ "additions_header_group_slider_repeater" ]) ) :
                $additions_header_group_slider_repeater = $additions_header_group[ "additions_header_group_slider_repeater" ]; ?>
                <div class="slider-inner addition-header-slider">
                    <div class="slider-item">
                        <?php for ( $index = 0; $index < count( $additions_header_group_slider_repeater ); $index++ ) : ?>
                            <figure class="slide-item">
                                <img class="img" src="<?= $additions_header_group_slider_repeater[ $index ][ "addition_header_slider_repeater_url" ]; ?>" alt="<?= esc_html__( $additions_header_group_slider_repeater[ $index ][ "addition_header_slider_repeater_alt" ], "start-theme-kit" ); ?>" title="<?= esc_html__( $additions_header_group_slider_repeater[ $index ][ "addition_header_slider_repeater_alt" ], "start-theme-kit" ); ?>">
                            </figure>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif;
        endif;
    endif; ?>
</section>
