<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <!-- Transition -->

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