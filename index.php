<?php get_header(); ?>
<?php get_template_part('/template-parts/common/hero') ?>
<div class="posts">
    <?php while (have_posts()) {
        the_post();
        get_template_part('post-formats/content', get_post_format());
    } ?>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php the_posts_pagination() ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>