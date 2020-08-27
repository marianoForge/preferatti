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
    <div id="main--wrapper" class="container mx-auto pb-8">
        <!-- Logo and Description -->
        <div class="flex mb-4 lg:mb-6">
            <div id="brand" class="bg-gray flex items-center justify-center px-2">
                <?php the_custom_logo() ?>
            </div>
            <!-- Footer -->
            <div id="headerDescription" class="lg:ml-5 pl-4 pr-4 md:pl-6 md:pr-6 pt-4 pb-4 bg-gray">
                <p><?php bloginfo('description'); ?></p>
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Logo and Description -->