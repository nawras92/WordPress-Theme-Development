<?php get_header(); ?>
        <section>
            <h2>Blog Posts</h2>


            <?php if (have_posts()): ?>
                <?php while (have_posts()):?>
                    <?php the_post(); ?>
                    <article>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_content(); ?>
                        <?php the_author(); ?>
                        <?php the_tags(); ?>
                        <?php the_category(); ?>
                        <?php the_date(); ?>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <?php echo "There are no posts"; ?>
            <?php endif; ?>


        </section>

        <?php get_sidebar(); ?>

<?php get_footer(); ?>