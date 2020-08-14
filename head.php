<header id="header">
    <div id="branding">
        <?php the_custom_logo() ?>
        <div id="site-title">
            <?php if (is_front_page() || is_home() || is_front_page() && is_home()) {
                echo '<h1>';
            } ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
            <?php if (is_front_page() || is_home() || is_front_page() && is_home()) {
                echo '</h1>';
            } ?>
        </div>
        <div id="site-description"><?php bloginfo('description'); ?></div>
    </div>
    <nav id="menu">
        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </nav>
</header>