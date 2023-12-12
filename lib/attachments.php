<?php
define('ATTACHMENTS_SETTINGS_SCREEN', false);
add_filter('attachments_default_instance', '__return_false');

function gfxweb_attachments($attachments)
{
    $fields         = array(
        array(
            'name'      => 'title',
            'type'      => 'text',
            'label'     => __('Title', 'gfxweb'),
            'default'   => 'title',
        ),
    );
    $args = array(
        'label'         => 'My Attachments',
        'post_type'     => array('post',), // where will excute
        'filetype'      => ['image'],
        'note'          => 'Add slider image here!',
        'button_text'   => __('Attach Files', 'gfxweb'),
        'fields'        => $fields,
    );
    $attachments->register('slider', $args); // unique instance name
};
add_action('attachments_register', 'gfxweb_attachments');

//Register Testimonial Slider
function gfxweb_testimonial_attachments($attachments)
{
    $fields         = array(
        array(
            'name'      => 'name',
            'type'      => 'text',
            'label'     => __('Name', 'gfxweb'),
            'default'   => 'title',
        ),
        array(
            'name'      => 'company',
            'type'      => 'text',
            'label'     => __('Company', 'gfxweb'),
            'default'   => 'title',
        ),
        array(
            'name'      => 'position',
            'type'      => 'text',
            'label'     => __('Position', 'gfxweb'),
            'default'   => 'title',
        ),array(
            'name'      => 'testimonial',
            'type'      => 'textarea',
            'label'     => __('testimonial', 'gfxweb'),
            'default'   => 'title',
        ),
    );
    $args = array(
        'label'         => 'Client Testimonial',
        'post_type'     => array('page',), // where will excute
        'filetype'      => ['image'],
        'note'          => 'Add Testimonials here!',
        'button_text'   => __('Attach Files', 'gfxweb'),
        'fields'        => $fields,
    );
    $attachments->register('testimonials', $args); // unique instance name
};
add_action('attachments_register', 'gfxweb_testimonial_attachments');
