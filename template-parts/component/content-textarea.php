<?php
/**
 * @Component: textarea
 */
$content_textarea = get_sub_field( "group_content_repeater_textarea" );
if ( !empty( $content_textarea )) : ?>
    <div class="view-content--textarea"><?= $content_textarea; ?></div>
<?php endif; ?>


