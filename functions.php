<?php
require_once get_theme_file_path('/inc/tgm.php');
// require_once get_theme_file_path('/inc/acf-mb.php'); //CMB-2 Activated
require_once get_theme_file_path('/inc/cmb2-mb.php');

//attachments plugin configuration
if (class_exists('Attachments')) {
    require_once "lib/attachments.php";
}

if (site_url() == "http://localhost/wp") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
};

function gfxweb_bootstrapping()
{
    load_theme_textdomain("gfxweb"); // load lng file
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    register_nav_menus(array(
        "primary-menu"      => __("Primary Menu", "gfxweb"),
        "footer-menu"       => __("Footer Menu", "gfxweb"),
    ));
    $gfxweb_custom_header_details = array(
        'header_text'           => 'true',
        'default_text_color'    => 'red',
    );
    $gfxweb_custom_logo_default = array(
        'width'         => '100',
        'height'        => '100'
    );
    add_theme_support('html5', array('search-form'));
    add_theme_support('custom-header', $gfxweb_custom_header_details);
    add_theme_support('custom-logo', $gfxweb_custom_logo_default);
    add_theme_support('custom-background');
    add_theme_support('post-formats', array('image', 'video', 'audio', 'quote', 'chat '));

    add_image_size('gfxweb_square', 400, 400, true);
}

add_action("after_setup_theme", "gfxweb_bootstrapping");

// Enqueue Assets
function gfxweb_assets()
{
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_style('dashicon');
    wp_enqueue_style("tns-style", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css", null);
    wp_enqueue_style("gfxweb-css", get_stylesheet_uri(), null, VERSION);

    wp_enqueue_script("fetherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
    wp_enqueue_script("tns-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", null, null, true);
    wp_enqueue_script('main-js', get_theme_file_uri("/assets/js/main.js"), array("jquery", "fetherlight-js"), VERSION, true);
};
add_action("wp_enqueue_scripts", "gfxweb_assets");

//register sidebar widget
function gfxweb_sidebar()
{
    register_sidebar(array(
        'name'          => __('Left Sidebar', 'gfxweb'),
        'id'            => 'left-sidebar',
        'description'   => __('Widgets in this area will be shown on left sidebar.', 'gfxweb'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
    register_sidebar(array(
        'name'          => __('Footer Left', 'gfxweb'),
        'id'            => 'footer-left',
        'description'   => __('Widgets for left side footer content ', 'gfxweb'),
        'before_widget' => '',
        'after_widget'  => '',
    ));
    register_sidebar(array(
        'name'          => __('Footer right', 'gfxweb'),
        'id'            => 'footer-right',
        'description'   => __('Widgets for Right side footer content ', 'gfxweb'),
        'before_widget' => '',
        'after_widget'  => '',
    ));
}
add_action("widgets_init", "gfxweb_sidebar");


//handel password procted post
function gfxweb_the_excerpt($text)
{
    if (!post_password_required()) {
        return $text;
    } else {
        echo get_the_password_form();
    }
}
add_filter('the_excerpt', 'gfxweb_the_excerpt');

function gfxweb_protected_title_change()
{
    return "%s"; // will return the post title only
}
add_filter('protected_title_format', 'gfxweb_protected_title_change');

// Nav menu CSS class
function gfxweb_menu_item_class($classes, $item)
{
    $classes[] = 'list-inline-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'gfxweb_menu_item_class', 10, 2);

//add a style block before body ending
function gfxweb_about_page_template()
{
    if (is_page()) {
        $gfxweb_feature_img = get_the_post_thumbnail_url(null, 'large');
?>
        <style>
            .page-header {
                background-image: url(<?php echo $gfxweb_feature_img  ?>);
            }
        </style>
        <?php
    }

    if (is_front_page()) {
        if (current_theme_supports("custom-header")) {
        ?>
            <style>
                .header {
                    background-image: url(<?php echo header_image(); ?>);
                    background-repeat: no-repeat;
                    background-size: cover;
                }

                .header h1.heading a,
                h3.tagline,
                h1.heading {
                    color: #<?php echo get_header_textcolor(); ?>;
                    <?php
                    if (!display_header_text()) {
                        echo "display: none;";
                        echo "border: 0px;";
                    }
                    ?>
                }
            </style>
<?php
        }
    }
}
add_action("wp_head", "gfxweb_about_page_template", 100);

//Remove class form body tag
function gfxweb_body_class($classes)
{
    unset($classes[array_search("custom-background", $classes)]);
    unset($classes[array_search("grx-web", $classes)]);
    $classes[] = 'gfxhouse';
    return $classes;
}
add_filter("body_class", "gfxweb_body_class");

// Replace the default [...] with 'Read more' text wrapped in a link
function custom_excerpt_more()
{
    return ' <a class="read-more" href="' . get_permalink() . '">' . __('Read more', 'gfxweb') . '</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

//Highlisht Search Result
function gfxweb_highlight_search_results($text)
{
    if (is_search()) {
        $search_terms = explode(' ', get_search_query());
        $pattern = '/\b(' . implode('|', array_map('preg_quote', $search_terms)) . ')\b/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'gfxweb_highlight_search_results');
add_filter('the_title', 'gfxweb_highlight_search_results');
add_filter('the_excerpt', 'gfxweb_highlight_search_results');

//Hide ACF Options Form Admin Deshboard
add_filter('acf/settings/show_admin', '__return_false');

