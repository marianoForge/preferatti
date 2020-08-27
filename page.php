<?php get_header(); ?>
<div class="flex flex-wrap">
    <div class="w-12 lg:w-2/12">
        <!-- Header -->
        <?php include get_template_directory() . '/head.php'; ?>

        <!-- End Header -->
    </div>
    <div class="w-12 lg:w-10/12">
        <!-- Start Container -->
        <div id="content-container">
            <main id="content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="header">
                                <!--<h1 class="entry-title"><?php the_title(); ?></h1>-->
                            </header>
                            <div class="entry-content">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } ?>
                                <?php the_content(); ?>
                                <div class="entry-links"><?php wp_link_pages(); ?></div>
                            </div>
                        </article>
                        <?php if (comments_open() && !post_password_required()) {
                            comments_template('', true);
                        } ?>
                <?php endwhile;
                endif; ?>
            </main>
        </div>
    </div>
    <!-- End Container -->
</div>

</div>
<?php get_footer(); ?>