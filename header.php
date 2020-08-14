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
    <div id="main--wrapper" style="border: 10px solid green">
        <!-- Header -->
        <?php include get_template_directory() . '/head.php'; ?>
        <!-- End Header -->
        <!-- Start Container -->
        <div id="container" style="border: red solid 10px;">