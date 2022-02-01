<?php
/**
 * @Component: images
 */
$content_images = get_sub_field( "group_content_repeater_images_group" );
$images_html = '<figure class="section--view-images">';

if ( $content_images[ "group_content_repeater_images_group_parallax_effect_query" ] === true ) :
    $images_html .= '<span class="images-parallax" style="background: url(' . $content_images[ "group_content_repeater_images_group_url" ] . ')no-repeat center center;"></span>';
else :
    $images_html .= '<img class="img parallax" src="' . $content_images[ "group_content_repeater_images_group_url" ] . '" alt="' . $content_images[ "group_content_repeater_images_group_alt" ] . '" title="' . $content_images[ "group_content_repeater_images_group_alt" ] . '">';
endif;

if ( $content_images[ "group_content_repeater_images_group_view_description_query" ] === true ) :
    $images_html .= '<figcaption class="images-caption">';
    $images_html .= '<span class="images-caption-title">' . $content_images[ "group_content_repeater_images_title_text" ] . '</span>';
    $images_html .= '<span class="images-caption-description">' . $content_images[ "group_content_repeater_images_description_text" ] . '</span>';
    $images_html .= '</figcaption>';
endif;
$images_html .= '<figure>';
echo $images_html;
