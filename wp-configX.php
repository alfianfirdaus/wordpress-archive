<?php 

// Disable all wordpress auto-update
define( 'WP_AUTO_UPDATE_CORE', false );

// Disable Plugin auto-update
add_filter( 'auto_update_plugin', '__return_false' );

// Disable Theme auto-update
add_filter( 'auto_update_theme', '__return_false' );

?>