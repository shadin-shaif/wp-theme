<?php
/*
*Template Name: Custom Query
*/
get_header();
?>
<?php get_template_part('/template-parts/common/hero') ?>


<div class="posts text-center">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $total_posts = 7;
    $posts_per_page = 2;

    $_p = get_posts(array(
        'posts_per_page' => $posts_per_page,
        'numberposts' => $total_posts,
        'author__in' => [1],
        'paged' => $paged,
    ));

    foreach ($_p as $post) :
        setup_postdata($post);
    ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <?php
            echo paginate_links(array(
                'total' => ceil($total_posts / $posts_per_page),
            ));
            ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>