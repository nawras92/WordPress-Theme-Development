<?php get_header(); ?>

    <!-- Single -->
    <section id="single" class="container">
        <div class="single-content">
            <?php if(have_posts()): ?>
                <?php while(have_posts()):  ?>
                    <?php the_post(); ?>
                        <article class="card">
                            <div class="article-header">
                                <h1><?php the_title(); ?></h1>
                                <small><?php the_date(); ?> - <?php the_author(); ?></small>
                            </div>
                            <div class="article-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php  get_sidebar(); ?>

    </section>


<?php get_footer(); ?>