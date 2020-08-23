<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar One',
		'id'            => 'sidebar_one',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Sidebar Two',
		'id'            => 'sidebar_two',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
        // acf_add_options_sub_page(array(
        //     'page_title' 	=> 'Theme Header Settings',
        //     'menu_title'	=> 'Header',
        //     'parent_slug'	=> 'theme-general-settings',
        // ));
        
        // acf_add_options_sub_page(array(
        //     'page_title' 	=> 'Theme Footer Settings',
        //     'menu_title'	=> 'Footer',
        //     'parent_slug'	=> 'theme-general-settings',
        // ));
        
    }

/**
 * Proper way to enqueue scripts and styles
 */
// TO-DO: Change to minified file when going live
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/dist/css/main.css' );
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/dist/js/all.js' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
