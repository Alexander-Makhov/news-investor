<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Start_theme_kit
 */
$contact_us_group = get_field( "contact_us_group", get_the_ID());
?>

<section class="section section-contact-us">
    <div class="container">
        <div class="contact-columns">
            <?php
            $contact_us_shortcode_group = $contact_us_group[ "contact_us_shortcode_group" ];
            $contact_us_phones_and_emails_group = $contact_us_group[ "contact_us_phones_and_emails_group" ];
            if ( !empty( $contact_us_shortcode_group[ "contact_us_shortcode_group_do_shortcode" ])) : ?>
            <div class="view-content--shortcode <?= !empty( $contact_us_shortcode_group[ "contact_us_shortcode_group_do_shortcode_css_class" ]) ? $contact_us_shortcode_group[ "contact_us_shortcode_group_do_shortcode_css_class" ] : ''; ?>">
                <?= do_shortcode( $contact_us_shortcode_group[ "contact_us_shortcode_group_do_shortcode" ] ); ?>
            </div>
            <div class="contact-columns--item">
                <?php
                    if ( !empty( $contact_us_phones_and_emails_group[ "contact_us_phones_and_emails_group_phone_repeater" ])) :
                        $contact_us_phones_and_emails_group_phone_repeater = $contact_us_phones_and_emails_group[ "contact_us_phones_and_emails_group_phone_repeater" ]; ?>
                        <ul class="view-content--phone">
                            <li class="phone--title">
                                <span class="icon-list phone-icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg></span>
                                <span><?= esc_html__( "Phone", "start-theme-kit" ); ?></span>
                            </li>
                            <?php for ( $index_phone = 0; $index_phone < count( $contact_us_phones_and_emails_group_phone_repeater ); $index_phone++ ) :
                            $contact_us_phones_string = $contact_us_phones_and_emails_group_phone_repeater[ $index_phone ][ "contact_us_phones_and_emails_group_phone_repeater_number" ];
                            $contact_us_phones_title = $contact_us_phones_and_emails_group_phone_repeater[ $index_phone ][ "contact_us_phones_and_emails_group_phone_repeater_title" ];
                            $contact_us_phone = str_replace( "-", "", str_replace( ")", "", str_replace( "(", "", str_replace( " ", "", $contact_us_phones_string )))); ?>
                            <li>
                                <a href="tel:<?= $contact_us_phone; ?>"><?= !empty( $contact_us_phones_title ) ? $contact_us_phones_title : $contact_us_phones_string; ?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>
                    <?php endif;

                    if ( !empty( $contact_us_phones_and_emails_group[ "contact_us_phones_and_emails_group_email_repeater" ])) :
                        $contact_us_phones_and_emails_group_email_repeater = $contact_us_phones_and_emails_group[ "contact_us_phones_and_emails_group_email_repeater" ]; ?>
                        <ul class="view-content--email">
                            <li class="email--title">
                                <span class="icon-list email-icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg></span>
                                <span><?= esc_html__( "E-mail", "start-theme-kit" ); ?></span>
                            </li>
                            <?php for ( $index_email = 0; $index_email < count( $contact_us_phones_and_emails_group_email_repeater ); $index_email++ ) :
                                $contact_us_email_string = $contact_us_phones_and_emails_group_email_repeater[ $index_email ][ "contact_us_phones_and_emails_group_email_repeater_url" ];
                                $contact_us_email_title = $contact_us_phones_and_emails_group_email_repeater[ $index_email ][ "contact_us_phones_and_emails_group_email_repeater_title" ];
                                $contact_us_email = str_replace( "-", "", str_replace( ")", "", str_replace( "(", "", str_replace( " ", "", $contact_us_email_string )))); ?>
                                <li>
                                    <a href="mailto:<?= $contact_us_email; ?>"><?= !empty( $contact_us_email_title ) ? $contact_us_email_title : $contact_us_email_string; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>