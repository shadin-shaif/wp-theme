<?php
add_action( 'cmb2_init', 'cmb2_add_img_info_metabox' );
function cmb2_add_img_info_metabox() {

	$prefix = '_gfxweb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'gfxweb' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'gfxweb' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'gfxweb' ),
		'id' => $prefix . 'location',
		'type' => 'text',
		'default' => 'bd',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'gfxweb' ),
		'id' => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed', 'gfxweb' ),
		'id' => $prefix . 'licensed',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed info', 'gfxweb' ),
		'id' => $prefix . 'licensed_info',
		'type' => 'textarea_small',
        'attributes' => array(
			'data-conditional-id' => $prefix . 'licensed',
		),
	) );
}