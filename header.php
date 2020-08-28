<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
    <!--Styles-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
    <!-- Modal Inquire
    <div class="modal-wrapper fixed h-full w-full z-10 bg-opacity-50 bg-black flex align-center justify-center">
        <div class="modal-container w-8/12 mx-auto flex flex-wrap bg-gray-light">
            <div class="w-full md:w-6/12 relative bg-no-repeat bg-cover" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>)">
                <div class="bg-black absolute p-6 bottom-0 left-0 w-full bg-opacity-50 pd-6 text-white">
                    <h2 class="uppercase mb-1 text-white"><?php the_title(); ?></h2>
                    <h3 class="mb-3 uppercase text-white">
                        <?php echo get_permalink(get_field('artist')->name) ?>
                    </h3>
                </div>
            </div>
            <div class="w-full md:w-6/12">
                <h1 class="text-center uppercase mb-4">Inquire</h1>
                <?php echo do_shortcode("[contact-form-7 id='146']"); ?>
            </div>
        </div>
    </div>-->
    <!-- End Modal Inquire -->
    <div id="main--wrapper" class="container mx-auto pb-8">
        <!-- Logo and Description -->
        <div class="flex mb-4 md:mb-6">
            <div id="brand" class="bg-gray flex items-center justify-center px-2">
                <?php the_custom_logo() ?>
            </div>
            <!-- Footer -->
            <div id="headerDescription" class="md:ml-8 pl-4 pr-4 md:pl-6 md:pr-6 pt-4 pb-4 bg-gray">
                <p><?php bloginfo('description'); ?></p>
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Logo and Description -->