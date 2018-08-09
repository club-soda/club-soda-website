<?php

add_action( 'widgets_init', 'oystershell_widgets_init' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_widgets_init' ) ):
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Oyster Shell 1.0
 */
function oystershell_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Default', 'oystershell' ),
		'id' => 'default',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Pages', 'oystershell' ),
		'id' => 'single-page',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Articles', 'oystershell' ),
		'id' => 'single-post',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Other Items', 'oystershell' ),
		'id' => 'single-item',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Logged Out Home Middle Full Width', 'oystershell' ),
		'id' => 'home-out-middle-fullwidth',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Logged Out Home Middle Widgets', 'oystershell' ),
		'id' => 'home-out-middle-widgets',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="column column-block widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Logged In Home Middle Widgets', 'oystershell' ),
		'id' => 'home-in-middle-widgets',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="column column-block widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Logged In Home Middle Full Width', 'oystershell' ),
		'id' => 'home-in-middle-fullwidth',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Bottom Widgets', 'oystershell' ),
		'id' => 'home-bottom-widgets',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="column column-block widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Bottom Fullwidth', 'oystershell' ),
		'id' => 'home-bottom-fullwidth',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="medium-10 large-7 medium-centered column widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
endif; // oystershell_widgets_init
