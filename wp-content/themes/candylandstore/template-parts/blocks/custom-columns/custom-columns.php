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
$id = 'customColumns-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'customColumns';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$columns = get_field('columns');
$custom_columns = get_field('custom_columns');
$learn_more_button_image = get_field('learn_more_button_image', 'option');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
    <?php if( have_rows('custom_columns') ): ?>
        <div class="customColumns__wrapper layout--<?php echo $columns; ?>">
            <?php while( have_rows('custom_columns') ): the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $learn_more_button = get_sub_field('learn_more_button');
            ?>

            <div class="customColumns__item">
                <?php if( $image ): ?>
                    <img class="customColumns__image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                <?php endif; ?>
                <?php if( $title ): ?>
                    <h2 class="customColumns__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if( $content ): ?>
                    <p class="customColumns__content"><?php echo $content; ?></p>
                <?php endif; ?>
                <?php if( $learn_more_button ): ?>
                    <a class="customColumns__learnMoreButton" href="<?php echo $image['url'] ?>"><img class="learnMoreButton__image" src="<?php echo $learn_more_button_image['url']; ?>" /></a>
                <?php endif; ?>
            </div>
                <?php endwhile; ?>

        </div>
                <?php endif; ?>
    </div>
</section>