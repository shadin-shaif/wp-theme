<?php get_header(); ?>
<?php get_template_part('/template-parts/common/hero') ?>
<div class="posts text-center">
    <div class="headline">
        <h2>
            Post in: 
            <?php
            if (is_month()) {
               $month = esc_html(get_query_var('monthnum'));
               $dateobj = DateTime::createFromFormat('!m', $month);
               echo $month = $dateobj->format('F');
            }elseif(is_year()){
                echo esc_html(get_query_var('year'));
            }elseif(is_day()){
                $day = esc_html(get_query_var("day"));
                $month = esc_html(get_query_var('monthnum'));
                $year = esc_html(get_query_var('year'));
                printf("%s/%s/%s", $day, $month, $year); 
            }
            ?>
        </h2>

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