<?php get_header(); ?>
<section id="main">
    <div class="container-90">
        <div class="d-grid-7-3">
            <div class="content">
                <?php if(have_posts()): ?>
                <?php while(have_posts()): ?>
                <?php the_post(); ?>
                <div class="book">
                    <div class="d-grid-2-8">
                        <div class="book-thumbnail text-center">
                            <?php the_post_thumbnail('medium');?>
                        </div>
                        <table class="book-info">
                            <tr>
                                <td>Title</td>
                                <td>
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <?php the_excerpt(); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Book Type</td>
                                <td>
                                    <?php the_terms($post->ID, 'book_type', '', ' - ', '' ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Writer</td>
                                <td>
                                    <?php the_terms($post->ID, 'writer', '', ' - ', '' ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Publisher</td>
                                <td>
                                    <?php the_terms($post->ID, 'publisher', '', ' - ', '' ); ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="book-section-title">
                        <p>
                            Book Overview
                        </p>
                    </div>
                    <div class="book-content">
                        <?php the_content();?>
                    </div>

                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php get_sidebar('book'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>