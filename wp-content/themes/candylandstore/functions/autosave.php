<?php 

add_action( 'admin_init', 'disable_autosave' );

function disable_autosave() {
    wp_deregister_script( 'autosave' );
}