<?php
/**
 * Oystershell child navigation functions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

//------------------------------------------------------------------------------------
function oystershell_mobile_navigation_scripts() {

	wp_register_script( 'oystershell-mobile-nav-script', get_stylesheet_directory_uri() . '/inc/mobile-nav-method4.js', array('jquery') );
	wp_enqueue_script( 'oystershell-mobile-nav-script' );

}
add_action( 'wp_enqueue_scripts', 'oystershell_mobile_navigation_scripts' );


/**
 * Insert the main navigation menu
 */
function clubsoda_main_navigation() {

	echo '<div class="clubsoda-nav">';

	wp_nav_menu( array( 
		'theme_location'  => 'primary',
		'container' => '',
		//'container_class' => 'navigation-menu main-navigation-menu',
		//'menu_class'      => 'navigation-menu-list main-navigation-menu-list',
		//'depth' => 1,
		'fallback_cb'     => false
	) );

	echo '</div>';
}

/**
 * Insert the search box
 */
function clubsoda_search_navigation() {

	echo '<div id="clubsoda-search">';

	get_search_form();

	echo '</div>';
}
