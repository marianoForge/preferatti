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
    <div id="main--wrapper" class="container mx-auto pt-8 pb-8">
        <div class="flex">
            <div class="w-4/12">
                <!-- Header -->
                <?php include get_template_directory() . '/head.php'; ?>

                <!-- End Header -->
            </div>
            <div class="w-8/12">
                <!-- Start Container -->
                <div id="content-container">