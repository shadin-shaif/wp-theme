<?php
$gfxweb_layout_class = 'col-md-8';
$gfxweb_text_class = '';
if (!is_active_sidebar('left-sidebar')) {
    $gfxweb_layout_class = 'col-md-10 offset-md-1';
    $gfxweb_text_class = 'text-center';
}
?>
<?php get_header(); ?>
<?php get_template_part('/template-parts/common/hero') ?>

<div class="container">
    <div class="row">
        <div class="<?php echo $gfxweb_layout_class; ?>">
            <div class="posts">
                <?php while (have_posts()) :
                    the_post();
                ?>
                    <div <?php post_class(); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h2 class="post-title <?php echo $gfxweb_text_class ?>"><?php the_title(); ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <p class="<?php echo $gfxweb_text_class ?>">
                                        <strong><?php the_author_posts_link(); ?></strong><br />
                                        <?php echo get_the_date(); ?>
                                    </p>
                                </div>

                                <!-- Tiny Slider Using Attachments Plugin   -->
                                <div class="col-md-10 offset-md-1">
                                    <?php
                                    if (class_exists('Attachments')) : ?>
                                        <div class="slider" style="max-height: 400px;">
                                            <?php
                                            $attachments = new Attachments('slider');
                                            if ($attachments->exist()) {
                                                while ($attachment = $attachments->get()) { ?>
                                                    <div>
                                                        <?php echo $attachments->image('large'); ?>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php endif;
                                    ?>

                                    <div>
                                        <?php
                                        if (!class_exists('Attachments')) {
                                            if (has_post_thumbnail()) {
                                                // $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                                echo '<a href="#" class="popup" data-featherlight="image">';
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo '</a>';
                                            }
                                        }
                                        ?>
                                        <p>
                                            <?php the_content(); ?>
                                        </p>
                                    </div>

                                    <!-- Additional Information By ACF -->
                                    <div class="additional-info">
                                        <?php
                                        if (get_post_format() == "image" && function_exists("the_field")) :
                                        ?>
                                            <h5>Camera Model: <?php the_field('camera_model') ?></h5>
                                            <h5>Location: <?php the_field('location') ?></h5>
                                            <h5>Date: <?php the_field('date') ?></h5>
                                            <h5>Licence Info: <?php the_field('licence_information') ?></h5>
                                            <?php
                                            $gfxweb_licence_img = get_field('image');
                                            $gfxweb_img_details = wp_get_attachment_image_src($gfxweb_licence_img, 'gfxweb_square')[0];
                                            ?>
                                            <img src="<?php echo esc_url($gfxweb_img_details); ?>" alt="">

                                            <div class="attachment">

                                                <?php
                                                $gfxweb_file = get_field('attachment');

                                                if ($gfxweb_file) {
                                                    $file_thumb = get_field('thumbnail', $gfxweb_file);
                                                    $file_url = wp_get_attachment_url($gfxweb_file);

                                                    // if ($file_thumb) {
                                                    //     $file_thumb_details = wp_get_attachment_image_src($file_thum);
                                                    //     echo "<a target='_blank' href='{$file_url}'><img src='" . esc_url($file_thumb_details[0]) . " '/></a>";
                                                    // } else {
                                                    //     echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                                    // }
                                                    echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <!-- Show Meta Data Using CMB2 -->
                                    <div class="additional-info">
                                        <?php
                                        if (get_post_format() == "image" && class_exists("CMB2")) :
                                            // Also retrieve the matadata usinge the_field &  get_post_meta fun 
                                            $gfxweb_camera_model = get_post_meta(get_the_ID(), '_gfxweb_camera_model', true);
                                            $gfxweb_location = get_post_meta(get_the_ID(), '_gfxweb_location', true);
                                            $gfxweb_date = get_post_meta(get_the_ID(), '_gfxweb_date', true);
                                            $gfxweb_licensed = get_post_meta(get_the_ID(), '_gfxweb_licensed', true);
                                            $gfxweb_licensed_info = get_post_meta(get_the_ID(), '_gfxweb_licensed_info', true);
                                        ?>
                                            <h5>Camera Model:
                                                <?php
                                                if ($gfxweb_camera_model) {
                                                    echo esc_html($gfxweb_camera_model);
                                                }
                                                ?>
                                            </h5>
                                            <h5>Location:
                                                <?php
                                                if ($gfxweb_location) {
                                                    echo esc_html($gfxweb_location);
                                                }
                                                ?>
                                            </h5>
                                            <h5>Date:
                                                <?php
                                                if ($gfxweb_date) {
                                                    echo esc_html($gfxweb_date);
                                                }
                                                ?>
                                            </h5>
                                            <h5>Licence Info:
                                                <?php
                                                if ($gfxweb_licensed) {
                                                    echo esc_html($gfxweb_licensed_info);
                                                }
                                                ?>
                                            </h5>
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <!-- Next Previous Post Link -->
                                    <?php
                                    next_post_link();
                                    echo "<br>";
                                    previous_post_link();
                                    ?>
                                </div>

                                <!-- Author Section -->
                                <div class="author-section ml-5">
                                    <div class="row">
                                        <div class="col-md-3 authorimage">
                                            <?php
                                            echo get_avatar(get_the_author_meta('ID'))
                                            ?>
                                        </div>
                                        <div class="col-md-9">
                                            <h4>
                                                <?php echo get_the_author_meta('display_name') ?>
                                            </h4>
                                            <p>
                                                <?php echo get_the_author_meta('description') ?>
                                            </p>
                                            <?php
                                            if (function_exists('the_field')) : ?>
                                                <a target="_blank" href="<?php the_field('facebook', 'user_' . get_the_author_meta('ID')) ?>"><span class="dashicons dashicons-facebook"></span></a>
                                                <a target="_blank" href="<?php the_field('linkedin', 'user_' . get_the_author_meta('ID')) ?>"><span class="dashicons dashicons-linkedin"></span></a>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Show Related Posts -->
                                <?php
                                if (function_exists('the_field')) : ?>
                                    <div class="related-posts">
                                        <h1><?php _e('Related Posts', 'gfxweb') ?></h1>
                                        <?php
                                        $gfxweb_related_posts = get_field('related_posts'); //Retrieve ACF Data

                                        $gfxweb_rp = new WP_Query(array(
                                            'post__in'      => $gfxweb_related_posts,
                                            'orderby'      => 'post__in',
                                        ));

                                        if ($gfxweb_rp->have_posts()) {
                                            while ($gfxweb_rp->have_posts()) {
                                                $gfxweb_rp->the_post();
                                        ?>
                                                <a href="<?php the_permalink() ?>">
                                                    <h4><?php the_title() ?></h4>
                                                </a>
                                        <?php
                                            }
                                        } else {
                                            esc_html_e('Sorry, no posts matched.');
                                        }
                                        wp_reset_query();
                                        ?>
                                    </div>
                                <?php endif;
                                ?>

                                <!-- Comment Form -->
                                <?php if (comments_open()) : ?>
                                    <div class="col-md-10 offset-md-1">
                                        <?php
                                        comments_template();
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php if (is_active_sidebar('left-sidebar')) : ?>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar("left-sidebar")) {
                    dynamic_sidebar("left-sidebar");
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>