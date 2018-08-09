<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/public
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Public {

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
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $prefix ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->prefix = $prefix;

	}

	/**
	 * Register custom post types with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function register_post_types() {

		$cpt = new OSS_ClubSoda_Cpt_Events();
		$cpt->create( $cpt->name(), $cpt->labels(), $cpt->config());

		$cpt = new OSS_ClubSoda_Cpt_Offers();
		$cpt->create( $cpt->name(), $cpt->labels(), $cpt->config());

		$cpt = new OSS_ClubSoda_Cpt_Resources();
		$cpt->create( $cpt->name(), $cpt->labels(), $cpt->config());

		$cpt = new OSS_ClubSoda_Goals_Cpt_Goals();
		$cpt->create( $cpt->name(), $cpt->labels(), $cpt->config());

		$cpt = new OSS_ClubSoda_Audits_Cpt_Audits();
		$cpt->create( $cpt->name(), $cpt->labels(), $cpt->config());		
	}

	/**
	 * Register custom taxonomies with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function register_taxonomies() {

		$taxonomies = new OSS_ClubSoda_Taxonomies();
		$taxonomies->register_taxonomies( $taxonomies->define_taxonomies() );
	}

	/**
	 * Register custom meta fields for taxonomies with WordPress.
	 *
	 * @since    1.0.1
	 */
	public function register_term_meta() {

		$tmeta = new OSS_ClubSoda_Term_Meta();
		$tmeta->register_term_meta( $tmeta->define_term_meta() );
	}

	/**
	 * Check that Posts2Posts plugin is active.
	 *
	 * @since    1.0.0
	 */
	public function check_for_p2p_plugin() {

		$active = true;
		if( !function_exists( '_p2p_init' ) ) {
			 if ( current_user_can( 'activate_plugins' ) ) {
				add_action( 'admin_notices', array( $this, 'p2p_plugin_admin_notice' ) );
			}
			$active = false;
		}

		define( 'OSS_P2P_ACTIVE', $active );
	}

	/**
	 * Error notice if Posts2Posts plugin is not active.
	 *
	 * @since    1.0.0
	 */
	public function p2p_plugin_admin_notice() {

		$class = 'notice notice-warning';
		$message = __( 'Relationships between posts have not been registered as the Posts 2 Posts plugin is not active.', 'plugin-text-domain' );

		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 

	}

	/**
	 * Register post to post relationships with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function register_relationships() {

		if ( true == OSS_P2P_ACTIVE ) {

			$relationships = new OSS_ClubSoda_Relationships();
			$relationships->register_relationships();
		}
	}

	/**
	 * Register custom metaboxes with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function register_metaboxes() {

		$metaboxes = new OSS_ClubSoda_Metaboxes( $this->prefix );
		$metaboxes->register_public_metaboxes();
	}

	/**
	 * Register shortcodes with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {

		//add_shortcode( $args ) );
		add_shortcode( 'clubsoda-goals-ui' , array( $this, 'shortcode_goals_ui' ) );
		add_shortcode( 'clubsoda-audits-ui' , array( $this, 'shortcode_audits_ui' ) );
		add_shortcode( 'clubsoda-goals-report' , array( $this, 'shortcode_goals_report' ) );
		add_shortcode( 'clubsoda-audits-report' , array( $this, 'shortcode_audits_report' ) );
	}

	/**
	 * Register page template specific actions to available hooks
	 *
	 * @since    1.0.0
	 */
	public function init_page_templates() {

		if ( is_page_template('page-[template].php') ) {

			//add_action( 'wp_enqueue_scripts', 'page_template_function' );

		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_scripts() {
	    global $wp_scripts;
	    // get registered script object for jquery-ui
	    $ui = $wp_scripts->query('jquery-ui-core');
	 
	    // tell WordPress to load the Smoothness theme from Google CDN
	    $protocol = is_ssl() ? 'https' : 'http';
	    $url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";
	    wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

	    // register the CMB2 conditional fields script 
		wp_register_script( 'cmb2-conditionals', plugin_dir_url( __FILE__ ) . 'js/cmb2-conditionals.js', array('jquery', 'cmb2-scripts' ), '1.0.4', true);
	}

	/**
	 * Adds custom tabs to the Ultimate Member profile
	 *
	 * @since    1.0.0
	 */
	public function um_add_custom_profile_tab( $tabs ) {

		$tabs['goal'] = array(
			'name' => 'Goal',
			'icon' => 'um-faicon-trophy',
			'custom' => true
		);

		$tabs['audit'] = array(
			'name' => 'Audit',
			'icon' => 'um-faicon-check-circle',
			'custom' => true
		);
			
		return $tabs;
	}

	/**
	 * Content for the goal custom tab on the Ultimate Member profile
	 *
	 * @since    1.0.0
	 */
	public function um_profile_content_goal_default( $args ) {
		echo do_shortcode( '[clubsoda-goals-ui profile="yes"]' );
	}


	/**
	 * Content for the audit custom tab on the Ultimate Member profile
	 *
	 * @since    1.0.0
	 */
	public function um_profile_content_audit_default( $args ) {
		echo do_shortcode( '[clubsoda-audits-ui profile="yes"]' );
	}


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function print_goals_ui_script() {
		global $add_goals_ui_script;

		if ( ! $add_goals_ui_script )
			return;

		wp_print_scripts('cmb2-conditionals');
	}

	/**
	 * An example shortcode output function.
	 *
	 * @since    1.0.0
	 */
	public function shortcode_goals_ui( $atts = array() ) {

		$a = shortcode_atts( array(
		        'profile' => 'no',
	    	), $atts );

		$profile = $a['profile'];

		global $add_goals_ui_script;
		$add_goals_ui_script = true;

		// Initiate our output variable
		$output = '';

		// Set up UI object
		$ui = new OSS_ClubSoda_Goals_Ui();


		// Check user is logged in
		if ( !is_user_logged_in() ) {
			$output = $output . $ui->display_message( 'not-logged-in' );
			return $output;
		}

		// Confirmation of update
		if ( isset( $_GET["post_submitted"] ) ) {
			$goal_form = $_GET["goal_form"];
			$output =  $output . $ui->display_confirmation( $goal_form );
			return $output;
		} 

		// Get user
		$user_id = $ui->get_user_id();

		// Submitted form
		if ( !empty( $_POST ) ) {
			if ( isset( $_GET["goal_form"] ) ) {
				$goal_form = $_GET["goal_form"];
				$output = $output . $ui->display_form( $goal_form, $atts, $user_id );
			} else {
				$output = $output . $ui->display_message( 'no-form-error' );
			}
			return $output;
		}

		// Display form
		if ( isset( $_GET["goal_form"] ) ) {
			$goal_form = $_GET["goal_form"];
			$output =  $output . $ui->display_form( $goal_form, $atts, $user_id );
			return $output;
		} 

		// Display other users on profile pages
		if ( 'yes' == $profile ) {
			$profile_id = um_profile_id();
			if ( $user_id != $profile_id ) {
				// Get other users latest snapshot
				$latest_snapshot_id = $ui->get_latest_snapshot_id( $profile_id );
				if ( empty( $latest_snapshot_id ) ) {
					$output = $output . $ui->display_message( 'other-user-no-goal' );
				} else {
					$output = $output . $ui->display_other_user( $latest_snapshot_id );
				}
				return $output;
			}
		}

		// Get latest snapshot
		$latest_snapshot_id = $ui->get_latest_snapshot_id( $user_id );

		if ( empty( $latest_snapshot_id ) ) {
			$output = $output . $ui->display_new_user();
		} else {
			$output = $output . $ui->display_goal( $latest_snapshot_id );
		}

		return $output;
	}


	/**
	 * An example shortcode output function.
	 *
	 * @since    1.0.0
	 */
	public function shortcode_audits_ui( $atts = array() ) {

		$a = shortcode_atts( array(
		        'profile' => 'no',
	    	), $atts );

		$profile = $a['profile'];

		global $add_goals_ui_script;
		$add_goals_ui_script = true;

		// Initiate our output variable
		$output = '';

		// Set up UI object
		$ui = new OSS_ClubSoda_Audits_Ui();


		// Check user is logged in
		if ( !is_user_logged_in() ) {
			$output = $output . $ui->display_message( 'not-logged-in' );
			return $output;
		}

		// Confirmation of update
		if ( isset( $_GET["post_submitted"] ) ) {
			$audit_form = $_GET["audit_form"];
			$output =  $output . $ui->display_confirmation( $audit_form );
			return $output;
		} 

		// Get user
		$user_id = $ui->get_user_id();

		// Submitted form
		if ( !empty( $_POST ) ) {
			if ( isset( $_GET["audit_form"] ) ) {
				$audit_form = $_GET["audit_form"];
				$output = $output . $ui->display_form( $audit_form, $atts, $user_id );
			} else {
				$output = $output . $ui->display_message( 'no-form-error' );
			}
			return $output;
		}

		// Display form
		if ( isset( $_GET["audit_form"] ) ) {
			$audit_form = $_GET["audit_form"];
			$output =  $output . $ui->display_form( $audit_form, $atts, $user_id );
			return $output;
		} 

		// Display report
		if ( isset( $_GET["audit_report"] ) ) {
			$output = do_shortcode( '[clubsoda-audits-report]' );
			return $output;
		} 

		// Display other users on profile pages
		if ( 'yes' == $profile ) {
			$profile_id = um_profile_id();
			if ( $user_id != $profile_id ) {
				// Get other users latest snapshot
				$latest_snapshot_id = $ui->get_latest_snapshot_id( $profile_id );
				if ( !empty($latest_snapshot_id) ) {
					$output = '<p><i class="fa fa-check-circle fa-pull-left fa-border" aria-hidden="true"></i>This member has completed an audit questionnaire.</p>';
				} else {
					$output = '<p><i class="fa fa-check-circle fa-pull-left fa-border" aria-hidden="true"></i>This member has not yet completed an audit questionnaire.</p>';
				}
				$output = $output . $ui->display_message( 'other-user-intro' );
				return $output;
			}
		}

		// Get latest snapshot
		$latest_snapshot_id = $ui->get_latest_snapshot_id( $user_id );

		if ( empty( $latest_snapshot_id ) ) {
			$output = $output . $ui->display_new_user();
		} else {
			$output = $output . $ui->display_audit( $latest_snapshot_id );
		}

		return $output;
	}

	/**
	 * Handles form submission on save. Redirects if save is successful, otherwise sets an error message as a cmb property
	 *
	 * @return void
	 */
	public function handle_frontend_form_submission() {

		if ( !is_user_logged_in() ) {
			return false;
		}

		// If no form submission, bail
		if ( empty( $_POST ) || ! isset( $_POST['submit-cmb'], $_POST['object_id'] ) ) {
			return false;
		}

		if( isset( $_GET["goal_form"] ) ) {
			$ui = new OSS_ClubSoda_Goals_Ui();
			$goal_form = $_GET["goal_form"];
			$ui->process_form( $goal_form );
		} elseif( isset( $_GET["audit_form"] ) ) {
			$ui = new OSS_ClubSoda_Audits_Ui();
			$goal_form = $_GET["audit_form"];
			$ui->process_form( $audit_form );
		} else {
			return false;
		}
	}


	/**
	 * Deletes posts of the clubsoda_goals CPT when a user who is author is deleted
	 *
	 *
	 */
	public function delete_goals( $user_id ) {
	    $args = array (
	        'numberposts' => -1,
	        'post_type' => array( 'clubsoda_goals', 'clubsoda-audits' ),
	        'author' => $user_id
	    );
	    // get all posts by this user
	    $user_posts = get_posts($args);

	    if (empty($user_posts)) return;

	    // delete all the user posts
	    foreach ($user_posts as $user_post) {
	        wp_delete_post($user_post->ID, true);
	    }
	}

	/**
	 * An example shortcode output function.
	 *
	 * @since    1.0.0
	 */
	public function shortcode_goals_report() {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));

		// Initiate our output variable
		$output = '';

		// Set up UI object
		$ui = new OSS_ClubSoda_Goals_Ui();

		// Check user is logged in
		if ( !is_user_logged_in() ) {
			$output = $output . $ui->display_message( 'not-logged-in' );
			return $output;
		}

		// Get user
		$user_id = $ui->get_user_id();

		// Archive
		if ( isset( $_GET["snapshot"] ) ) {
			$snapshot = $_GET["snapshot"];
			if ( 'all' == $snapshot ) {
				$output =  $output . $ui->display_archive( $user_id );
			} else {
				$output =  $output . $ui->display_snapshot( $snapshot, $user_id );
				$output = $output . '<p><a class="button" href="' . $current_url . '/?snapshot=all">Go Back</a></p>';

			}
			
			return $output;
		} 

		// Get latest goals snapshot
		$latest_goals_snapshot_id = $ui->get_latest_goals_snapshot_id( $user_id );

		if ( empty( $latest_goals_snapshot_id ) ) {
			$output = $output . $ui->display_message( 'no-report-available' );
		} else {
			$output = $output . '<h3>Your Goal</h3>';
			$output = $output . $ui->display_goal_report( $latest_goals_snapshot_id );

			// Get latest snapshot
			$latest_snapshot_id = $ui->get_latest_snapshot_id( $user_id );
			if ( false == ( get_post_meta( $latest_snapshot_id, '_clubsoda_new_goal', true ) ) ) {
				$output = $output . '<h3>Your Progress</h3>';
				$output = $output . $ui->display_progress_report( $latest_snapshot_id );				
			}

			$output = $output . '<p><a class="button" href="' . $current_url . '/?snapshot=all"><i class="fa fa-history fa-fw" aria-hidden="true"></i> Progress history</a></p>';

		}

		return $output;
	}


	/**
	 * An example shortcode output function.
	 *
	 * @since    1.0.0
	 */
	public function shortcode_audits_report() {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));

		// Initiate our output variable
		$output = '';

		// Set up UI object
		$ui = new OSS_ClubSoda_Audits_Ui();

		// Check user is logged in
		if ( !is_user_logged_in() ) {
			$output = $output . $ui->display_message( 'not-logged-in' );
			return $output;
		}

		// Get user
		$user_id = $ui->get_user_id();

		// Display archive for user
		$output =  $output . $ui->display_archive( $user_id );

		return $output;
	}


}