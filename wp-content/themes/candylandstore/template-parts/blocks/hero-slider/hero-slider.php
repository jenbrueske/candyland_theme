<?php

/**
 * Hero Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'heroSlider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'heroSlider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$desktop_slider = get_field('desktop_slider') ?: 'Your images here...';
$underHeader = get_field('under_header');
$underHeaderClass = $underHeader ? 'underHeader' : '';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $underHeaderClass; ?>">
        <?php
        if( $desktop_slider ): ?>
            <div class="flexSlider">
                <div class="heroSlides">
                    <?php foreach( $desktop_slider as $desktop_slide ): ?>
                        <div>
                            <img src="<?php echo esc_url($desktop_slide['url']); ?>" alt="<?php echo esc_attr($desktop_slide['alt']); ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
</section>