<!-- meta-setting.php -->
<?php 

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

?>


<?php

$field_data = get_post_meta( get_the_id(), 'repeatable_content', false );

foreach ( $field_data as $single_field ) { ?>

  <div class="Block-thevilla half-mode">
    <div class="Block-thevilla-left wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="Block-thevilla-main-text">
        <?php echo wpautop( $single_field['villa_info'] ); ?>
      </div>
    </div>
    <div class="Block-thevilla-right Block-thevilla-img wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
      <?php
        $right_image =  $single_field['villa_image'];
        $img_url = wp_get_attachment_url( $right_image );
        printf('<img src="%s" alt="ISHQ Images" class="img-responsive">', $img_url);
      ?>
    </div>
  </div>

<?php
}

?>