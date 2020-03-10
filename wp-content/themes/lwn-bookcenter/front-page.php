<?php get_header(); ?>

    <section id="front-page">

    <?php $display_boxes = lwn_bookcenter_display_theme_modification()['display_frontpage_boxes'];?>
        <?php if ($display_boxes):  ?>
            <div class="container-70">
                <div class="d-grid-3 my-2">
                <?php for($item=1; $item<=3;$item++): ?>
                    <?php $box_title = lwn_bookcenter_display_theme_modification()['box' . $item.'_title'];?> 
                    <?php $box_desc = lwn_bookcenter_display_theme_modification()['box' . $item.'_desc'];?> 

                    <div class="box">
                        <div class="box-header">
                            <?php echo $box_title; ?>
                        </div>
                        <div class="box-body">
                        <?php echo $box_desc; ?>
                        
                        </div>
                    </div>
                <?php endfor; ?>                             
                </div>
            </div>
        <?php endif; ?>
        <div class="container-90">
            <div id="book-types" class="d-grid-2">
                <?php // get terms ?>
                <?php $terms = get_terms( array('taxonomy' => 'book_type','hide_empty' => true,) );?>
                <?php foreach($terms as $term): ?>
                    <?php $term_id = $term->term_id; ?>
                    <?php $term_name = $term->name; ?>
                    <?php $term_link = get_term_link($term);?>
                <div class="book-type text-center">
                    <div class="sub-title">
                        <a href="<?php echo $term_link; ?>">
                         <h3><?php echo $term_name; ?></h3>
                        </a> 
                    </div>

                    <div class="d-grid-4">
                        <?php
                            $args = array('post_type'=> 'book',
                                          'post_status'=> 'publish',
                                          'posts_per_page' => 4,
                                           'tax_query'=> array(
                                                array('taxonomy'=> 'book_type',
                                                      'field' => 'term_id',
                                                       'terms'=> $term_id),
                                           ) );
                        ?>
                        <?php $query = new WP_Query($args); ?>
                        <?php if($query->have_posts()): ?>
                            <?php while($query->have_posts()): ?>
                                <?php $query->the_post(); ?>
                                    <div class="book">
                                        <div class="book-thumbnail">
                                            <?php the_post_thumbnail();?>
                                        </div>
                                        <div class="book-title">
                                            <a href="<?php the_permalink(); ?>">
                                             <h4><?php the_title(); ?></h4>
                                            </a>
                                        </div>
                                    </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata();?>
                        <?php endif;?> 

                    </div>-
                </div> 
                <?php endforeach; ?>              
            </div>

            <div id="blog-posts">
                <div class="sub-title">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
                        <h3><?php _e('Blog Posts', 'lwn-bookcenter'); ?></h3>
                    </a>
                </div>
                <div class="d-grid-6">
                    <?php $args = array('post_type'=> 'post',
                                        'post_status'=> 'publish',
                                        'numberposts' =>6);?>
                    <?php $recent_posts = wp_get_recent_posts($args);?>
                    <?php foreach ($recent_posts as $recent_post): ?>
                        <div class="post text-center">
                            <div class="post-thumbnail">
                                <?php echo get_the_post_thumbnail($recent_post['ID']); ?>
                            </div>
                            <div class="post-title">
                                <a href="<?php echo get_permalink($recent_post['ID']);?>">
                                    <h4><?php echo $recent_post['post_title']; ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

