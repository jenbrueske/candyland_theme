<?php 

function candyland_block_categories( $categories, $post ) {
    if ( $post->post_type !== 'page') {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'candyland-blocks',
                'title' => __( 'Candyland Blocks', 'candyland-blocks' ),
                'icon'  => 'admin-appearance',
            ),
        )
    );
}
add_filter( 'block_categories', 'candyland_block_categories', 10, 2 );


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
            'category'          => 'Candyland Blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));

        // register a hero slider block.
        acf_register_block_type(array(
            'name'              => 'hero-slider',
            'title'             => __('Hero Slider'),
            'description'       => __('A custom hero slider block.'),
            'render_template'   => 'template-parts/blocks/hero-slider/hero-slider.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'hero', 'slider' ),
        ));

        // register a product carousel block.
        acf_register_block_type(array(
            'name'              => 'product-carousel',
            'title'             => __('Product Carousel'),
            'description'       => __('A custom product carousel block.'),
            'render_template'   => 'template-parts/blocks/product-carousel/product-carousel.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'product', 'carousel' ),
        ));

        // register a WYSIWYG block.
        acf_register_block_type(array(
            'name'              => 'custom-wysiwyg',
            'title'             => __('Custom WYSIWYG'),
            'description'       => __('A custom wysiwyg block.'),
            'render_template'   => 'template-parts/blocks/custom-wysiwyg/custom-wysiwyg.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'edit-large',
            'keywords'          => array( 'wysiwyg', 'custom' ),
        ));
    }
}