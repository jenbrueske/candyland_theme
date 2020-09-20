<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar One',
		'id'            => 'sidebar_one',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Sidebar Two',
		'id'            => 'sidebar_two',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
        // acf_add_options_sub_page(array(
        //     'page_title' 	=> 'Theme Header Settings',
        //     'menu_title'	=> 'Header',
        //     'parent_slug'	=> 'theme-general-settings',
        // ));
        
        // acf_add_options_sub_page(array(
        //     'page_title' 	=> 'Theme Footer Settings',
        //     'menu_title'	=> 'Footer',
        //     'parent_slug'	=> 'theme-general-settings',
        // ));
        
    }

/**
 * Proper way to enqueue scripts and styles
 */
// TO-DO: Change to minified file when going live
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/dist/css/style.css' );
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/dist/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function register_my_menus() {
    register_nav_menus(
      array(
        'main-navigation' => __( 'Main Navigation' ),
        'footer' => __( 'Footer' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

  add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <div class="cart-contents--wrapper">
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Cart">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a>
      </div>
        <?php
	        
    return ob_get_clean();
 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}