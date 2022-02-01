<?php
/**
 * @Component: Category
 */
$group_content_repeater_category_group = get_sub_field( "group_content_repeater_category_group" );
$category_group_taxonomy = $group_content_repeater_category_group[ "group_content_repeater_category_group_taxonomy" ];
$view_count_category = $group_content_repeater_category_group[ "group_content_repeater_category_group_view_count_category" ];
$view_category_pagination = $group_content_repeater_category_group[ "group_content_repeater_category_group_view_category_pagination" ]; ?>
    <div class="section--view-category">
        <?php
        // Pagination post type.
        Global $wp_query;
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $params = array(
            'paged' => $current_page,
            'posts_per_page' => $view_count_category,
            'post_type' => 'post',
            'cat' => $category_group_taxonomy
        );
        $query_posts = query_posts( $params );
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
        while( have_posts()): the_post();
            if ( have_rows( "section_flexible" )) : while ( have_rows( "section_flexible" )) : the_row();
                $thumbnails_url = get_sub_field( "section_flexible_options_group" )[ "section_flexible_options_group_thumbnails_group" ][ "section_flexible_options_group_thumbnails_url" ];
                $thumbnails_alt = get_sub_field( "section_flexible_options_group" )[ "section_flexible_options_group_thumbnails_group" ][ "section_flexible_options_group_thumbnails_alt" ]; ?>
                <article class="view-category--item">
                <?php if ( have_rows( "section_flexible_options_group_content_repeater" )) : while ( have_rows( "section_flexible_options_group_content_repeater" )) : the_row();
                    $group_content_repeater_select = get_sub_field( "group_content_repeater_select" );
                    if ( $group_content_repeater_select === "Title" || $group_content_repeater_select === "Textarea" ) :
                        $group_content_repeater_heading_group_title = get_sub_field( "group_content_repeater_heading_group" )[ "group_content_repeater_heading_group_title" ];
                        $group_content_repeater_textarea = get_sub_field( "group_content_repeater_textarea" );

                        if ( !empty( $group_content_repeater_heading_group_title ) === true ) : ?>
                            <a class="view-category--link" href="<?= get_the_permalink(); ?>" title="<?php the_truncated_post( $group_content_repeater_heading_group_title, 35 ); ?>"></a>
                            <div class="view-category--thumbnail">
                                <h6 class="view-category--title title-h6"><?php echo mb_strimwidth( $group_content_repeater_heading_group_title, 0, 50, "..." ); ?></h6>
                                <figure class="category--thumbnail">
                                    <img class="img thumbnail" src="<?= $thumbnails_url; ?>" alt="<?= $thumbnails_alt; ?>">
                                </figure>
                            </div>
                        <?php endif; ?>
                            <div class="view-category--textarea"><?php
                                if ( !empty( $group_content_repeater_textarea ) === true ) :
                                    the_truncated_post( $group_content_repeater_textarea, 150 );
                                endif;
                            ?></div>
                    <?php endif;
                endwhile; endif; ?>
                </article>
            <?php endwhile; endif;
        endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
        if ( !empty( $view_category_pagination )) :
            $args_pagination = array(
                'show_all'     => false, // all pages involved in pagination are shown
                'end_size'     => 1,     // number of pages at the ends
                'mid_size'     => 1,     // number of pages around the current one
                'prev_next'    => true,  // Whether to display "previous / next page" side links.
                'prev_text'    => __('«'),
                'next_text'    => __('»'),
                'add_args'     => false, // An array of arguments (request variables) to add to links.
                'add_fragment' => '',     // The text to be added to all links.
                'screen_reader_text' => __( 'Posts navigation' ),
            );
            the_posts_pagination( $args_pagination );
        endif;
    wp_reset_query();
