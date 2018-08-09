<?php

/**
 * The file that contains admin-specific functionality of the plugin
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/admin
 */

/**
 * The class that defines admin-specific functionality of the plugin.
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/admin
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The field name prefix for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prefix    The field name prefix for this plugin.
	 */
	private $prefix;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 	1.0.0
	 * @param   string    $plugin_name       The name of this plugin.
	 * @param   string    $version    The version of this plugin.
	 * @param 	string    $prefix    The field name prefix for this plugin.
	 */
	public function __construct( $plugin_name, $version, $prefix ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->prefix = $prefix;

	}

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Options screen tabs.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $tabs = array( 'general', 'home', );

	/**
	 * Register the administration menu for this plugin into the WordPress settings menu.
	 *
	 * Hooked to 'admin_menu' action.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

	    $page_title = __( 'Club Soda Settings', 'plugin-text-domain' );
	    $menu_title = __( 'Club Soda', 'plugin-text-domain' );
	    $capability = 'manage_options';
	    $menu_slug = $this->plugin_name;
	    $function = array( $this, 'display_plugin_admin_page' );
	    $icon_url = '';
	    $position = 40;

		$this->plugin_screen_hook_suffix = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		// Include CMB CSS in the head
		add_action( "admin_print_styles-{$this->plugin_screen_hook_suffix}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );

	}

	/**
	 * Organises the plugin admin menu - adding pages to manage taxonomies.
	 *
	 * @since    1.0.0
	 */
	public function add_taxonomy_admin_menus() {

		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=clubsoda_goal');
		remove_submenu_page('edit.php?post_type=clubsoda_events', 'edit-tags.php?taxonomy=category&amp;post_type=clubsoda_events');
    	remove_submenu_page('edit.php?post_type=clubsoda_events', 'edit-tags.php?taxonomy=post_tag&amp;post_type=clubsoda_events');
		remove_submenu_page('edit.php?post_type=clubsoda_events', 'edit-tags.php?taxonomy=clubsoda_region&amp;post_type=clubsoda_events');
		remove_submenu_page('edit.php?post_type=clubsoda_events', 'edit-tags.php?taxonomy=clubsoda_goal&amp;post_type=clubsoda_events');
		remove_submenu_page('edit.php?post_type=clubsoda_events', 'edit-tags.php?taxonomy=clubsoda_event_type&amp;post_type=clubsoda_events');
		remove_submenu_page('edit.php?post_type=clubsoda_offers', 'edit-tags.php?taxonomy=category&amp;post_type=clubsoda_offers');
    	remove_submenu_page('edit.php?post_type=clubsoda_offers', 'edit-tags.php?taxonomy=post_tag&amp;post_type=clubsoda_offers');
		remove_submenu_page('edit.php?post_type=clubsoda_offers', 'edit-tags.php?taxonomy=clubsoda_region&amp;post_type=clubsoda_offers');
		remove_submenu_page('edit.php?post_type=clubsoda_offers', 'edit-tags.php?taxonomy=clubsoda_goal&amp;post_type=clubsoda_offers');
		remove_submenu_page('edit.php?post_type=clubsoda_offers', 'edit-tags.php?taxonomy=clubsoda_offers_type&amp;post_type=clubsoda_offers');
		remove_submenu_page('edit.php?post_type=clubsoda_resources', 'edit-tags.php?taxonomy=category&amp;post_type=clubsoda_resources');
    	remove_submenu_page('edit.php?post_type=clubsoda_resources', 'edit-tags.php?taxonomy=post_tag&amp;post_type=clubsoda_resources');
		remove_submenu_page('edit.php?post_type=clubsoda_resources', 'edit-tags.php?taxonomy=clubsoda_goal&amp;post_type=clubsoda_resources');
		remove_submenu_page('edit.php?post_type=clubsoda_resources', 'edit-tags.php?taxonomy=clubsoda_resources_type&amp;post_type=clubsoda_resources');

		add_submenu_page( $this->plugin_name, 'Settings', 'Settings', 'edit_others_posts', $this->plugin_name, array( $this, 'display_plugin_admin_page' ) );
		add_submenu_page( $this->plugin_name, 'Categories', 'Categories', 'edit_others_posts', 'edit-tags.php?taxonomy=category');
		add_submenu_page( $this->plugin_name, 'Tags', 'Tags', 'edit_others_posts', 'edit-tags.php?taxonomy=post_tag');
		add_submenu_page( $this->plugin_name, 'Goals', 'Goals', 'edit_others_posts', 'edit-tags.php?taxonomy=clubsoda_goal');
		add_submenu_page( $this->plugin_name, 'Regions', 'Regions', 'edit_others_posts', 'edit-tags.php?taxonomy=clubsoda_region');
		add_submenu_page( $this->plugin_name, 'Types of Event', 'Event Type', 'edit_others_posts', 'edit-tags.php?taxonomy=clubsoda_event_type');
		add_submenu_page( $this->plugin_name, 'Types of Support Offer', 'Offer Type', 'edit_others_posts', 'edit-tags.php?taxonomy=clubsoda_offers_type');
		add_submenu_page( $this->plugin_name, 'Types of Resources', 'Resource Type', 'edit_others_posts', 'edit-tags.php?taxonomy=clubsoda_resources_type');

	}

	/**
	 * Ensures that the proper top level menu is highlighted
	 *
	 * @since    1.0.0
	 */
	public function taxonomy_admin_menus_correction($parent_file) {
		global $current_screen;
		$taxonomy = $current_screen->taxonomy;
		if ( $taxonomy == 'category' || $taxonomy == 'post_tag' || $taxonomy == 'clubsoda_goal' || $taxonomy == 'clubsoda_region' || $taxonomy == 'clubsoda_event_type' || $taxonomy == 'clubsoda_offers_type' || $taxonomy == 'clubsoda_resources_type' || $taxonomy == 'skill_level')
			$parent_file = $this->plugin_name;
		return $parent_file;
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * Hooked to 'plugin_action_links_[plugin-name]' filter.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', 'plugin-text-domain' ) . '</a>'
			),
			$links
		);

	}

	/**
	 * Set up plugin settings.
	 *
	 * Hooked to 'admin_init' action.
	 *
	 * @since    1.0.0
	 */
	public function initialize_plugin_options() {

		foreach ($this->tabs as $tab) {

			$key = $this->prefix . 'options_' . $tab;
			register_setting( $key, $key );
		}
	}

	/**
	 * Register custom metaboxes with WordPress.
	 *
	 * Hooked to 'cmb2_admin_init' action.
	 *
	 * @since    1.0.0
	 */
	public function register_metaboxes() {

		$metaboxes = new OSS_ClubSoda_Metaboxes( $this->prefix );
		$metaboxes->register_admin_metaboxes();

		//Add additional notices for CMB2 metaboxes
		$this->hook_save_notices();		
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {

		if ( !current_user_can( 'manage_options' ) )  { 
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'plugin-text-domain' ) );
		}

		$this->admin_switch();
	}

	/*------------------------------------------------------------------------
	SWITCH */

	/**
	 * Main process switch.
	 *
	 * @since    1.0.0
	 */
	public function admin_switch() {

		$action = '';

		if(isset($_GET["action"]))
			$action = $_GET["action"];

		if(isset($_POST["action"]))
			$action = $_POST["action"];

		switch($action) {
			case 'general':
				$this->do_action_default( $action );
			break;	
			case 'home':
				$this->do_action_default( $action );
			break;	
			default:
				$this->do_action_default( 'general' );
			break;	
		}
	}

	/*------------------------------------------------------------------------
	DEFAULT */

	/**
	 * Display the default page.
	 *
	 * @since    1.0.0
	 */
	public function do_action_default( $action ) {

		$key = $this->prefix . 'options_' . $action;
		$metabox_id = $key . '_metaboxes';

		include_once( 'partials/oss-clubsoda-admin-display.php' );
	}

	/*------------------------------------------------------------------------
	DISPLAY FUNCTIONS */

	/**
	 * Display tabs.
	 *
	 * @since    1.0.0
	 */
	public function display_tabs( $action ) {

		if ($action == '') {
			$action = 'general';
		}

		$output = '<h2 class="nav-tab-wrapper">';

		foreach ($this->tabs as $tab) {

			$link = admin_url( 'options-general.php?page=' . $this->plugin_name . '&action=' . $tab );
			$active = '';
			if ($action == $tab) {
				$active = 'nav-tab-active';
			}
			$output = $output . '<a href="' . $link . '" class="nav-tab ' . $active . '">' . __( ucfirst($tab), 'plugin-text-domain' ) . '</a>';
		}

		$output = $output . '</h2>';

		echo $output;
	}

	/**
	 * Hook in our save notices for options pages
	 *
	 * @since    1.0.0
	 */
	public function hook_save_notices() {
	
		foreach ($this->tabs as $tab) {

			$key = $this->prefix . 'options_' . $tab;
			$metabox_id = $key . '_metaboxes';
			add_action( "cmb2_save_options-page_fields_{$metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
		}
	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
	
		foreach ($this->tabs as $tab) {

			$key = $this->prefix . 'options_' . $tab;

			if ( $object_id !== $key || empty( $updated ) ) {
				// do nothing

			} else {
				add_settings_error( $key . '-notices', '', __( 'Settings updated.', 'plugin-text-domain' ), 'updated' );
				settings_errors( $key . '-notices' );				
			}
		}
	}

	/*------------------------------------------------------------------------
	MAKE LIST TABLE COLUMNS SORTABLE */

	/**
	* Defines which ldhg_events columns are sortable
	*
	* @param array $columns Existing sortable columns
	* @return array New sortable columns
	*/
	function events_cpt_define_sortable_table_columns( $columns ) {
	 
	    $columns['_clubsoda_event_date'] = 'event_date';
	     
	    return $columns; 
	}

	/**
	* Inspect the request to see if we are on the ldhg_event WP_List_Table and attempting to
	* sort by historical date.  If so, amend the Posts query to sort by
	* that custom meta key
	*
	* @param array $vars Request Variables
	* @return array New Request Variables
	*/
	function orderby_sortable_table_columns( $vars ) {
	 
	    // Don't do anything if we are not on the Contact Custom Post Type
		if ( ! isset( $vars['post_type'] ) )  return $vars;
 
		$post_types = array( 'clubsoda_events', );
		if ( !in_array( $vars['post_type'], $post_types ) ) return $vars;
     
	    // Don't do anything if no orderby parameter is set
	    if ( ! isset( $vars['orderby'] ) ) return $vars;
	     
	    // Check if the orderby parameter matches one of our sortable columns
        switch ( $vars['orderby'] ) {
	    	case 'event_date':
		        // Add orderby meta_value and meta_key parameters to the query
		        $vars = array_merge( $vars, array(
		            'meta_key' => '_clubsoda_event_date',
		            'orderby' => 'meta_value_num',
		        ));
		  		break;
	    	default:
	    		return $vars; 
	    		break;
	    }
	     
	    return $vars; 
	}

}