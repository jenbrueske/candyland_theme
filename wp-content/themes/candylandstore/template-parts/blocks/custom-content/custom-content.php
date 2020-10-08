<?php

/**
 * Custom Custom Columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customContent-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'customContent';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$image_position = get_field('image_position');
$image = get_field('image');
$image_overlay = get_field('image_overlay');
$image_overlay_text = get_field('image_overlay_text');
$background_color = get_field('background_color');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: <?php echo $background_color; ?>">
    <div class="container">
    <div class="imageColumn">
        <?php 
            echo $image_position;
            echo $image['url'];
            echo $image_overlay;
            echo $image_overlay_text;
            echo $background_color;
        ?>
    </div>
    <div class="flexibleContent">
        <?php if( have_rows('flexible_content') ): ?>
            <?php while( have_rows('flexible_content') ): the_row(); ?>
                <?php if( get_row_layout() == 'image' ):
                    $contentImage = the_sub_field('image');
                    $contentImage_position = get_sub_field('image_position');
                    echo $contentImage['url'];
                    echo $contentImage_position; 
                    ?>
                <?php elseif( get_row_layout() == 'content' ): 
                    $content = get_sub_field('content');
                    echo $content;
                ?>
                <?php elseif( get_row_layout() == 'button' ): 
                    $button = get_sub_field('button');
                    echo $button['url'];
                    $button_position = get_sub_field('button_position');
                ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>