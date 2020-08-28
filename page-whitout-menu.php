<?php
/* Template Name: Single Page Whitout Menu */
?>
<?php get_header(); ?>
<main id="content" class="mt-8 md:mt-16 pr-4 md:pr-0 md:pl-0 pl-4">
    <div class="flex flex-wrap">
        <div class="menu-wrapper">
            <!-- Header -->
            <?php include get_template_directory() . '/head.php'; ?>
            <!-- End Header -->
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="w-full md:w-9/12 ml-auto px-2 md:pl-16">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="uppercase mb-12">
                            <!--<a href="<?php echo get_home_url(); ?>" title="Back to Homepage" class="mr-2">
                                <i class="icn-back"></i>
                            </a>-->
                            <?php the_title(); ?>
                        </h1>
                        <div class="page--whitout--menu__wrapper">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</main>
</div>
<?php get_footer(); ?>