<div id="site-navigation2" class="main-navigation">
    <button class="menu-toggle" style="display: none"><span class="menu-hamburger"></span></button>
    <div class="footer-title"><?= esc_html__( "Pages", "start-theme-kit" ); ?></div>
    <nav class="navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'menu_id'        => 'bottom',
            'items_wrap' => '<ul class="menu menu-bottom">%3$s</ul>'
        )); ?>
    </nav>
</div>
