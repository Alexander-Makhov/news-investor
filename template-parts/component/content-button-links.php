<?php
/**
 * @Component: Button/Links
 */
if ( !empty( get_sub_field( "group_content_repeater_button_links_group" ))) :
    $content_button_links_group = get_sub_field( "group_content_repeater_button_links_group" );
    if ( !empty( $content_button_links_group[ "group_content_repeater_button_links_url" ])) : ?>
        <div class="link-inner">
            <a class="link-item item--pages" href="<?= $content_button_links_group[ "group_content_repeater_button_links_url" ]; ?>">
                <span><?= $content_button_links_group[ "group_content_repeater_button_links_title" ]; ?></span>
            </a>
        </div>
<?php endif;
endif;
