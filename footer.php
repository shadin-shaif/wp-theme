<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                if (is_active_sidebar("footer-left")) {
                    dynamic_sidebar("footer-left");
                };
                ?>
            </div>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar("footer-right")) {
                    dynamic_sidebar("footer-right");
                };

                wp_nav_menu(array(
                    'theme_location'     => 'footer-menu',
                    'menu_id'            => 'footer-menu',
                    'menu_class'         => 'list-inline text-right',
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>