<?php
/* Template Name: Contact Page */
?>
<?php get_header(); ?>
<main id="content" class="mt-8 md:mt-16 pr-4 md:pr-0 md:pl-0 pl-4 mx-3">
    <div class="flex flex-wrap  md:flex-no-wrap">
        <div class="menu-wrapper">
            <!-- Header -->
            <header id="header" class="px-4 md:px-0">
                <nav id="main-menu-options" class="mb-4 lg:mb-10">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu-options')); ?>
                </nav>
            </header>
            <!-- End Header -->
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="swup" class="transition-fade w-auto">
                    <div class="w-full md:w-8/12 mx-auto px-2">
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <!--<h1 class="uppercase mb-12">
                            <a href="<?php echo get_home_url(); ?>" title="Back to Homepage" class="mr-2">
                                <i class="icn-back"></i>
                            </a>
                        </h1>-->
                            <div class="page--contact__wrapper md:ml-8">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</main>
<?php get_footer(); ?>