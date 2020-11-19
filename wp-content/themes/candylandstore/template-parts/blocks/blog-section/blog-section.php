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
$id = 'blogSection-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blogSection';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$overlay_color = get_field('overlay_color');
$background_image = get_field('background_image');
$heading = get_field('heading');
$subheading = get_field('subheading');
$link = get_field('link');
$args = array (
    'post_type' => 'post',
    'posts_per_page' => 2,
    'post_status' => 'publish'
);
$blog_query = new WP_Query( $args );
echo '<script type="text/javascript">console.log("blog_query: ", ' . json_encode( $blog_query ) . ');</script>';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url('<?php echo $background_image['url']; ?>');">
    <div class="container overlay">
        <h2 class="blog_heading"><?php echo $heading; ?></h2>
        <div class="blog_subheading"><?php echo $subheading; ?></div>
        <div class="blog_link">
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        </div>
        <div class="blog_posts">
            <?php
            if( $blog_query->have_posts() ): ?>
                    <?php 
                        while ( $blog_query->have_posts() ) : $blog_query->the_post();
                        ?>
                        <div class="blogPost">
                            <div class="blogImage">
                                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                            </div>
                            <div class="blogTitle">
                                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </div>
                            <div class="blogDate">
                            <i class="far fa-clock"></i><?php echo get_the_date('j M Y'); ?>
                            </div>
                            <div class="blogExcerpt">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <div class="blogReadMore">
                                <a href="<?php echo get_permalink(); ?>">READ MORE</a>
                            </div>
                        </div>
                        <?php
                        endwhile;
                    ?>
            <?php endif; ?>
        </div>
    </div>
</section>