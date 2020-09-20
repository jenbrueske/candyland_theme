<?php 

// Register Menus
function register_my_menus() {
    register_nav_menus(
      array(
        'main-navigation' => __( 'Main Navigation' ),
        'footer' => __( 'Footer' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );