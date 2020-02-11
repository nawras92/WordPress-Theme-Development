<?php get_header(); ?>

    <section id="main">
        <div class="container-90">
                <?php if (have_posts()): ?>
                    <?php while(have_posts()): ?>
                        <?php the_post(); ?>
                            <div class="post text-center">
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                                <div class="post-title">
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                </div>
                                <div class="post-content">
                                    <p>
                                        <?php the_content(); ?>
                                    </p>
                                </div>
                            </div>
                    <?php endwhile; ?>
                <?php endif; ?>

        </div>
    </section>    

<?php get_footer(); ?>

