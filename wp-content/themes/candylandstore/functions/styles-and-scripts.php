<?php 

/**
 * Proper way to enqueue scripts and styles
 */
// TO-DO: Change to minified file when going live
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/dist/css/style.css' );
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/dist/js/all.js' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
