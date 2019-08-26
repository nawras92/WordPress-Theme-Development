<?php get_header(); ?>
        <section>
            <?php if (have_posts()): ?>
                <?php while (have_posts()):?>
                    <?php the_post(); ?>
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <span>
                          Published on:   <?php the_date(); ?>
                          By: <?php the_author_posts_link(); ?>
                          In: <?php the_category(', '); ?>
                          <?php the_tags('| ', ', ', ' |'); ?>
                        </span>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <?php echo "There are no posts"; ?>
            <?php endif; ?>


        </section>

        <?php get_sidebar(); ?>

<?php get_footer(); ?>