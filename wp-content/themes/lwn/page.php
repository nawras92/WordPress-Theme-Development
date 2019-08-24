<?php get_header(); ?>
        <section>
            <?php if (have_posts()): ?>
                <?php while (have_posts()):?>
                    <?php the_post(); ?>
                    <article>
                        <h3><?php the_title(); ?></h3>
                        <span>
                          Published on: <?php the_date(); ?>
                          By: <?php the_author_posts_link(); ?>
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