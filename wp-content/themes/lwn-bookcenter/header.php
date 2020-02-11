<!DOCTYPE html>
<html>
    <head>
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
    </head>
<body>
    <header id="main-header" class="py-1 my-1">
        <div class="container bg-white text-center">
            <?php if (is_home() || is_front_page()): ?>
                <h1>
                    <a href="<?php echo site_url(); ?>" class="website-title">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php else: ?>
                <p class="display-h1">
                    <a href="<?php echo site_url(); ?>" class="website-title">
                        <?php bloginfo('name'); ?>
                    </a>
                </p>          
            <?php endif; ?>

            <p><?php bloginfo('description'); ?></p>

            <?php wp_nav_menu(array('theme_location'=>'main-menu')); ?>


        </div>
    </header>