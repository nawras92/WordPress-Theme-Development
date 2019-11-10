<?php

/* 
Template name: About us
*/
?>

<?php get_header(); ?>
        <section>

            <?php if (have_posts()): ?>
                <?php while (have_posts()):?>
                    <?php the_post(); ?>
                    <article>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
<?php get_footer(); ?>