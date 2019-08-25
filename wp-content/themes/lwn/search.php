<?php get_header(); ?>
        <section>
            <h2>Your search results: </h2>


            <?php if (have_posts()): ?>
                <?php while (have_posts()):?>
                    <?php the_post(); ?>
                    <article>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <span>
                          Published on: <?php the_date(); ?>
                          By: <?php the_author_posts_link(); ?>
                          In: <?php the_category(', '); ?>
                          <?php the_tags('| ', ', ', ' |'); ?>
                        </span>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <?php echo "No results found"; ?>
            <?php endif; ?>


        </section>

        <?php get_sidebar(); ?>

<?php get_footer(); ?>