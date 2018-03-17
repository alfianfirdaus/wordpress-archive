<?php
/**
 * Example functions to reference for developers.
 *
 * @package WordPress
 * @subpackage Custom Meta Boxes
 */

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes Existing metaboxes.
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	/**
	 * Example of all available fields.
	 */

	 // Frontpage
	 $meta_boxes[] = array(
		 'title'	 => 'Highlight Images',
		 'pages' 	 => 'page',
		 'show_on' => array('page-template' => array ('front-page.php')),
		 'fields'	 => array(
			 array(
				 'id'		 => 'highlight_images',
				 'name'	 => 'Upload Images - Maximum 5',
				 'repeatable' => true,
				 'repeatable_max' => 5,
				 'sortable' => true,
				 'type'	 => 'image',
				 'cols'	 => 12
			 )
		 )
	 );

		//  Page the Villa
		$meta_boxes[] = array(
			'title'		=> 'Repeatable Content',
			'pages'		=> 'page',
			'show_on' => array('page-template' => array ('templates/page-the-villa.php')),
			'fields'	=> array(
				array(
					'id'	=> 'repeatable_content',
					'type'=> 'group',
					'repeatable' => true,
					'fields' => array(
						array(
							'id'		=> 'villa_info',
							'name'	=> 'Information',
							'type'	=> 'wysiwyg',
							'cols'  => 10,
							'options' => array(
								'textarea_rows' => 10
							)
						),

						array(
							'id'   => 'villa_image',
							'name' => 'Image',
							'type' => 'image',
							'cols' => 2,
						)
					)
				)
			)
		);

		// Page Experience
		$meta_boxes[] = array(
			'title'		=> 'Additional Information',
			'pages'		=> 'page',
			'show_on' => array('page-template' => array ('templates/page-experience.php')),
			'fields' 	=> array (
				array(
					'id'		=> 'exp_info',
					'name'	=> 'Experience Information',
					'type'	=> 'wysiwyg',
					'cols'	=> 10,
					'options' => array(
						'textarea_rows' => 15
					)
				),

				array(
					'id'   => 'exp_image',
					'name' => 'Information Image',
					'type' => 'image',
					'cols' => 2,
				),
			)
		);

		// Page Contact
		$meta_boxes[] = array(
			'title'		=> 'Additional Information',
			'pages'		=> 'page',
			'show_on' => array('page-template' => array ('templates/page-contact.php')),
			'fields' 	=> array (
				array(
					'id'		=> 'title',
					'name'	=> 'Villa Title',
					'type'	=> 'text',
					'cols'	=> 2
				),

				array(
					'id'		=> 'phone',
					'name'	=> 'Phone',
					'type'	=> 'text',
					'cols'	=> 2
				),

				array(
					'id'		=> 'fax',
					'name'	=> 'Fax',
					'type'	=> 'text',
					'cols'	=> 2
				),

				array(
					'id'		=> 'email',
					'name'	=> 'Email',
					'type'	=> 'text',
					'cols'	=> 2
				),

				array(
					'id'		=> 'mailing_addr',
					'name'	=> 'Mailing Address',
					'type'	=> 'textarea',
					'cols'	=> 4,
					'options' => array(
						'textarea_rows' => 10
					)
				),
			)
		);

		// Gallery
		$meta_boxes[] = array(
			'title'		=> 'Gallery Images',
			'pages'		=> 'gallery',
			'fields' 	=> array (
				array(
					'id'		=> 'gallery_images',
					'name'	=> 'Upload Image',
					'repeatable' => true,
					'sortable' => true,
					'type'	=> 'image',
					'cols'	=> 12
				),
			)
		);

		// Cuisine
		$meta_boxes[] = array(
			'title'		=> 'Gallery Images',
			'pages'		=> 'page',
			'show_on' => array('page-template' => array ('templates/page-cuisine.php')),
			'fields' 	=> array (
				array(
					'id'		=> 'cuisine_images',
					'name'	=> 'Upload Image',
					'repeatable' => true,
					'sortable' => true,
					'type'	=> 'image',
					'cols'	=> 12
				),
			)
		);

	return $meta_boxes;



}
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
