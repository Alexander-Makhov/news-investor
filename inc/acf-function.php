<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Additions',
        'menu_title' => 'Additions',
        'menu_slug' => 'theme-general-options',
        'capability' => 'edit_posts',
        'parent_slug' => 'options-general.php',
        'position' => false,
        'icon_url' => false,
        'redirect' => false
    ));
}

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register a block.
        acf_register_block_type(array(
            'name'              => 'header background',
            'title'             => __('Header Background'),
            'description'       => __('A custom header background block.'),
            'render_template'   => '/template-parts/blocks/header-background.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'header background', 'quote' ),
        ));

        acf_register_block_type(array(
            'name'              => 'meta seo promotion',
            'title'             => __('Meta SEO promotion'),
            'description'       => __('A custom Meta SEO promotion block.'),
            'render_template'   => '/template-parts/blocks/meta-seo-promotion.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'meta seo promotion', 'quote' ),
        ));

        acf_register_block_type(array(
            'name'              => 'social networks',
            'title'             => __('Social Networks'),
            'description'       => __('A custom Social Networks block.'),
            'render_template'   => '/template-parts/blocks/social-networks-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'select options', 'quote' ),
        ));

        acf_register_block_type(array(
            'name'              => 'select options',
            'title'             => __('Select Options'),
            'description'       => __('A custom Select Options block.'),
            'render_template'   => '/template-parts/blocks/select-options.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'select options', 'quote' ),
        ));
    }
}
