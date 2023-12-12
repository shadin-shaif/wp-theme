<?php
function gfxweb_child_assets(){
    wp_enqueue_style('parent-stlye', get_parent_theme_file_uri('/style.css'));
}
add_action('wp_enqueue_scripts', 'gfxweb_child_assets');