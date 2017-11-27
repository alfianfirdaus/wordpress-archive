<?php 

function opengraph() {
    global $post;

    if( is_single() ) {
        $post = get_post();

        if ( has_post_thumbnail($post->ID) ) {
          $thumbID = get_post_thumbnail_id( $post );
          $img_src = get_the_post_thumbnail_url( $post, 'thumbnail' );
        }else {
          $img_src = get_stylesheet_directory_uri() . '/img/tsiqoh-logo-cropped.jpg';
        }

        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>  

<meta property="og:title" content="<?php echo the_title(); ?>"/>
<meta property="og:description" content="<?php echo $excerpt; ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
<meta property="og:image" content="<?php echo $img_src; ?>"/>

<?php
    } else {
        return;
    }
}
add_action('wp_head', 'opengraph', 5);

?>