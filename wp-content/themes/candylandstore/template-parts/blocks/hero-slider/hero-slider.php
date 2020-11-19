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
$underHeader = get_field('under_header');
$underHeaderClass = $underHeader ? 'underHeader' : '';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $underHeaderClass; ?>">
        <?php
        if( have_rows('desktop_slider') ): ?>
            <div class="flexSlider">
                <div class="heroSlides">
                    <?php while ( have_rows('desktop_slider' ) ): the_row();
                        $slide_image = get_sub_field('slide_image');
                        // var_dump($slide_image);
                        $slide_link = get_sub_field('slide_link'); 
                    ?>
                        <div>
                            <?php if($slide_link): ?><a href="<?php echo $slide_link['url']; ?>" target="<?php echo $slide_link['target']; ?> "><?php endif; ?><img src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_image['alt']); ?>" /><?php if($slide_link): ?></a><?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
</section>