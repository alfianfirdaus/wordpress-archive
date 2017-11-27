<?php 

// Get ID by Title
$page = get_page_by_title('slug');
$page->ID;

// Get ID by slug
$page = get_page_by_path('slug' );
$page->ID;

$post = get_post();
echo $post->ID;

// WP_Query
$args = array( 'post_type' => 'page', 'post_per_page' => -1 );
$post = new WP_Query( $args );
echo $post->ID;


if (have_posts()) : while (have_posts()) : the_post();

endwhile; endif;

// Get The Page ID You Need
get_option( 'woocommerce_shop_page_id' ); 
get_option( 'woocommerce_cart_page_id' ); 
get_option( 'woocommerce_checkout_page_id' );
get_option( 'woocommerce_pay_page_id' ); 
get_option( 'woocommerce_thanks_page_id' ); 
get_option( 'woocommerce_myaccount_page_id' ); 
get_option( 'woocommerce_edit_address_page_id' ); 
get_option( 'woocommerce_view_order_page_id' ); 
get_option( 'woocommerce_terms_page_id' ); 

global $post;
if( is_shop() ){
  $pageID = woocommerce_get_page_id('shop');
}else{
  $pageID = $post->ID;
}

?>