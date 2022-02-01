<?php
/**
 * Start theme kit Theme Customizer
 *
 * @package Start_theme_kit
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function start_theme_kit_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'start_theme_kit_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'start_theme_kit_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'start_theme_kit_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function start_theme_kit_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function start_theme_kit_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function start_theme_kit_customize_preview_js() {
	wp_enqueue_script( 'start-theme-kit-customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), START_THEME_KIT_VERSION, true );
}
add_action( 'customize_preview_init', 'start_theme_kit_customize_preview_js' );


add_action( "customize_register", "ruth_sherman_theme_customize_register" );
function ruth_sherman_theme_customize_register( $wp_customize ) {

    //=============================================================
    // Remove header image and widgets option from theme customizer
    //=============================================================
    $wp_customize->remove_control("header_image");
    //$wp_customize->remove_panel("widgets");

    //=============================================================
    // Remove Colors, Background image, and Static front page
    // option from theme customizer
    //=============================================================
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("background_image");
    $wp_customize->remove_section("static_front_page");

}

add_action('admin_head', 'hide_customize');
function hide_customize(){
    echo '<style>.hide-if-no-customize:nth-of-type(6),.hide-if-no-customize:nth-of-type(7){display:none;}</style>';
}
