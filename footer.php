<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Start_theme_kit
 */
$additions_header_group = get_field( "additions_header_group", "option" );
$additions_footer_group = get_field( "additions_footer_group", "option" );

global $post;
$page_slug = $post->post_name;
if ($page_slug !== "app") : ?>
	<footer class="footer">
        <div class="footer-item">
            <div class="container">
                <div class="footer-item--top">
                    <div class="footer-logo">
                        <?php get_template_part( "template-parts/parts/footer/custom-footer", "logo" ); ?>
                        <div class="footer-copyright">Copyright <?= get_the_date( "Y" ); ?>. All Rights Reserved news4investor.com</div>
                    </div>

                    <div class="footer-navigation">
                        <div class="footer-contact">
                            <?php get_template_part( "template-parts/parts/footer/navigation", "menu" ); ?>
                            <?php
                            if ( $additions_footer_group[ "additions_footer_group_view_emails_query" ] === true && !empty( $additions_footer_group[ "additions_footer_group_emails_repeater" ]) ) :
                                $additions_footer_group_emails_repeater = $additions_footer_group[ "additions_footer_group_emails_repeater" ]; ?>
                                <ul class="footer-contact--list-emails">
                                    <li class="list-email--item emails-title"><span>E-mails</span></li>
                                    <?php for ( $index = 0; $index < count( $additions_footer_group_emails_repeater ); $index++ ) :
                                        if ( !empty( $additions_footer_group_emails_repeater[ $index ][ "additions_footer_group_emails_repeater_email" ])) : ?>
                                            <li class="list-phone--item"><a href="mailto:<?= $additions_footer_group_emails_repeater[ $index ][ "additions_footer_group_emails_repeater_email" ]; ?>"><?= $additions_footer_group_emails_repeater[ $index ][ "additions_footer_group_emails_repeater_email" ]; ?></a></li>
                                        <?php endif; endfor; ?>
                                </ul>
                            <?php endif;

                            if ( $additions_footer_group[ "additions_footer_group_view_phones_query" ] === true && !empty( $additions_footer_group[ "additions_footer_group_phones_repeater" ]) ) :
                                $additions_footer_group_phones_repeater = $additions_footer_group[ "additions_footer_group_phones_repeater" ]; ?>
                                <ul class="footer-contact--list-phones">
                                    <li class="list-email--item phones-title"><span>Phones</span></li>
                                    <?php for ( $index = 0; $index < count( $additions_footer_group_phones_repeater ); $index++ ) :
                                        if ( !empty( $additions_footer_group_phones_repeater[ $index ][ "additions_footer_group_phones_repeater_phone" ])) :
                                            $footer_phone = str_replace( "-", "", str_replace( ")", "", str_replace( "(", "", str_replace( " ", "", $additions_footer_group_phones_repeater[ $index ][ "additions_footer_group_phones_repeater_phone" ]))));

                                        ?>
                                        <li class="list-email--item"><a href="tel:<?= $footer_phone; ?>"><?= $additions_footer_group_phones_repeater[ $index ][ "additions_footer_group_phones_repeater_phone" ]; ?></a></li>
                                    <?php endif; endfor; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <?php get_template_part( "template-parts/parts/footer/footer-social", "network" ); ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-item footer-mobile-copyright">
            <div class="container">
                <div class="footer-item--bottom">
                    <div class="footer-copyright" style="text-align: center;">Copyright <?= get_the_date( "Y" ); ?>. All Rights Reserved news4investor.com</div>
                </div>
            </div>
        </div>
	</footer>
    <?php endif; get_template_part( "template-parts/parts/modals/contact-form", "modal" ); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
