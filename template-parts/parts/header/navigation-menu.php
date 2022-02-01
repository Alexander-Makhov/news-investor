<div id="site-navigation-top" class="main-navigation">
    <button class="menu-toggle"><i class="menu-hamburger"></i></button>
    <div class="footer-title"><?= esc_html__( "Pages", "start-theme-kit" ); ?></div>
    <nav class="navigation">
        <button class="close-toggle"><i class="menu-hamburger"></i></button>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'menu_id'        => 'top',
            'items_wrap' => '<ul class="menu menu-top">%3$s</ul>'
        )); ?>
    </nav>
</div>
