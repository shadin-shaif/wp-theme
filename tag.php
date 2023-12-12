<?php get_header(); ?>
<?php get_template_part('/template-parts/common/hero') ?>
<div class="posts text-center">
    <div class="headline">
        <h2> <?php single_tag_title("Post Under: ", true); ?></h2>
    </div>
    <?php while (have_posts()) {
        the_post();
    ?>
        <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
        </a>
    <?php
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