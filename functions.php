<?php

/* ============
   Kesato & Co
============ */

require_once( 'cmb/custom-meta-boxes.php' );
require_once( 'cmb/meta-setting.php' );

function nav_menu(){
    register_nav_menus( array(
		'main-menu' => __( 'main-menu', 'kesato' )
	));
}
add_action( 'after_setup_theme', 'nav_menu' );

function kesato_setup(){
    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'kesato' ),
			'footer'  => __( 'Footer Menu', 'kesato' ),
		));
}
add_action( 'after_setup_theme', 'kesato_setup' );


// Create custom post type
add_action( 'init', 'exp_the_villa' );
flush_rewrite_rules();
function exp_the_villa() {
  register_post_type( 'exp_the_villa',
    array(
      'labels' => array(
        'name' => __( 'Experience at The Villa' ),
        'singular_name' => __( 'Experience at The Villa' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}

// Get the Exp-the-villa
function get_exp_the_villa() {
	$args = array('post_type' => 'exp_the_villa', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i%2 != 0) { ?>

				<div class="Block-accomodation half-mode Block-thevilla full-width">
		      <div class="Block-accomodation-left Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-39.jpg' class='img-responsive'>";
							}
						?>
		      </div>
		      <div class="Block-accomodation-right wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
		        <div class="Block-accomodation-main-title">
		          <div class="title"><?php the_title(); ?></div>
		        </div>
		        <div class="Block-accomodation-main-text">
		          <?php the_content();  ?>
		        </div>
		      </div>
		    </div>

				<?php
			}else { ?>

				<div class="Block-accomodation half-mode full-width">
					<div class="Block-accomodation-right wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
		        <div class="Block-accomodation-main-title">
		          <div class="title"><?php the_title(); ?></div>
		        </div>
		        <div class="Block-accomodation-main-text">
		          <?php the_content();  ?>
		        </div>
		      </div>
		      <div class="Block-accomodation-left Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-39.jpg' class='img-responsive'>";
							}
						?>
		      </div>
		    </div>

				<?php
			}

		endwhile;
		wp_reset_postdata();
	endif;

}

// Create custom post type => Experience beyond the Villa
add_action( 'init', 'exp_beyond_the_villa' );
flush_rewrite_rules();
function exp_beyond_the_villa() {
  register_post_type( 'exp_beyond_the_villa',
    array(
      'labels' => array(
        'name' => __( 'Experience Beyond The Villa' ),
        'singular_name' => __( 'Experience Beyond The Villa' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}

// Get the Exp-beyond_the-villa
function get_exp_beyond_the_villa() {
	$args = array('post_type' => 'exp_beyond_the_villa', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i%2 != 0) { ?>

				<div class="Block-accomodation half-mode full-width">
					<div class="Block-accomodation-left wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="Block-accomodation-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-accomodation-main-text">
							<?php the_content();  ?>
						</div>
					</div>
					<div class="Block-accomodation-right Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-39.jpg' class='img-responsive'>";
							}
						?>
					</div>
				</div>

				<?php
			}else { ?>

				<div class="Block-accomodation half-mode full-width">
					<div class="Block-accomodation-right Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-39.jpg' class='img-responsive'>";
							}
						?>
					</div>
					<div class="Block-accomodation-left wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="Block-accomodation-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-accomodation-main-text">
							<?php the_content();  ?>
						</div>
					</div>
				</div>

				<?php
			}

		endwhile;
		wp_reset_postdata();
	endif;

}

// Create custom post type => Rooms
add_action( 'init', 'rooms' );
flush_rewrite_rules();
function rooms() {
  register_post_type( 'rooms',
    array(
      'labels' => array(
        'name' => __( 'Rooms' ),
        'singular_name' => __( 'Rooms' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}

// Get the Rooms
function get_rooms() {
	$args = array('post_type' => 'rooms', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div class="Block-accomodation half-mode">
			<div class="Block-accomodation-right Block-accomodation-img wow fadeInDown block-image" data-wow-duration="1s" data-wow-delay="1s">
				<?php
					if ( get_the_post_thumbnail_url() ) { ?>
						<a href="<?php echo get_the_post_thumbnail_url() ?>" data-fancybox="group">
							<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo the_title(); ?>">
						</a>
					<?php
					}else { ?>
						<a href="<?php echo get_template_directory_uri() ?>/assets/images/accommodation/ISHQ-17.jpg" data-fancybox="group">
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/accommodation/ISHQ-17.jpg" alt="">
						</a>
					<?php
					}
				?>
			</div>
		</div>

		<?php
		endwhile;
		wp_reset_postdata();
	endif;

}

// Create custom post type => Celebration
add_action( 'init', 'celebration' );
flush_rewrite_rules();
function celebration() {
  register_post_type( 'celebration',
    array(
      'labels' => array(
        'name' => __( 'Celebration' ),
        'singular_name' => __( 'Celebration' )
      ),
      'public' => true,
      'has_archive' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}

// Get the Celebration
function get_celebration() {
	$args = array('post_type' => 'celebration', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i%2 != 0) { ?>

				<div class="Block-celebration half-mode wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
					<div class="Block-celebration-left wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
						<div class="Block-celebration-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-celebration-main-text">
							<?php the_content();  ?>
						</div>
					</div>
					<div class="Block-celebration-right Block-celebration-img">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-15.jpg' class='img-responsive' alt='ISHQ Accommodation'>";
							}
						?>
					</div>
				</div>

				<?php
			}else { ?>

				<div class="Block-celebration half-mode wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
					<div class="Block-celebration-right Block-celebration-img">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/experience/ISHQ-15.jpg' class='img-responsive' alt='ISHQ Accommodation'>";
							}
						?>
					</div>
					<div class="Block-celebration-left wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
						<div class="Block-celebration-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-celebration-main-text">
							<?php the_content();  ?>
						</div>
					</div>
				</div>

				<?php
			}

		endwhile;
		wp_reset_postdata();
	endif;

}


// Create custom post type => Exclusive Offers
add_action( 'init', 'offers' );
flush_rewrite_rules();
function offers() {
  register_post_type( 'offers',
    array(
      'labels' => array(
        'name' => __( 'Exclusive Offers' ),
        'singular_name' => __( 'Exclusive Offers' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}

// Get the Exclusive Offers
function get_offers() {
	$args = array('post_type' => 'offers', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i%2 != 0) { ?>

				<div class="Block-accomodation half-mode full-width">
					<div class="Block-accomodation-left wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="Block-accomodation-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-accomodation-main-text">
							<?php the_content();  ?>
						</div>
					</div>
					<div class="Block-accomodation-right Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/accommodation/ISHQ-17.jpg' class='img-responsive' alt='ISHQ Accommodation'>";
							}
						?>
					</div>
				</div>

				<?php
			}else { ?>

				<div class="Block-accomodation half-mode full-width">
					<div class="Block-accomodation-right Block-accomodation-img wow fadeInDown block-image half-width" data-wow-duration="1s" data-wow-delay="1s">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_stylesheet_directory_uri() ."/assets/images/accommodation/ISHQ-17.jpg' class='img-responsive' alt='ISHQ Accommodation'>";
							}
						?>
					</div>
					<div class="Block-accomodation-left wow fadeInDown half-width" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="Block-accomodation-main-title">
							<div class="title"><?php the_title(); ?></div>
						</div>
						<div class="Block-accomodation-main-text">
							<?php the_content();  ?>
						</div>
					</div>
				</div>

				<?php
			}

		endwhile;
		wp_reset_postdata();
	endif;

}


// Create custom post type => Gallery
add_action( 'init', 'gallery' );
flush_rewrite_rules();
function gallery() {
  register_post_type( 'gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Gallery' )
      ),
      'public' => true,
      'has_archive' => false,
			'supports' => array( 'title','thumbnail' )
    )
  );
}


// Get Gallery
function get_gallery() {
	$args = array('post_type' => 'gallery', 'posts_per_page' => -1);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :

		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 thumb-box">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumb-image">
					<a href="<?php echo get_site_url(); ?>/gallery/<?php global $post; echo $post->post_name; ?>">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}else {
								echo "<img src='". get_template_directory_uri() ."/assets/images/gallery-default.jpg' alt='ISHQ'>";
							}
						?>
						<span class="overlay"></span>
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumb-title">
					<?php the_title(); ?>
				</div>
			</div>
		</div>

		<?php

		endwhile;
		wp_reset_postdata();
	endif;

}

// Get Gallery Images
function get_gallery_images() {
	$images = get_post_meta(get_the_ID(), 'gallery_images', false);

	foreach ($images as $key => $img) {
			$img_url = wp_get_attachment_image_src($img, 'full'); ?>

			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 thumb-box">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumb-image">
            <a href="<?php echo $img_url[0]; ?>" data-fancybox="group" data-caption="<?php the_title(); ?>">
              <img src="<?php echo $img_url[0]; ?>" alt="ISHQ Images">
              <div class="overlay"></div>
            </a>
          </div>
        </div>
      </div>

	<?php
	}
}

function get_homepage_highlight_images() {
	if (have_posts()) : while (have_posts()) : the_post();
		$images = get_post_meta(get_the_ID(), 'highlight_images', false);

		foreach ($images as $key => $img) {
				$img_url = wp_get_attachment_image_src($img, 'medium');
				$img_urlfull = wp_get_attachment_image_src($img, 'full') ?>

				<div class="thumb">
					<a href="<?php echo $img_urlfull[0]; ?>" data-fancybox="group">
						<img src="<?php echo $img_url[0]; ?>" alt="ISHQ Highlight Images">
					</a>
				</div>

		<?php
		}
	endwhile; endif;
}


// Get Cuisine
function get_cuisine() {
	$images = get_post_meta(get_the_ID(), 'cuisine_images', false);

	foreach ($images as $key => $img) {
			$img_url = wp_get_attachment_image_src($img, 'full'); ?>

			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 thumb-box">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumb-image">
            <a href="<?php echo $img_url[0]; ?>" data-fancybox="group" data-caption="<?php the_title(); ?>">
              <img src="<?php echo $img_url[0]; ?>" alt="ISHQ Cuisine Images">
              <div class="overlay"></div>
            </a>
          </div>
        </div>
      </div>

	<?php
	}
}

// LOGO UPLOAD
function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm1_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Upload Logo', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'm1_logo',
    ) ) );
}
add_action( 'customize_register', 'm1_customize_register' );

function svgIcon($icon){
	$svg = [];
	$svg['facebook'] = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="3347.346 10602.857 9.643 18.571"><defs><style>.cls-1 { fill: #c5a083; }</style></defs><path id="Path_20830" data-name="Path 20830" class="cls-1" d="M3356.989 10602.991a21.871 21.871 0 0 0-2.545-.134 3.982 3.982 0 0 0-4.252 4.364v2.433h-2.846v3.3h2.846v8.475h3.415v-8.471h2.835l.435-3.3h-3.27v-2.109c0-.949.257-1.607 1.629-1.607h1.753z"/></svg>';

	$svg['twitter'] = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="3406.205 10605.714 17.589 14.286"><defs><style>.cls-1 { fill: #c5a083; }</style></defs><path id="Path_20832" data-name="Path 20832" class="cls-1" d="M3423.795 10607.411a7.227 7.227 0 0 1-2.076.558 3.6 3.6 0 0 0 1.581-1.987 7.1 7.1 0 0 1-2.288.871 3.6 3.6 0 0 0-2.634-1.138 3.6 3.6 0 0 0-3.6 3.6 4.069 4.069 0 0 0 .089.826 10.247 10.247 0 0 1-7.433-3.772 3.578 3.578 0 0 0-.491 1.819 3.6 3.6 0 0 0 1.607 3 3.631 3.631 0 0 1-1.63-.451v.045a3.605 3.605 0 0 0 2.89 3.537 3.811 3.811 0 0 1-.949.123 4.543 4.543 0 0 1-.681-.056 3.611 3.611 0 0 0 3.371 2.5 7.22 7.22 0 0 1-4.475 1.54 7.453 7.453 0 0 1-.871-.045 10.187 10.187 0 0 0 5.536 1.619 10.186 10.186 0 0 0 10.259-10.257c0-.156 0-.312-.011-.469a7.75 7.75 0 0 0 1.806-1.863z"/></svg>';
	
	$svg['pinterest'] = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="3373.428 10604.286 17.143 17.143"><defs><style>.cls-1 { fill: #c5a083; }</style></defs><path id="Path_20831" data-name="Path 20831" class="cls-1" d="M3390.57 10612.86a8.57 8.57 0 0 0-8.57-8.57 8.57 8.57 0 0 0-8.57 8.56 8.57 8.57 0 0 0 5.13 7.85 7.5 7.5 0 0 1 .15-1.96l1.1-4.67a3.57 3.57 0 0 1-.27-1.36c0-1.26.74-2.2 1.65-2.2a1.16 1.16 0 0 1 1.17 1.3 18.45 18.45 0 0 1-.76 3.02 1.33 1.33 0 0 0 1.34 1.65c1.63 0 2.72-2.08 2.72-4.55 0-1.9-1.27-3.3-3.57-3.3a4.06 4.06 0 0 0-4.23 4.1 2.5 2.5 0 0 0 .57 1.7.42.42 0 0 1 .12.48c-.04.16-.13.54-.18.68a.3.3 0 0 1-.42.22 3.32 3.32 0 0 1-1.75-3.28c0-2.43 2.06-5.36 6.12-5.36a5.13 5.13 0 0 1 5.44 4.92c0 3.37-1.88 5.88-4.63 5.88a2.43 2.43 0 0 1-2.1-1.07l-.6 2.34a7.1 7.1 0 0 1-.86 1.83 8.4 8.4 0 0 0 2.43.36 8.57 8.57 0 0 0 8.57-8.57z"/></svg>';

	$svg['instagram'] = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="3439.428 10604.285 17.144 17.145"><defs><style>.cls-1 { fill: #c5a083; }</style></defs><path id="Path_20833" data-name="Path 20833" class="cls-1" d="M3450.86 10612.86a2.86 2.86 0 0 1-2.86 2.85 2.86 2.86 0 0 1-2.86-2.84 2.86 2.86 0 0 1 2.86-2.86 2.86 2.86 0 0 1 2.86 2.86zm1.54 0a4.4 4.4 0 0 0-4.4-4.4 4.4 4.4 0 0 0-4.4 4.4 4.4 4.4 0 0 0 4.4 4.4 4.4 4.4 0 0 0 4.4-4.4zm1.2-4.58a1.02 1.02 0 0 0-1.03-1.03 1.02 1.02 0 0 0-1.02 1.03 1.02 1.02 0 0 0 1.02 1.03 1.02 1.02 0 0 0 1.03-1.02zm-5.6-2.45c1.25 0 3.93-.1 5.06.34a2.74 2.74 0 0 1 .98.65 2.74 2.74 0 0 1 .65.98c.43 1.13.33 3.8.33 5.06s.1 3.93-.35 5.05a2.74 2.74 0 0 1-.64 1 2.74 2.74 0 0 1-.98.64c-1.13.45-3.8.35-5.06.35s-3.93.1-5.06-.36a2.74 2.74 0 0 1-.98-.64 2.74 2.74 0 0 1-.65-.98c-.43-1.13-.33-3.8-.33-5.06s-.1-3.93.35-5.05a2.74 2.74 0 0 1 .64-.98 2.74 2.74 0 0 1 .98-.64c1.13-.45 3.8-.35 5.06-.35zm8.57 7.03c0-1.2 0-2.36-.06-3.54a5.1 5.1 0 0 0-1.37-3.6 5.1 5.1 0 0 0-3.6-1.38c-1.18-.07-2.35-.05-3.53-.05s-2.36-.03-3.54.04a5.1 5.1 0 0 0-3.6 1.4 5.1 5.1 0 0 0-1.38 3.58c-.06 1.18-.05 2.35-.05 3.54s0 2.35.05 3.54a5.1 5.1 0 0 0 1.4 3.6 5.1 5.1 0 0 0 3.58 1.37c1.18.07 2.36.06 3.54.06s2.35 0 3.54-.06a5.1 5.1 0 0 0 3.6-1.38 5.1 5.1 0 0 0 1.38-3.6c.06-1.2.05-2.36.05-3.54z"/></svg>';
	
	return $svg[$icon];
}