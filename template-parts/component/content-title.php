<?php
/**
 * @Component: title
 */
if ( have_rows( "group_content_repeater_heading_group" )) : while ( have_rows( "group_content_repeater_heading_group" )) : the_row();
    $content_title_switch_query = get_sub_field( "group_content_repeater_heading_group_title_switch_query" );
    $content_view_sub_title_query = get_sub_field( "group_content_repeater_heading_group_view_sub_title_query" );
    if ( $content_title_switch_query === "heading" ) :
        $content_title_html = '<header class="page-title">';
        $content_title_html .= '<'. get_sub_field( "group_content_repeater_heading_group_title_heading_size_select" ) .' class="title-' . get_sub_field( "group_content_repeater_heading_group_title_heading_size_select" ) . '">' . esc_html__( get_sub_field( "group_content_repeater_heading_group_title" ), "start-theme-kit" ) . '</' . get_sub_field( "group_content_repeater_heading_group_title_heading_size_select" ) . '>';
        $content_title_html .= '</header>';
        if ( $content_view_sub_title_query === true ) :
            $content_sub_title_html = '<div class="header-sub-title">' . get_sub_field( "group_content_repeater_heading_group_sub_title" ) . '</div>';
            echo $content_sub_title_html;
        endif;
        echo $content_title_html;
    else :
        $content_title_html = '<header class="page-title">';
        $content_title_html .= '<div class="title-' . get_sub_field( "group_content_repeater_heading_group_title_heading_size_select" ) . '">' . esc_html__( get_sub_field( "group_content_repeater_heading_group_title" ), "start-theme-kit" ) . '</div>';
        $content_title_html .= '</header>';
        if ( $content_view_sub_title_query === true ) :
            $content_sub_title_html = '<div class="header-sub-title">' . get_sub_field( "group_content_repeater_heading_group_sub_title" ) . '</div>';
            echo $content_sub_title_html;
        endif;
        echo $content_title_html;
    endif;
endwhile; endif;
