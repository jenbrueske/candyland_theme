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
            'mode'              => 'edit'
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
            'mode'              => 'edit'
        ));

        // register a WYSIWYG block.
        acf_register_block_type(array(
            'name'              => 'custom-wysiwyg',
            'title'             => __('Custom WYSIWYG'),
            'description'       => __('A custom wysiwyg block.'),
            'render_template'   => 'template-parts/blocks/custom-wysiwyg/custom-wysiwyg.php',
            'category'          => 'candyland-blocks',
            'align_text'        => true,
            'icon'              => 'admin-comments',
            'keywords'          => array( 'wysiwyg', 'custom' ),
            'mode'              => 'edit'
        ));

        // register a columns block.
        acf_register_block_type(array(
            'name'              => 'custom-columns',
            'title'             => __('Custom Columns'),
            'description'       => __('A custom columns block.'),
            'render_template'   => 'template-parts/blocks/custom-columns/custom-columns.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'columns', 'custom' ),
            'mode'              => 'edit'
        ));

        // register a divider block.
        acf_register_block_type(array(
            'name'              => 'divider',
            'title'             => __('Divider'),
            'description'       => __('A divider block.'),
            'render_template'   => 'template-parts/blocks/divider/divider.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'divider', 'custom' ),
            'mode'              => 'edit'
        ));

        // register a divider block.
        acf_register_block_type(array(
            'name'              => 'custom-content',
            'title'             => __('Custom Content'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'template-parts/blocks/custom-content/custom-content.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'content', 'custom' ),
            'mode'              => 'edit'
        ));

        // register a blog block.
        acf_register_block_type(array(
            'name'              => 'blog-section',
            'title'             => __('Blog Section'),
            'description'       => __('Shows 2 most recent blog posts'),
            'render_template'   => 'template-parts/blocks/blog-section/blog-section.php',
            'category'          => 'candyland-blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'blog', 'custom' ),
            'mode'              => 'edit'
        ));
    }
}