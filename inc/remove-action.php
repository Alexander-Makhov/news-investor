<?php
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );

/** Clean head section. */
remove_action('wp_head', '_wp_render_title_tag',1);

remove_action('wp_head', 'wp_generator');  // скрыть версию wordpress
remove_action('wp_head', 'feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head', 'feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head', 'rsd_link'); // сервис Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_robots', 1 );

/** Remove emoji icons. */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/** Removes embed discorvery link. */
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links', 10 );
remove_action('wp_head','wp_oembed_add_host_js');

/** Remove  meta rel=dns-prefetch href=//s.w.org. */
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( "wp_head", "rel_canonical" );

add_filter('the_generator', '__return_empty_string'); // из фидов и URL

add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

// Remove bingback
if (!is_admin()) {
    function link_rel_buffer_callback($buffer) {
        $buffer = preg_replace('/(?:<link.*?rel=("|\')pingback("|\').*?href=("|\')(.*?)("|\')(.*?)?\/?>|<link.*?href=("|\')(.*?)("|\').*?rel=("|\')pingback("|\')(.*?)?\/?>)/i', '', $buffer);
        return $buffer;
    }
    function link_rel_buffer_start() {
        ob_start("link_rel_buffer_callback");
    }
    function link_rel_buffer_end() {
        ob_flush();
    }
    add_action('template_redirect', 'link_rel_buffer_start', -1);
    add_action('get_header', 'link_rel_buffer_start');
    add_action('wp_head', 'link_rel_buffer_end', 999);
}

add_action( 'widgets_init', 'theme_start_kit_remove_recentcomments_css' );
function theme_start_kit_remove_recentcomments_css() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}

add_action( 'wp_enqueue_scripts', 'theme_start_kit_remove_block_library_css' );
function theme_start_kit_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}

add_action('admin_menu', 'remove_admin_menu', 999);
function remove_admin_menu() {
    //remove_submenu_page( 'themes.php', 'themes.php');
    remove_submenu_page( 'themes.php', 'theme-editor.php');
    remove_submenu_page( 'themes.php', 'theme_options' );
    remove_submenu_page( 'options-general.php', 'tinymce-advanced' );
    remove_submenu_page( 'plugins.php', 'plugins' );
}

add_action( 'admin_menu', 'remove_acf_menu', 100 );
function remove_acf_menu(){
    global $current_user;
    if ($current_user->user_login!='admin'){
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
    }
}

add_action( 'admin_bar_menu', 'shapeSpace_remove_toolbar_nodes', 99 );
function shapeSpace_remove_toolbar_nodes( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'updates' );
    $wp_admin_bar->remove_node( 'new-content' );
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node( 'new-user' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'customize-background' );
    $wp_admin_bar->remove_node( 'customize-header' );
    $wp_admin_bar->remove_node( 'edit' );
}

// Custom body class.
add_filter( 'body_class','my_class_names' );
function my_class_names($classes) {
    global $wp_query;
    global $post;
    $page_slug = $post->post_name;

    $arr = array();

    if(is_page()) {
        $page_id = $wp_query->get_queried_object_id();

        $arr[] = $page_slug;
    }

    if(is_single()) {
        $post_id = $wp_query->get_queried_object_id();
        $arr[] = 'postid-' . $post_id;
    }

    return $arr;
}
