<?php
/*
* Template Name: About Page Template
*/
?>
<?php get_header(); ?>
<?php get_template_part('/template-parts/about-page/hero-page') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="posts">
                <?php while (have_posts()) :
                    the_post();
                ?>
                    <div <?php post_class(); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 text-center">
                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                </div>
                            </div>
                            <?php
                            if (class_exists("Attachments")) {
                            ?>
                                <div class="row">
                                    <?php
                                    $attachments = new Attachments('team');
                                    if ($attachments->exist()) {
                                        while ($attachment = $attachments->get()) { ?>
                                            <div class="col-md-4 card">
                                                <?php echo $attachments->image('medium'); ?>
                                                <h4><?php echo esc_html($attachments->field('name')); ?></h4>
                                                <p>
                                                    <?php echo esc_html($attachments->field('position')); ?>,
                                                    <strong>
                                                        <?php echo esc_html($attachments->field('company')); ?>
                                                    </strong>
                                                </p>
                                                <p><?php echo esc_html($attachments->field('bio')); ?></p>
                                                <p><?php echo esc_html($attachments->field('email')); ?></p>

                                                <a href="mailto:<?php echo esc_html($attachments->field('email')) ?>"><button class="button">Contact</button></a>

                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>