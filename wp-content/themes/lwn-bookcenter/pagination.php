<!-- Pagination -->

<div id="pagination">
    <div class="nav-previous">
        <?php $newer_posts = __('Newer Posts', 'lwn-bookcenter');  ?>
        <?php previous_posts_link($newer_posts); ?>
    </div>
    <div class="nav-next">
        <?php $older_posts = __('Older Posts', 'lwn-bookcenter');  ?>
        <?php next_posts_link($older_posts);?>
    </div>
</div>