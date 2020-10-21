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
    <div class="container <?php echo $image_position; ?>" style="background-color: <?php echo $background_color; ?>">
    <div class="imageColumn <?php if( $image_overlay == true ): ?>overlay<?php endif; ?>">
        <?php 
            // echo $image_position;
            // echo $image['url'];
            // echo $image_overlay;
            // echo $image_overlay_text;
            // echo $background_color;
            ?>
        <?php if( $image_overlay == true ): ?>    
            <div class="overlayTextWrapper">
                <div class="overlayText">
                    <?php echo $image_overlay_text; ?>
                </div>
            </div>
        <?php endif; ?>
        <img src="<?php echo $image['url']; ?>" />
    <?php    ?>
    </div>
    <div class="contentColumn">
        <?php if( have_rows('column_content') ): ?>
            <?php while( have_rows('column_content') ): the_row();
                    $contentImage = get_sub_field('image');
                    $contentImage_position = get_sub_field('image_position');
                    $content = get_sub_field('content');
                    $button = get_sub_field('button');
                    $button_position = get_sub_field('button_position'); 
                    ?>
                    <div class="contentColumnItem">
                        <div class="customContentImage <?php echo $contentImage_position; ?>">
                            <img src="<?php echo $contentImage['url']; ?>" />
                        </div>
                        <div class="customContentWysiwyg">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="contentColumnButton">
                        <a class="btn" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    </div>
                    
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>