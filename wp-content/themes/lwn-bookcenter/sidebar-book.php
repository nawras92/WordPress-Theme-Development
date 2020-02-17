<!-- Book Sidebar -->

<div id="sidebar-book">
    <div class="sidebar-title text-center">
        <p><?php _e('Latest Books', 'lwn-bookcenter');  ?></p>
    </div>

    <?php $args = array('post_type'=> 'book',
                        'post_status'=>'publish',
                        'numberposts'=>5);?>
    <?php $recent_books = wp_get_recent_posts($args);?>     

    <?php foreach($recent_books as $recent_book): ?>
        <div class="book text-center">
            <div class="book-thumbnail">
                <a href="<?php echo get_permalink($recent_book['ID']);?>">
                    <?php echo get_the_post_thumbnail($recent_book['ID']); ?>
                </a>
            </div>
            <div class="book-title">
                <a href="<?php echo get_permalink($recent_book['ID']); ?>">
                    <p><?php echo $recent_book['post_title']; ?></p>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_query(); ?>


</div>