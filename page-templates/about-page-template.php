<?php
/*
* Template Name: About Page Template
*/
?>
<?php get_header(); ?>
<?php get_template_part('/template-parts/about-page/hero-page') ?>


<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="posts">
                <?php while (have_posts()) :
                    the_post();
                ?>
                    <div class="post <?php post_class(); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 text-center">
                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1 text-center">
                                    <p>
                                        <strong><?php the_author(); ?></strong><br />
                                        <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                                <div class="col-md-10 offset-md-1">
                                    <?php if (has_post_thumbnail()) {
                                        echo '<a href="#" class="popup" data-featherlight="image">';
                                        the_post_thumbnail("large", array("class" => "img-fluid"));
                                        echo '</a>';
                                    } ?>
                                    <p>
                                        <?php
                                        the_content();
                                        ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>