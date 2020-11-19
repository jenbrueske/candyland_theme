<?php
/**
 * Template Name: Blog
 */

get_header(); 
$hide_title = get_field('hide_title');

$args = array (
    'post_type' => 'post',
    'posts_per_page' => 5,
    'post_status' => 'publish'
);
$blog_query = new WP_Query( $args );
echo '<script type="text/javascript">console.log("blog_query: ", ' . json_encode( $blog_query ) . ');</script>';

?>

<div class="main">
    <div class="container mainContainer">
    <div class="post">
        <h1 class="page-title <?php if( $hide_title == true ): ?>hidden<?php endif; ?>"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
    <div class="blog_posts">
            <?php
            if( $blog_query->have_posts() ): ?>
                    <?php 
                        while ( $blog_query->have_posts() ) : $blog_query->the_post();
                        ?>
                        <div class="blogPost">
                            <div class="blogTitle--wrapper">
                                <div class="blogDate">
                                    <span class="blogDay"><?php echo get_the_date('j'); ?></span>
                                    <span class="blogMonth"><?php echo get_the_date('M'); ?></span>
                                </div>
                                <h2 class="blogTitle">
                                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                </h2>
                            </div>
                            <div class="blogContent">
                                <?php echo get_the_content(); ?>
                            </div>
                            <!-- <div class="blogImage">
                                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                            </div> -->
                        </div>
                        <?php
                        endwhile;
                    ?>
            <?php endif; ?>
        </div>
        <div class="blogSidebar">
            <?php dynamic_sidebar('sidebar_two'); ?>
        </div>
        <?php //get_template_part('template-parts/sidebar', 'one'); ?>
        <?php //get_template_part('template-parts/sidebar', 'two'); ?>

    </div>
</div> <!-- end div.main -->

<?php get_footer(); ?>