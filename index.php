<?php get_header(); ?>
<?php get_template_part('/template-parts/common/hero') ?>
<div class="posts">
    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="post <?php post_class(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="post-title"><?php the_title(); ?></h2>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong><?php the_author(); ?></strong><br />
                            <?php echo get_the_date(); ?>
                        </p>
                        <?php echo get_the_tag_list('<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>'); ?>
                    </div>
                    <div class="col-md-8">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail("large", array("class" => "img-fluid"));
                        } ?>
                        <p>
                            <?php
                            the_excerpt();
                            ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>


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