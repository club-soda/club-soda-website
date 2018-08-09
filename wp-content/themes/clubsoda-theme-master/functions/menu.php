<?php
/**
 * This theme uses wp_nav_menu() in three locations.
 */
register_nav_menus( array(
	'home' => __( 'Home Page Menu', 'oystershell' ),
	'postscript' => __( 'Postscript Menu', 'oystershell' ),
	'postscript-two' => __( 'Postscript Menu Two', 'oystershell' ),
) );

/**
 * Associate menus with hooks
 */
add_action( 'oystershell_navmenu_primary', 'oystershell_display_navmenu_primary' );
add_action( 'oystershell_navmenu_postscript', 'oystershell_display_navmenu_postscript' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_navmenu_primary' ) ):
	/**
	 * Insert the primary navigation
	 */
	function oystershell_display_navmenu_primary() {

	?>
		<div id="main-navigation-left" class="medium-10 columns">
			<?php clubsoda_main_navigation(); ?>
		</div>
		<div id="main-navigation-right" class="hide-for-small-only medium-2 columns">
			<?php clubsoda_search_navigation(); ?>
		</div>
	<?php
	}
endif; // oystershell_display_navmenu_primary

/**
 * Insert the main navigation menu
 */
function clubsoda_main_navigation() {

	echo '<div class="clubsoda-nav">';

	wp_nav_menu( array(
		'theme_location'  => 'primary',
		'container_class' => 'navigation-menu main-navigation-menu',
		'menu_class'      => 'dropdown menu navigation-menu-list main-navigation-menu-list',
		'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
		'depth' => 3,
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

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_navmenu_postscript' ) ):
	/**
	 * Insert the postscript navigation menu
	 *
	 * @since Oystershell 1.0
	 */
	function oystershell_display_navmenu_postscript() {

		wp_nav_menu( array(
			'theme_location' => 'postscript',
			'container_class' => 'navigation-menu postscript-navigation-menu',
			'menu_class' => 'menu navigation-menu-list postscript-navigation-menu-list',
			'depth' => 1,
			'fallback_cb' => false,

		) );

		wp_nav_menu( array(
			'theme_location' => 'postscript-two',
			'container_class' => 'navigation-menu postscript-navigation-menu',
			'menu_class' => 'menu navigation-menu-list postscript-navigation-menu-list',
			'depth' => 1,
			'fallback_cb' => false,

		) );
	}
endif; // oystershell_display_navmenu_postscript

//------------------------------------------------------------------------------------
// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
