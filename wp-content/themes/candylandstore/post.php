<?php
/**
 * The main template file
 */

get_header(); 
$hide_title = get_field('hide_title');
?>

<div class="main">
    <div class="container mainContainer">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="post">
            <h1 class="page-title <?php if( $hide_title == true ): ?>hidden<?php endif; ?>"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>

        <?php endwhile; endif; ?>

        <?php //get_template_part('template-parts/sidebar', 'one'); ?>
        <?php //get_template_part('template-parts/sidebar', 'two'); ?>

    </div>
</div> <!-- end div.main -->

<?php get_footer(); ?>