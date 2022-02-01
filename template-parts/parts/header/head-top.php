<meta charset="UTF-8">
<?php
$pages_meta_seo_group = get_field( "pages_meta_seo_group" );
$additions_header_group = get_field( "additions_header_group", "option" );
// Title
if ( $pages_meta_seo_group[ "pages_meta_seo_group_view_meta_query" ] === true && $additions_header_group[ "additions_header_group_meta_seo_view_meta_query" ] === true ) :
    $title = '<title>';
    if ( !empty( $pages_meta_seo_group[ "pages_meta_seo_group_meta_title" ])) :
        $title .= esc_html__( get_bloginfo( "name" ) . ' - ' . $pages_meta_seo_group[ "pages_meta_seo_group_meta_title" ], "start-theme-kit" );
    else :
        $title .= esc_html__( get_bloginfo( "name" ) . ' - ' . $additions_header_group[ "additions_header_group_meta_seo_title" ], "start-theme-kit" );
    endif;
    $title .= '</title>';
    echo $title;
elseif ( is_single()) :
    $title = '<title>';
    $title .= esc_html__( get_bloginfo( "name" ) . ' - ' . get_the_title(), "start-theme-kit" );
    $title .= '</title>';
    echo $title;
else :
    $title = '<title>';
    if ( !empty( $additions_header_group[ "additions_header_group_meta_seo_title" ])) :
        $title .= esc_html__( get_bloginfo( "name" ) . ' - ' . $additions_header_group[ "additions_header_group_meta_seo_title" ], "start-theme-kit" );
    endif;
    $title .= '</title>';
    echo $title;
endif;

// Description
if ( $pages_meta_seo_group[ "pages_meta_seo_group_view_meta_query" ] === true && $additions_header_group[ "additions_header_group_meta_seo_view_meta_query" ] === true ) :
    if ( !empty( $pages_meta_seo_group[ "pages_meta_seo_group_meta_description" ])) :
        $description = '<meta name="description" content="' . esc_html__( $pages_meta_seo_group[ "pages_meta_seo_group_meta_description" ], "start-theme-kit" ) . '">';
    else :
        $description = '<meta name="description" content="' . esc_html__( $additions_header_group[ "additions_header_group_meta_seo_description" ], "start-theme-kit" ) . '">';
    endif;
    echo $description;
endif;

// Keywords
if ( $pages_meta_seo_group[ "pages_meta_seo_group_view_meta_query" ] === true && $additions_header_group[ "additions_header_group_meta_seo_view_meta_query" ] === true ) :
    if ( !empty( $pages_meta_seo_group[ "pages_meta_seo_group_meta_keywords" ])) :
        $keywords = '<meta name="keywords" content="' . esc_html__( $pages_meta_seo_group[ "pages_meta_seo_group_meta_keywords" ], "start-theme-kit" ) . '">';
    else :
        $keywords = '<meta name="keywords" content="' . esc_html__( $additions_header_group[ "additions_header_group_meta_seo_keywords" ], "start-theme-kit" ) . '">';
    endif;
    echo $keywords;
endif;

// Robots
if ( $pages_meta_seo_group[ "pages_meta_seo_group_view_meta_query" ] === true && $additions_header_group[ "additions_header_group_meta_seo_view_meta_query" ] === true ) :
    if ( !empty( $pages_meta_seo_group[ "pages_meta_seo_group_meta_robots_repeater" ])) :
        $pages_meta_seo_group_meta_robots_repeater = $pages_meta_seo_group[ "pages_meta_seo_group_meta_robots_repeater" ];
        for ( $index_robots = 0; $index_robots < count( $pages_meta_seo_group_meta_robots_repeater ); $index_robots++ ) :
            $robots = '<meta name="robots" content="' . esc_html__( $pages_meta_seo_group_meta_robots_repeater[ $index_robots ][ "pages_meta_seo_group_meta_robots_content" ], "start-theme-kit" ) . '">';
            echo $robots;
        endfor;
    elseif ( !empty( $additions_header_group[ "additions_header_group_meta_seo_robots_repeater" ])) :
        $additions_header_group_meta_seo_robots_repeater = $additions_header_group[ "additions_header_group_meta_seo_robots_repeater" ];
        for ( $index_robots = 0; $index_robots < count( $additions_header_group_meta_seo_robots_repeater ); $index_robots++ ) :
            $robots = '<meta name="robots" content="' . esc_html__( $additions_header_group_meta_seo_robots_repeater[ $index_robots ][ "additions_header_group_meta_seo_robots_repeater_content" ], "start-theme-kit" ) . '">';
            echo $robots;
        endfor;
    endif;
endif;

if ( is_single() && have_rows( "section_flexible" )) : while ( have_rows( "section_flexible" )) : the_row();
    if ( !empty( get_sub_field( "section_flexible_options_group_content_repeater" ))) :
        $section_flexible_options_group_content_repeater = get_sub_field( "section_flexible_options_group_content_repeater" ); ?>
        <meta property="og:url"           content="<?= get_permalink(); ?>" />
        <meta property="og:type"          content="<?= get_bloginfo( 'name' ); ?>" />
        <meta property="og:title"         content="<?= get_the_title(); ?>" />
    <?php endif;

    if ( have_rows( "section_flexible_options_group_content_repeater" )) : while ( have_rows( "section_flexible_options_group_content_repeater" )) : the_row();
        if ( get_row_index() === 2 ) :
            $group_content_repeater_textarea = get_sub_field( "group_content_repeater_textarea" ); ?>
            <meta property="og:description"   content="<?php the_truncated_post( $group_content_repeater_textarea, 200 ); ?>" />
        <?php endif;
    endwhile; endif;

    if ( !empty( get_sub_field( "section_flexible_options_group" )[ "section_flexible_options_group_thumbnails_group" ][ "section_flexible_options_group_thumbnails_url" ])) :
        $section_flexible_options_group_thumbnails_url = get_sub_field( "section_flexible_options_group" )[ "section_flexible_options_group_thumbnails_group" ][ "section_flexible_options_group_thumbnails_url" ]; ?>
        <meta property="og:image"     content="<?= $section_flexible_options_group_thumbnails_url; ?>" />
    <?php endif;

endwhile; endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1">

