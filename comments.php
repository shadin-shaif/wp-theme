<?php
// Get only the approved comments
$args = array(
    'status' => 'approve',
    'post_id' => get_the_ID(),
);

// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query($args);

?>
<div class="comments">
    <?php
    // Comment Loop
    if ($comments) {
        foreach ($comments as $comment) {
    ?>
            <div class="media">
                <?php echo get_avatar($comment, 70, null, null, array(
                    'class' => 'mr-3',
                )); ?>
                <div class="media-body">
                    <h5 class="mt-0"><?php comment_author($comment) ?></h5>
                    <?php edit_comment_link() ?>
                    <?php comment_text($comment) ?>
                </div>
            </div>
    <?php
        }
    } else {
        echo 'No comments found.';
    }
    ?>
    <div class="comment-form">
        <?php comment_form(); ?>
    </div>
</div>