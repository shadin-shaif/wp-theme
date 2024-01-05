<?php
single_cat_title();
echo "<br>";
$gfxweb_current_term = get_queried_object();
$gfxweb_term_thumbnail_id = get_field('thumbnail', $gfxweb_current_term);

if($gfxweb_term_thumbnail_id){
    $gfxweb_file_thumn_details = wp_get_attachment_image_src($gfxweb_term_thumbnail_id, 'thumbnail');
    echo '<img src="'. esc_url($gfxweb_file_thumn_details[0]) .'" alt="">';
}