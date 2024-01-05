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
        ),
    );
    $args = array(
        'label'         => 'Post Slide',
        'post_type'     => array('post',),
        'filetype'      => ['image'],
        'note'          => 'Add slider image here!',
        'button_text'   => __('Attach Files', 'gfxweb'),
        'fields'        => $fields,
    );
    $attachments->register('slider', $args);
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
        ),
        array(
            'name'      => 'company',
            'type'      => 'text',
            'label'     => __('Company', 'gfxweb'),
        ),
        array(
            'name'      => 'position',
            'type'      => 'text',
            'label'     => __('Position', 'gfxweb'),
        ), array(
            'name'      => 'testimonial',
            'type'      => 'textarea',
            'label'     => __('testimonial', 'gfxweb'),
        ),
    );
    $args = array(
        'label'         => 'Client Testimonial',
        'post_type'     => array('page',),
        'filetype'      => ['image'],
        'note'          => 'Add Testimonials here!',
        'button_text'   => __('Attach Files', 'gfxweb'),
        'fields'        => $fields,
    );
    $attachments->register('testimonials', $args);
};
add_action('attachments_register', 'gfxweb_testimonial_attachments');

//register Team section fields
function gfxweb_team_register($attachments)
{
    $fields         = array(
        array(
            'name'      => 'name',
            'type'      => 'text',
            'label'     => __('Name', 'gfxweb'),
        ),
        array(
            'name'      => 'email',
            'type'      => 'text',
            'label'     => __('Email Address', 'gfxweb'),
        ),
        array(
            'name'      => 'company',
            'type'      => 'text',
            'label'     => __('Company Name', 'alpha'),
        ),
        array(
            'name'      => 'position',
            'type'      => 'text',
            'label'     => __('Position', 'gfxweb'),
        ),
        array(
            'name'      => 'bio',
            'type'      => 'textarea',
            'label'     => __('Bio', 'gfxweb'),
        )
    );
    $args = array(

        'label'         => 'Team Members',
        'post_type'     => array('page'),
        'filetype'      => ['image'],
        'note'          => 'Add a team members',
        'button_text'   => __('Team', 'gfxweb'),
        'fields'        => $fields,
    );
    $attachments->register('team', $args);
}
add_action('attachments_register', 'gfxweb_team_register');
