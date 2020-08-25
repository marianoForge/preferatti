<?php
/* Template Name: Contact Page */
?>
<?php get_header(); ?>
<main id="content" class="mt-16 pr-4 lg:pr-0 lg:pl-0 pl-4">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="uppercase mb-12">
                    <a href="<?php echo get_home_url(); ?>" title="Back to Homepage" class="mr-2">
                        <i class="icn-back"></i>
                    </a>
                </h1>
                <div class="page--contact__wrapper lg:ml-8">
                    <?php the_title(); ?>
                    <?php the_content(); ?>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</main>
</div>
<?php get_footer(); ?>