<?php get_header(); ?>
<div class="container errorview">
    <div class="row d-flex">
        <div class="col-md-12">
            <h1 class="text-center">
                <?php
                _e("Look like you're lost", "gfxweb");
                ?>
            </h1>
            <p class="text-center">the page you are looking for not avaible!</p>
            <div class="search-form text-center">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>