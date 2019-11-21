<!doctype html>

<html>
    <head>
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
    </head>

    <body>
        <nav id="main-nav">
            <div class="container">
                <a href="<?php echo site_url(); ?>" class="logo">
                <?php bloginfo('name'); ?>
                </a>
                <?php $args=array('theme-location' => 'main-menu'); ?>
                <?php wp_nav_menu($args); ?>
            </div>
        </nav>
        
