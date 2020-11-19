<?php

/**
 * Product Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'productSlider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'productSlider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$product_category = get_field('product_category');
$category_title = get_term($product_category)->name;
$category_slug = get_term($product_category)->slug;
$background_color = get_field('background_color');
echo '<script type="text/javascript">console.log("background_color: ", ' . json_encode( $background_color ) . ');</script>';
$args = array (
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy'  => 'product_cat',
                'field'     => 'term_id',
                'terms'     => $product_category,
            )
        ),
        'posts_per_page' => -1
);
$product_query = new WP_Query( $args );
echo '<script type="text/javascript">console.log("product_query: ", ' . json_encode( $product_query ) . ');</script>';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: <?php echo $background_color; ?>">
        <?php
        if( $product_query->have_posts() ): ?>
            <div class="flexSlider">
                <div class="productSlides">
                <?php 
                    while ( $product_query->have_posts() ) : $product_query->the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;
                ?>
                </div>
            </div>
            <div class="viewAll">
                <a href="/product-category/<?php echo $category_slug; ?>">View All <?php echo $category_title; ?></a>
            </div>
        <?php endif; ?>
</section>