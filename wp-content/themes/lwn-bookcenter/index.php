<?php get_header(); ?>

    <section id="main">
        <div class="container-90">
            <div class="d-grid-4">
                <?php if (have_posts()): ?>
                    <?php while(have_posts()): ?>
                        <?php the_post(); ?>
                            <div class="book text-center">
                                <div class="book-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                                <div class="book-title">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="book-description">
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php get_template_part('pagination'); ?>
        </div>
    </section>    

<?php get_footer(); ?>

