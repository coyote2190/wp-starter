<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(""); ?></title>
    
    <!-- Google Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap" rel="stylesheet">
     -->
    <?php wp_head(); ?>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="icon" type="image/x-icon" sizes="16x16 32x32" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon-180-precomposed.png">
    <!-- <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json"> -->
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col" style="background-color: #fff">
    <header class="bg-gray-800 text-white">
        <div class="max-w-[1600px] w-full mx-auto py-2 px-4 md:px-6 flex justify-center items-center relative">
            <span>Starter Template Wordpress</span>
        </div>
    </header>

    <main id="main" class="site-main flex-grow">
