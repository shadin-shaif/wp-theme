<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (current_theme_supports('custom-logo')) {
                ?>
                    <div class="header-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php
                }
                ?>
                <h3 class="tagline">
                    <?php bloginfo('description') ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url(); ?>"><?php bloginfo('name') ?></a>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                wp_nav_menu(array(
                    'theme_location'     => 'primary-menu',
                    'menu_id'            => 'top-menu',
                    'menu_class'         => 'list-inline text-center',
                ));
                ?>
            </div>
        </div>
    </div>
</div>