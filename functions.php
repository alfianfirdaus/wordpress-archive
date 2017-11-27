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
