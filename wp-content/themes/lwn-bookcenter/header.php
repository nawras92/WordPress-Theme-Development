<!DOCTYPE html>
<html>
    <head>
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
    </head>
<body>
    <header id="main-header">
        <div class="container">
            <h1>
                <a href="<?php echo site_url(); ?>" class="website-title">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <p><?php bloginfo('description'); ?></p>

            <ul>
                <li><a href="#">Educational</a></li>
                <li><a href="#">Children</a></li>
                <li><a href="#">Programming</a></li>
                <li><a href="#">Novels</a></li>
            </ul>
        </div>
    </header>