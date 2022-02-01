<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Start_theme_kit
 */
?>
<!doctype html>
<html lang="en-US">
<head>
    <?php get_template_part( "template-parts/parts/header/head", "top" ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="layout">
    <main class="main-content <?= is_page( 21 ) ? 'contact-us' : 'other-page'; ?>">
        <?php
        global $post;
        $page_slug = $post->post_name;
        if ( $page_slug !== "app" ) : ?>
        <header class="header <?= is_front_page() ? 'main-header' : 'second-header'; ?>">
            <div class="header--top">
                <div class="container">
                    <div class="header--top-item item-search">
                        <?php
                            get_template_part( "template-parts/parts/header/site-branding", "logo" );
                            get_search_form();
                            get_template_part( "template-parts/parts/header/header-social", "network" );
                        ?>
                    </div>
                    <div class="header--top-item item-navigation">
                        <?php
                            get_template_part( "template-parts/parts/header/navigation", "menu" );
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if ( !is_single() && !is_search()) : ?>
                <div class="header--bottom">
                    <?php
                        get_template_part( 'template-parts/parts/header/header-background-switch', 'slider-title' );
                    ?>
                </div>
            <?php endif; ?>
        </header>
        <?php endif; ?>
