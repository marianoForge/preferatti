<header id="header">
    <div id="branding" class="mb-12">
        <?php the_custom_logo() ?>
    </div>
    <nav id="menu-wrapper">
        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </nav>
    <nav id="menu-footer">
        <?php wp_nav_menu(array('theme_location' => 'main-menu-footer')); ?>
    </nav>
</header>