<?php get_header(); ?>

    <section id="main">
        <div class="container-90">
            <div class="d-grid-7-3">
                <div class="content">
                    <div class="term-title">
                        <h1 class="display-p">
                            <?php single_term_title(); ?>
                        </h1>
                    </div>
                    <div class="d-grid-2">
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()): ?>
                                <?php the_post(); ?>
                                <div class="book text-center d-grid-2">
                                    <div class="book-thumbnail">
                                        <?php the_post_thumbnail('medium');?>
                                    </div>
                                    <div>
                                        <div class="book-title">
                                            <a href="<?php the_permalink(); ?>">
                                             <h3><?php the_title(); ?></h3>
                                            </a>
                                        </div>
                                        <div class="book-description">
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                         <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php get_template_part('pagination'); ?>

                </div>
                <?php get_sidebar('book'); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

