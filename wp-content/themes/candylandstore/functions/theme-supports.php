<?php

function candyland_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}

add_action( 'after_setup_theme', 'candyland_add_woocommerce_support' );

add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
    return 'thumbnail';
} );

add_action( 'after_setup_theme', 'yourtheme_setup' );
 
function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}

add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

//add qty next to quick add buttons on category pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );

function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() )
{
$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
        $html .= woocommerce_quantity_input( array(), $product, false );
$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
$html .= '</form>';
}
return $html;
}

# Removes products count after categories name
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() { return; }

# Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );



# Removing the plugins trash
add_action('wp_print_styles','dequeue_my_CSS', 100); // important to add the priority
function dequeue_my_CSS() {
wp_dequeue_style('Open-Sans-google-font');
wp_deregister_style('Open-Sans-google-font');
}



# Remove query strings from static resources
function _remove_query_strings_1( $src ){
$rqs = explode( '?ver', $src );
return $rqs[0];
}
if ( is_admin() ) {
# Remove query strings from static resources disabled in admin
} else {
add_filter( 'script_loader_src', '_remove_query_strings_1', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_1', 15, 1 );
}

function _remove_query_strings_2( $src ){
$rqs = explode( '&ver', $src );
return $rqs[0];
}
if ( is_admin() ) {
# Remove query strings from static resources disabled in admin
} else {
add_filter( 'script_loader_src', '_remove_query_strings_2', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_2', 15, 1 );
}

add_filter( 'disable_wpseo_json_ld_search', '__return_true' );



# Disable the emoji's
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );


# Filter function used to remove the tinymce emoji plugin
function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}

//add member shortcode
add_shortcode( 'member', 'member_check_shortcode' );

function member_check_shortcode( $atts, $content = null ) {
if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
return $content;
return '';
}

add_filter( 'woocommerce_email_order_meta_fields', 'custom_woocommerce_email_order_meta_fields', 10, 3 );

function custom_woocommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
$fields['meta_key'] = array(
'label' => __( 'Label' ),
'value' => get_post_meta( $order->id, 'meta_key', true ),
);
return $fields;
}

add_filter('woocommerce_package_rates', 'wf_sort_shipping_methods', 10, 2);

function wf_sort_shipping_methods($available_shipping_methods, $package)
{
// Arrange shipping methods as per your requirement
$sort_order	= array(
'BE_Table_Rate_Shipping'  =>  array(),
'click-and-pick_shipping_method'  =>  array(),
'local_pickup'		=>	array(),
'legacy_flat_rate'	=>	array(),		
);

// unsetting all methods that needs to be sorted
foreach($available_shipping_methods as $carrier_id => $carrier){
$carrier_name	=	current(explode(":",$carrier_id));
if(array_key_exists($carrier_name,$sort_order)){
    $sort_order[$carrier_name][$carrier_id]	=		$available_shipping_methods[$carrier_id];
    unset($available_shipping_methods[$carrier_id]);
}
}

// adding methods again according to sort order array
foreach($sort_order as $carriers){
$available_shipping_methods	=	array_merge($available_shipping_methods,$carriers);
}
return $available_shipping_methods;
}

function candyland_notice_shipping() {
global $woocommerce;
$order_shipping_total = floatval(preg_replace('/[^a-zA-Z0-9\s .]/', '', strip_tags(html_entity_decode($woocommerce->cart->get_cart_shipping_total()))));

if ($order_shipping_total >= 25) {
    echo '<p id="ship">If you have any concerns with the shipping price, please call 651-292-1191 and we can double check rates for you.</p>';
}
else {
echo '';
}
}

add_action( 'woocommerce_review_order_before_payment', 'candyland_notice_shipping' );
add_action( 'woocommerce_cart_totals_after_shipping', 'candyland_notice_shipping' );

function custom_my_account_menu_items( $items ) {
unset($items['downloads']);
return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );