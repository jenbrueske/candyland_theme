<?php

/**
 * Custom WYSIWYG Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'custom-wysiwyg-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-wysiwyg';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$content_width = get_field('content_width');
$content = get_field('content') ?: 'Your content here';
$background_color = get_field('background_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if( $content_width == true ): ?>container<?php endif; ?>" style="background-color: <?php echo $background_color; ?>">
    <?php echo $content; ?>
</section>