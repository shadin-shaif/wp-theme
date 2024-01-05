<?php
/*
*Template Name: Custom Query WPQuery
*/
get_header();
?>
<?php get_template_part('/template-parts/common/hero') ?>

<div class="posts text-center">
    <?php
    $paged = get_query_var('paged')?get_query_var('paged'):1;
    $posts_per_page = 2;
    $_p = new WP_Query(array(
        'posts_per_page'        => $posts_per_page,
        'author__in'            => [1],
        'category_name'         => 'new',
        'paged'                 => $paged,
        'tax_query'             => array(
            'relation'      => 'OR',
            array(
                'taxonomy'      => 'category',
                'field'         => 'slug',
                'terms'         => array('new')
            ),array(
                'taxonomy'      => 'post_tag',
                'field'         => 'slug',
                'terms'         => array('blog')
            ),
        )
    ));

    while ($_p->have_posts()) :
        $_p->the_post();
    ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>
<!-- Pagination -->
<div class="container">
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <?php 
              echo paginate_links(array(
                'total'     => $_p->max_num_pages,
                'current'   => $paged,
                'prev_next' => false,
              ));
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>