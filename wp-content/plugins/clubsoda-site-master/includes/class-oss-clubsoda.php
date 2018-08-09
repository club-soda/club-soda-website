<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Oss_ClubSoda_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The prefix for field names to be used throughout the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $prefix    The prefix for field names to be used throughout the plugin.
	 */
	protected $prefix;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'oss-clubsoda';
		$this->version = '1.0.0';
		$this->prefix = '_clubsoda_';

		$this->load_dependencies();
		$this->load_libraries();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Oss_ClubSoda_Loader. Orchestrates the hooks of the plugin.
	 * - Oss_ClubSoda_i18n. Defines internationalization functionality.
	 * - Oss_ClubSoda_Admin. Defines all hooks for the admin area.
	 * - Oss_ClubSoda_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-i18n.php';

		/**
		 * The class responsible for defining a custom post type
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-cpt-events.php';

		/**
		 * The class responsible for defining a custom post type
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-cpt-offers.php';

		/**
		 * The class responsible for defining a custom post type
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-cpt-resources.php';

		/**
		 * The class responsible for defining custom taxonomies
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-taxonomies.php';

		/**
		 * The class responsible for defining custom metaboxes
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-metaboxes.php';

		/**
		 * The class responsible for defining post relationships
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-relationships.php';

		/**
		 * The class responsible for defining a custom post type
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-goals-cpt-goals.php';

		/**
		 * 
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-goals-ui.php';

		/**
		 * The class responsible for defining a custom post type
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-audits-cpt-audits.php';

		/**
		 * 
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-oss-clubsoda-audits-ui.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-oss-clubsoda-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-oss-clubsoda-public.php';

		$this->loader = new OSS_ClubSoda_Loader();

	}

	/**
	 * Load the required Oystershell Core libraries for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_libraries() {

		/**
		 * Load the Oystershell Core library
		 * Essential classes and helper functions for the Oystershell framework.
		 */
		add_action( 'plugins_loaded', 'osc_load_library_oystershell', 0 );

		/**
		 * Load the CMB2 library
		 * CMB2 is a developer's toolkit for building metaboxes, custom fields, and forms for WordPress.
		 */
		add_action( 'plugins_loaded', 'osc_load_library_cmb2', 0 );

		/**
		 * Load the CMB2 library
		 * CMB2 is a developer's toolkit for building metaboxes, custom fields, and forms for WordPress.
		 */
		add_action( 'plugins_loaded', 'osc_load_library_cmb2_conditionals', 0 );

		/**
		 * Load the CMB2 library
		 * CMB2 is a developer's toolkit for building metaboxes, custom fields, and forms for WordPress.
		 */
		//add_action( 'plugins_loaded', 'osc_load_library_cmb2_field_slider', 0 );

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Oss_ClubSoda_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new OSS_ClubSoda_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new OSS_ClubSoda_Admin( $this->get_plugin_name(), $this->get_version(), $this->get_prefix() );

		// Add the options page and menu item.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_taxonomy_admin_menus' );
		$this->loader->add_action( 'parent_file', $plugin_admin, 'taxonomy_admin_menus_correction' );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );

		// Initialize the settings options.
		$this->loader->add_action( 'admin_init', $plugin_admin, 'initialize_plugin_options' );

		// Register custom metaboxes used in the admin.
		$this->loader->add_action( 'cmb2_admin_init', $plugin_admin, 'register_metaboxes' );

		// Make list table columns sortable.
		$this->loader->add_filter( 'manage_edit-clubsoda_events_sortable_columns', $plugin_admin, 'events_cpt_define_sortable_table_columns' );
 		$this->loader->add_filter( 'request', $plugin_admin, 'orderby_sortable_table_columns' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new OSS_ClubSoda_Public( $this->get_plugin_name(), $this->get_version(), $this->get_prefix() );

		// Register custom post types.
		$this->loader->add_action( 'init', $plugin_public, 'register_post_types' );

		// Register custom taxonomies.
		$this->loader->add_action( 'init', $plugin_public, 'register_taxonomies' );

		// Register custom meta fields for taxonomies.
		$this->loader->add_action( 'init', $plugin_public, 'register_term_meta' );

		// Register post relationships.
		$this->loader->add_action( 'plugins_loaded', $plugin_public, 'check_for_p2p_plugin' );
		$this->loader->add_action( 'p2p_init', $plugin_public, 'register_relationships' );

		// Register public facing custom metaboxes.
		$this->loader->add_action( 'cmb2_init', $plugin_public, 'register_metaboxes' );
		$this->loader->add_action( 'cmb2_after_init', $plugin_public, 'handle_frontend_form_submission' );

		// Register shortcodes.
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );

		// Define theme template specific hooks.
		$this->loader->add_action( 'wp', $plugin_public, 'init_page_templates' );

		// Extend Ultimate Member plugin.
		$this->loader->add_filter( 'um_profile_tabs', $plugin_public, 'um_add_custom_profile_tab', 1000 );
		$this->loader->add_action( 'um_profile_content_goal_default', $plugin_public, 'um_profile_content_goal_default' );
		$this->loader->add_action( 'um_profile_content_audit_default', $plugin_public, 'um_profile_content_audit_default' );
	
		// Enqueue styles and scripts.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'register_scripts' );
		$this->loader->add_action( 'wp_footer', $plugin_public, 'print_goals_ui_script' );

		// Delete goals when user is deleted.
		$this->loader->add_action( 'wpmu_delete_user', $plugin_public, 'delete_goals' );
		$this->loader->add_action( 'delete_user', $plugin_public, 'delete_goals' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Oss_ClubSoda_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Retrieve the prefix for field names.
	 *
	 * @since     1.0.0
	 * @return    string    The prefix for field names.
	 */
	public function get_prefix() {
		return $this->prefix;
	}

}
