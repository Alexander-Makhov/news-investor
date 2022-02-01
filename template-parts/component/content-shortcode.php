<?php
/**
 * @Component: shortcode.
 */
$group_content_repeater_shortcode_group = get_sub_field( "group_content_repeater_shortcode_group" );
if ( !empty( $group_content_repeater_shortcode_group[ "group_content_repeater_shortcode_group_do_shortcode" ])) : ?>
    <div class="view-content--shortcode <?= !empty( $group_content_repeater_shortcode_group[ "group_content_repeater_shortcode_group_css_class" ]) ? $group_content_repeater_shortcode_group[ "group_content_repeater_shortcode_group_css_class" ] : ''; ?>">
        <?= do_shortcode( $group_content_repeater_shortcode_group[ "group_content_repeater_shortcode_group_do_shortcode" ]); ?>
    </div>
<?php endif;
