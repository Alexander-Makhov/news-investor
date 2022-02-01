<?php #Todo: Social media networks.
$pages_header_social_media_networks_group = get_field( "pages_header_social_media_networks_group", get_the_ID() );
$additions_header_group = get_field( "additions_header_group", "option" );

if ( $pages_header_social_media_networks_group[ "pages_header_view_social_media_networks_query" ] === true ) :
    $pages_header_social_media_networks_repeater = $pages_header_social_media_networks_group[ "pages_header_social_media_networks_repeater" ];
    $get_social_icons = get_social_icons(); ?>
    <ul class="social-networks-inner pages-settings">
        <?php foreach ( $get_social_icons as $keys => $icon ) :
            for ( $index = 0; $index < count( $pages_header_social_media_networks_repeater ); $index++ ) :
                if ( $keys === $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_select" ] ) : ?>
                    <li class="social-networks-item">
                        <?php if ( !empty( $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_" . mb_strtolower( $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_select" ]) . "_group" ][ "addition_header_social_media_networks_" . mb_strtolower( $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_select" ]) . "_url" ] )) : ?>
                            <a class="social-networks-link" href="<?= $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_" . mb_strtolower( $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_select" ]) . "_group" ][ "addition_header_social_media_networks_" . mb_strtolower( $pages_header_social_media_networks_repeater[ $index ][ "pages_header_social_media_networks_select" ]) . "_url" ]; ?>"></a>
                        <?php endif; ?>
                        <div class="social-networks-icon <?= mb_strtolower( $keys ); ?>"><?= $icon["svg"]; ?></div>
                    </li>
                <?php endif;
            endfor;
        endforeach; ?>
    </ul>
<?php elseif ( $additions_header_group[ "additions_header_group_view_social_media_networks_query" ] === true ) :
    $addition_header_social_media_networks_repeater = $additions_header_group[ "additions_header_group_social_media_networks_repeater" ];
    $get_social_icons = get_social_icons(); ?>
    <ul class="social-networks-inner addition-settings">
        <?php foreach ( $get_social_icons as $keys => $icon ) :
            for ( $index = 0; $index < count( $addition_header_social_media_networks_repeater ); $index++ ) :
                if ( $keys === $addition_header_social_media_networks_repeater[ $index ][ "addition_header_social_media_networks_select" ] ) : ?>
                    <li class="social-networks-item">
                        <?php if ( !empty( $addition_header_social_media_networks_repeater[ $index ][ 'addition_header_social_media_networks_' . mb_strtolower( $addition_header_social_media_networks_repeater[ $index ][ "addition_header_social_media_networks_select" ] ) . '_group' ][ 'addition_header_social_media_networks_' . mb_strtolower( $addition_header_social_media_networks_repeater[ $index ][ "addition_header_social_media_networks_select" ] ) . '_url' ] )) : ?>
                            <a class="social-networks-link" href="<?= $addition_header_social_media_networks_repeater[ $index ][ 'addition_header_social_media_networks_' . mb_strtolower( $addition_header_social_media_networks_repeater[ $index ][ "addition_header_social_media_networks_select" ] ) . '_group' ][ 'addition_header_social_media_networks_' . mb_strtolower( $addition_header_social_media_networks_repeater[ $index ][ "addition_header_social_media_networks_select" ] ) . '_url' ]; ?>"></a>
                        <?php endif; ?>
                        <div class="social-networks-icon <?= mb_strtolower( $keys ); ?>"><?= $icon["svg"]; ?></div>
                    </li>
                <?php endif;
            endfor;
        endforeach; ?>
    </ul>
<?php endif; ?>
