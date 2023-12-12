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

                                                    if($gfxweb_file){
                                                        
                                                        // echo $gfxweb_file_url;

                                                        $file_thumb = get_field('thumbnail', $gfxweb_file);
                                                        $file_url = wp_get_attachment_url($gfxweb_file);

                                                        if($file_thumb){
                                                            $file_thumb_details = wp_get_attachment_image_src($file_thum);
                                                            echo "<a target='_blank' href='{$file_url}'><img src='" . esc_url($file_thumb_details[0]) . " '/></a>";

                                                        }else{
                                                            echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                                        }
                                                        
                                                    }
                                                    // echo $gfxweb_file;
                                                ?>

                                            </div>

                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <?php
                                    next_post_link();
                                    echo "<br>";
                                    previous_post_link();
                                    ?>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
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