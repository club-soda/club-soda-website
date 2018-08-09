<?php

/**
 * Adds a UI for goals custom post type
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda_Goals
 * @subpackage OSS_ClubSoda_Goals/includes
 */

/**
 * Adds a UI for goals custom post type.
 *
 * This class defines and adds a user interface for the Goals custom post type.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda_Goals
 * @subpackage OSS_ClubSoda_Goals/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Goals_Ui {


	/**
	 * Definition of goals.
	 *
	 * @var array
	 */
	protected $list_of_goals = array(
		        'cut-down' => 'Cut down',
		        'stop-for-a-bit' => 'Stop for a bit',
		        'quit' => 'Quit',
		        'stick' => 'Stick',
		        'movement' => 'Join the movement',
	);

	/**
	 * Definition of progress scale.
	 *
	 * @var array
	 */
	protected $confidence_scale = array(
		        '0' => 'not at all',
		        '1' => 'a bit',
		        '2' => 'fairly',
		        '3' => 'strongly',
		        '4' => 'extremely',
	);

	/**
	 * Definition of progress scale.
	 *
	 * @var array
	 */
	protected $progress_scale = array(
		        '0' => 'not good - help!',
		        '1' => 'a bit of a struggle',
		        '2' => 'ok, hanging in there',
		        '3' => 'pretty good',
		        '4' => 'AMAZING!',
	);

	/**
	 * Definition of achievements for the cut down goal.
	 *
	 * @var array
	 */
	protected $list_of_cutdown_achievements = array(
		        'health' => 'improve my health',
		        'money' => 'save money',
		        'wake-up-happy' => 'wake up feeling happy',
		        'cut-calories' => 'cut calories and lose weight',
		        'feel-better' => 'feel better about myself',
		        'get-fitter' => 'get fitter',
		        'relationships' => 'improve my relationships',
		        'other' => 'other&hellip;',
	);

	/**
	 * Definition of methods for the cut down goal.
	 *
	 * @var array
	 */
	protected $list_of_cutdown_methods = array(
		        'three-days' => 'have three days a week drink-free',
		        'soft-drinks-mon-thurs' => 'choose soft drinks between Monday and Thursday',
		        'lower-strength' => 'choose lower strength drinks when I am out',
		        'not-pub' => 'go out to places apart from the pub',
		        'soft-drinks-always' => 'have soft drinks instead',
		        'other' => 'other&hellip;',
	);

	/**
	 * Definition of achievements for the stop for a bit goal.
	 *
	 * @var array
	 */
	protected $list_of_stopforabit_achievements = array(
		        'health' => 'improve my health',
		        'money' => 'save money',
		        'wake-up-happy' => 'wake up feeling happy',
		        'cut-calories' => 'cut calories and lose weight',
		        'feel-better' => 'feel better about myself',
		        'get-fitter' => 'get fitter',
		        'relationships' => 'improve my relationships',
		        'challenge' => 'challenge myself',
		        'charity' => 'raise money for charity',
		        'other' => 'other&hellip;',
	);

	/**
	 * Definition of periods for the stop for a bit goal.
	 *
	 * @var array
	 */
	protected $list_of_stopforabit_periods = array(
		        'day' => 'stop for a day',
		        'couple-of-days' => 'stop for a couple of days',
		        'week' => 'stop for a week',
		        'couple-of-weeks' => 'stop for a couple of weeks',
		        'month' => 'stop for a month',
		        'two-months' => 'stop for two months',
		        'three-months' => 'stop for three months',
		        'other' => 'stop until&hellip;',
	);

	/**
	 * Definition of achievements for the quit goal.
	 *
	 * @var array
	 */
	protected $list_of_quit_achievements = array(
		        'health' => 'improve my health',
		        'money' => 'save money',
		        'wake-up-happy' => 'wake up feeling happy',
		        'cut-calories' => 'cut calories and lose weight',
		        'feel-better' => 'feel better about myself',
		        'get-fitter' => 'get fitter',
		        'relationships' => 'improve my relationships',
		        'challenge' => 'challenge myself',
		        'other' => 'other&hellip;',
	);


	/**
	 * Definition of methods for the movement goal.
	 *
	 * @var array
	 */
	protected $list_of_movement_methods = array(
		        'help-others' => 'help and support others',
		        'help-clubsoda' => 'help and support Club Soda',
		        'other' => 'other&hellip;',
	);

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_goals() {
		
		return $this->list_of_goals;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_confidence_scale() {
		
		return $this->confidence_scale;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_progress_scale() {
		
		return $this->progress_scale;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_cutdown_achievements() {
		
		return $this->list_of_cutdown_achievements;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_cutdown_methods() {
		
		return $this->list_of_cutdown_methods;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_stopforabit_achievements() {
		
		return $this->list_of_stopforabit_achievements;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_stopforabit_periods() {
		
		return $this->list_of_stopforabit_periods;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_quit_achievements() {
		
		return $this->list_of_quit_achievements;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_movement_methods() {
		
		return $this->list_of_movement_methods;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_user_id() {

		$user_id = get_current_user_id();
		
		return $user_id;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_all_snapshots( $user_id ) {

		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'clubsoda_goals',
			'author'	   => $user_id,
		);
		$posts_array = get_posts( $args ); 

		if ( $posts_array ) {

			return $posts_array;
		
		} else {

			return false;

		}

	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_latest_snapshot( $user_id ) {

		$args = array(
			'posts_per_page'   => 1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'clubsoda_goals',
			'author'	   => $user_id,
		);
		$posts_array = get_posts( $args ); 

		if ( $posts_array ) {

			$latest_snapshot = $posts_array[0];
		
		} else {

			$latest_snapshot = false;

		}

		return $latest_snapshot;

	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_latest_snapshot_id( $user_id ) {

		$latest_snapshot = $this->get_latest_snapshot( $user_id );

		if ( false != $latest_snapshot ) {
			$latest_snapshot_id = $latest_snapshot->ID;
		} else {
			$latest_snapshot_id = false;
		}
		
		return $latest_snapshot_id;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_latest_goals_snapshot( $user_id ) {

		$args = array(
			'posts_per_page'   => 1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'clubsoda_goals',
			'author'	   => $user_id,
			'meta_key'   => '_clubsoda_new_goal',
			'meta_value' => true,
		);
		$posts_array = get_posts( $args ); 

		if ( $posts_array ) {

			$latest_snapshot = $posts_array[0];
		
		} else {

			$latest_snapshot = false;

		}

		return $latest_snapshot;

	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_latest_goals_snapshot_id( $user_id ) {

		$latest_snapshot = $this->get_latest_goals_snapshot( $user_id );

		if ( false != $latest_snapshot ) {
			$latest_snapshot_id = $latest_snapshot->ID;
		} else {
			$latest_snapshot_id = false;
		}
		
		return $latest_snapshot_id;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_message( $message_id ) {

		switch ( $message_id ) {

			case 'not-logged-in':
				$output = '<p class="um-profile-note" style="display: block;"><i class="um-faicon-frown-o"></i><span>Sorry, you must be logged in to view this content.</p>';
				break;

			case 'no-form-error':
				$output = '<p><strong>Error</strong>: No form chosen</p>';
				break;			

			case 'form-saved-progress':
				$output = '<p>You have recorded your progress!</p>';
				break;	

			case 'form-saved-goal':
				$output = '<p>You have set your goal!</p><p>Come back regularly and update your progress. We will also remind you via email.</p>';
				break;	

			case 'other-user-no-goal':
				$output = '<p class="um-profile-note" style="display: block;"><i class="um-faicon-frown-o"></i><span>This member is currently goal-free.</span></p>';
				break;	

			case 'progress-form-intro':
				$output = '<h3>How are you doing?</h3>';
				break;	

			/*
			case 'new-goal-form-intro':
				$output = '<p><i class="fa fa-trophy fa-2x fa-pull-left fa-border" aria-hidden="true"></i></p>';
				break;	
			*/

			case 'new-user-intro':
				$output = '<p><i class="fa fa-trophy fa-2x fa-pull-left fa-border" aria-hidden="true"></i>Setting goals and measuring progress is a really good thing to do.</p><p>It will keep you motivated and focused on the actions you need to take to succeed.</p>';
				break;	

			case 'goal-dashboard-intro':
				$output = '<h3>Manage your goals</h3>';
				break;	

			case 'no-report-available':
				$output = '<p>Sorry, no report available.</p>';
				break;	

			case 'wrong-user':
				$output = '<p>Sorry, you are not permitted to view other users reports.</p>';
				break;	

			default:
				$output = '';
				break;
		}

		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_form( $goal_form, $atts, $user_id ) {

		$output = '';

		// Choose form version
		if ( 'progress' == $goal_form ) {
			$msg = $this->display_message( 'progress-form-intro' );
			$cmb = $this->frontend_progress_form_get();
		} else {
			$msg = $this->display_message( 'new-goal-form-intro' );
			$cmb = $this->frontend_new_form_get();
		}

		// Get $cmb object_types
		$post_types = $cmb->prop( 'object_types' );

		// Generate unique post title 
		$post_title = uniqid('goal_snapshot_');
		
		// Parse attributes
		$atts = shortcode_atts( array(
			'post_title' => $post_title,
			'post_author' => $user_id ? $user_id : 1, // Current user, or admin
			'post_status' => 'publish',
			'post_type'   => reset( $post_types ), // Only use first object_type in array
		), $atts, 'clubsoda-goals-ui' );

		/*
		 * Let's add these attributes as hidden fields to our cmb form
		 * so that they will be passed through to our form submission
		 */
		foreach ( $atts as $key => $value ) {
			$cmb->add_hidden_field( array(
				'field_args'  => array(
					'id'    => "atts[$key]",
					'type'  => 'hidden',
					'default' => $value,
				),
			) );
		}

		// Get any submission errors
		if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
			// If there was an error with the submission, add it to our ouput.
			$output .= '<h3>' . sprintf( __( 'There was an error in the submission: %s', 'plugin-text-domain' ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
		}


		// Get our form
		$output = $output . $msg . cmb2_get_metabox_form( $cmb, 'fake-oject-id', array( 'save_button' => __( 'Continue', 'plugin-text-domain' ) ) );
	
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_new_user() {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		$q_string = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = 'profiletab=' . $_GET['profiletab'] . '&';
		}

		$output = $this->display_message( 'new-user-intro' );
		$output = $output . '<hr>';
		$output = $output . '<p><a class="button" href="'. $current_url . '/?' . $q_string . 'goal_form=new"><i class="fa fa-trophy fa-fw" aria-hidden="true"></i> Pick your goal</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_other_user( $latest_snapshot_id ) {

		$current_goal = get_post_meta( $latest_snapshot_id, '_clubsoda_goal', true );
		$current_goal_label = $this->get_goal_label( $current_goal );
		$output = '<p><i class="fa fa-trophy fa-2x fa-pull-left fa-border" aria-hidden="true"></i>This member has set <strong>' . strtolower(esc_html($current_goal_label)) . '</strong> as their goal.</p>';
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_goal( $latest_snapshot_id ) {
		global $wp;
		$current_url = home_url( add_query_arg(array(),$wp->request) );
		$q_string = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = 'profiletab=' . $_GET['profiletab'] . '&';
		}
		$current_goal = get_post_meta( $latest_snapshot_id, '_clubsoda_goal', true );
		$current_goal_label = $this->get_goal_label( $current_goal );
		$current_committment = $this->get_confidence_scale_label( get_post_meta( $latest_snapshot_id, '_clubsoda_goal_committment', true ) );
		$current_confidence = $this->get_confidence_scale_label( get_post_meta( $latest_snapshot_id, '_clubsoda_goal_confidence', true ) );
	
		$output = $this->display_message( 'goal-dashboard-intro' );
		$output = $output . '<p><i class="fa fa-trophy fa-pull-left fa-border" aria-hidden="true"></i>Your current goal is to <strong>' . strtolower(esc_html($current_goal_label)) . '</strong>.</p>';
		if ( 'movement' != $current_goal ) {
			$output = $output . '<p><i class="fa fa-tasks fa-pull-left fa-border" aria-hidden="true"></i>On ' . get_the_date( '', $latest_snapshot_id ) . ' you were ' . esc_html($current_committment) . ' committed and ' . esc_html($current_confidence) . ' confident.</p>';
		}
		$output = $output . '<hr>';
		$output = $output . '<p><a class="button" href="'. $current_url . '/?' . $q_string . 'goal_form=progress"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i> How are you doing?</a>&nbsp;';
		$output = $output . '<a class="button" href="/goal-report/" ><i class="fa fa-history fa-fw" aria-hidden="true"></i> Track your progress</a>&nbsp;';
		$output = $output . '<a class="button" href="'. $current_url . '/?' . $q_string . 'goal_form=new"><i class="fa fa-trophy fa-fw" aria-hidden="true"></i> Pick a new goal</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_confirmation( $goal_form ) {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		$q_string = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = '?profiletab=' . $_GET['profiletab'];
		}

		if ( 'progress' == $goal_form ) {
			$output = $this->display_message( 'form-saved-progress' );
		} else {
			$output = $this->display_message( 'form-saved-goal' );
		}
		$output = $output . '<p><a class="button" href="'. $current_url . $q_string . '">Continue</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function process_form( $goal_form ) {

		// Choose form version
		if ( 'progress' == $goal_form ) {
			$cmb = $this->frontend_progress_form_get();
		} else {
			$cmb = $this->frontend_new_form_get();
		}

		$post_data = array();

		// Get our shortcode attributes and set them as our initial post_data args
		if ( isset( $_POST['atts'] ) ) {
			foreach ( (array) $_POST['atts'] as $key => $value ) {
				$post_data[ $key ] = sanitize_text_field( $value );
			}
			unset( $_POST['atts'] );
		}
		// Check security nonce
		if ( ! isset( $_POST[ $cmb->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() ) ) {
			return $cmb->prop( 'submission_error', new WP_Error( 'security_fail', __( 'Security check failed.' ) ) );
		}

		/**
		 * Fetch sanitized values
		 */
		$sanitized_values = $cmb->get_sanitized_values( $_POST );

		// Create the new post
		$new_submission_id = wp_insert_post( $post_data, true );
		// If we hit a snag, update the user
		if ( is_wp_error( $new_submission_id ) ) {
			return $cmb->prop( 'submission_error', $new_submission_id );
		}

		// Loop through remaining (sanitized) data, and save to post-meta
		foreach ( $sanitized_values as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = array_filter( $value );
				if( ! empty( $value ) ) {
					update_post_meta( $new_submission_id, $key, $value );
				}
			} else {
				update_post_meta( $new_submission_id, $key, $value );
			}
		}
		/*
		 * Redirect back to the form page with a query variable with the new post ID.
		 * This will help double-submissions with browser refreshes
		 */
		wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
		exit;
	}

	/**
	 * Gets the front-end-post-form cmb instance
	 *
	 * @return CMB2 object
	 */
	public function frontend_progress_form_get() {
		// Use ID of metabox in wds_frontend_form_register
		$metabox_id = '_clubsoda_frontend_goals_progress_form';
		// Post/object ID is not applicable since we're using this form for submission
		$object_id  = 'fake-oject-id';
		// Get CMB2 metabox object
		return cmb2_get_metabox( $metabox_id, $object_id );
	}

	/**
	 * Gets the front-end-post-form cmb instance
	 *
	 * @return CMB2 object
	 */
	public function frontend_new_form_get() {
		// Use ID of metabox in wds_frontend_form_register
		$metabox_id = '_clubsoda_frontend_goals_new_form';
		// Post/object ID is not applicable since we're using this form for submission
		$object_id  = 'fake-oject-id';
		// Get CMB2 metabox object
		return cmb2_get_metabox( $metabox_id, $object_id );
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_goal_report( $snapshot_id ) {

		$current_goal = get_post_meta( $snapshot_id, '_clubsoda_goal', true );
		$current_goal_label = $this->get_goal_label( $current_goal );

		// GOAL
		$output = $output . '<p><i class="fa fa-trophy fa-pull-left fa-border" aria-hidden="true"></i>On ' . get_the_date( '', $snapshot_id ) . ' you set your goal as <strong>' . strtolower(esc_html($current_goal_label)) . '</strong>.</p>';

		// CUT DOWN
		if ( 'cut-down' == $current_goal ) {

			// ACHIEVEMENTS
			$output = $output . $this->display_block_selected_list( $snapshot_id, 'cutdown_achievement', 'You said that by cutting down you would:', '{other}' );


			// METHODS
			$output = $output . $this->display_block_selected_list( $snapshot_id, 'cutdown_method', 'To do this you said you would:', '{other}' );

		}

		// STOP FOR A BIT
		if ( 'stop-for-a-bit' == $current_goal ) {

			// ACHIEVEMENTS
			$output = $output . $this->display_block_selected_list( $snapshot_id, 'stopforabit_achievement', 'You said that by stopping for a bit you would:', '{other}' );

			// PERIOD
			$output = $output . $this->display_block_option_list( $snapshot_id, 'stopforabit_period', 'You said that you would', 'You said that you would stop until' );

		}


		// QUIT
		if ( 'quit' == $current_goal ) {

			// ACHIEVEMENTS
			$output = $output . $this->display_block_selected_list( $snapshot_id, 'quit_achievement', 'You said that by quiting you would:', '{other}' );

			// START DATE
			$current_start_date = get_post_meta( $snapshot_id, '_clubsoda_quit_start_date', true );

			if( ! empty( $current_start_date ) ) {

				$output = $output . '<p>You said that you would start on <strong>' . esc_html($current_start_date) . '</strong>.</p>';

			}

			// FREQUENCY
			$quit_frequency = get_post_meta( $snapshot_id, '_clubsoda_quit_frequency', true );

			if( ! empty( $quit_frequency ) ) {

				switch ( $quit_frequency ) {
					case 'many-times':
						$output = $output . '<p>You said that you had tried to quit many times before.</p>';
						break;
					case 'few-times':
						$output = $output . '<p>You said that you had tried to quit a few times before.</p>';
						break;
					default:
						$output = $output . '<p>You said that this was the first time you had tried to quit.</p>';
						break;
				}
			}

			// CHALLENGE
			$output = $output . $this->display_block_text( $snapshot_id, 'quit_challenge', 'You said your biggest challenge was going to be:' );

		}

		// STICK
		if ( 'stick' == $current_goal ) {

			// METHOD
			$output = $output . $this->display_block_text( $snapshot_id, 'stick_method_text', 'You said you would stick to the goals you’ve already reached by:' );

			// ACHIEVEMENT
			$output = $output . $this->display_block_text( $snapshot_id, 'stick_achievement_text', 'You said you would achieve:' );

		}

		// MOVEMENT
		if ( 'movement' == $current_goal ) {

			// METHOD
			$output = $output . $this->display_block_selected_list( $snapshot_id, 'movement_method', 'You said that you would be part of the movement to:', '{other}' );

			// ACHIEVEMENT
			$output = $output . $this->display_block_text( $snapshot_id, 'movement_achievement_text', 'You said you would achieve:' );

		}

		// DO FIRST
		if ( 'stick' != $current_goal ) {

			$output = $output . $this->display_block_text( $snapshot_id, 'do_first', 'The first thing you were going to do was:' );

		}

		// COMMITTMENT & CONFIDENCE
		if ( 'movement' != $current_goal ) {
			$current_committment = $this->get_confidence_scale_label( get_post_meta( $snapshot_id, '_clubsoda_goal_committment', true ) );
			$current_confidence = $this->get_confidence_scale_label( get_post_meta( $snapshot_id, '_clubsoda_goal_confidence', true ) );
	
			$output = $output . '<p>You said you were ' . esc_html($current_committment) . ' committed and ' . esc_html($current_confidence) . ' confident.</p>';
		}
		
		return $output;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_progress_report( $snapshot_id ) {

		$output = '<p><i class="fa fa-tasks fa-pull-left fa-border" aria-hidden="true"></i>You recorded your progress on ' . get_the_date( '', $snapshot_id ) . '.</p>'; 

		// PROGRESS
		$current_progress = get_post_meta( $snapshot_id, '_clubsoda_goal_progress', true );

		if( isset( $current_progress ) ) {

			$output = $output . '<p>You described your progress as ';

			$output = $output . '<strong>' . $this->get_progress_scale_label( $current_progress ) . '</strong>';
			
			$output = $output . '.</p>'; 
		}

		// ACHIEVEMENT
		$output = $output . $this->display_block_text( $snapshot_id, 'goal_progress_achievement', 'You said your biggest achievement since last time was:' );

		// CHALLENGE
		$output = $output . $this->display_block_text( $snapshot_id, 'goal_progress_challenge', 'You said your biggest challenge was:' );

		// NEXT
		$output = $output . $this->display_block_text( $snapshot_id, 'goal_progress_next', 'You said the thing you would do next was:' );

		// COMMITTMENT & CONFIDENCE
		if ( 'movement' != $current_goal ) {

			$current_committment = $this->get_confidence_scale_label( get_post_meta( $snapshot_id, '_clubsoda_goal_committment', true ) );
			$current_confidence = $this->get_confidence_scale_label( get_post_meta( $snapshot_id, '_clubsoda_goal_confidence', true ) );
	
			$output = $output . '<p>You said you were ' . esc_html($current_committment) . ' committed and ' . esc_html($current_confidence) . ' confident.</p>';
		}
		
		return $output;
	}



	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_snapshot( $snapshot_id, $user_id = false ) {

		if ( false == $user_id ) {
			$user_id = $this->get_user_id();
		}

		$post_author_id = get_post_field( 'post_author', $snapshot_id );

		if ( $user_id == $post_author_id ) {

			if ( false == ( get_post_meta( $snapshot_id, '_clubsoda_new_goal', true ) ) ) {

				$output = $this->display_progress_report( $snapshot_id );

			} else {

				$output = $this->display_goal_report( $snapshot_id );

			}

		} else {

			$msg = $this->display_message( 'wrong-user' );
			$output = $msg;

		}

		return $output;

	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_archive( $user_id = false ) {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));


		if ( false == $user_id ) {
			$user_id = $this->get_user_id();
		}

		$posts_array = $this->get_all_snapshots( $user_id );

		$output = '<h3>Your goals history</h3> <table>';

		foreach ( $posts_array as $snapshot ) {

			$output = $output . '<tr><td>' . get_the_date( '', $snapshot->ID ) . '</td>';

			if ( false == ( get_post_meta( $snapshot->ID, '_clubsoda_new_goal', true ) ) ) {

				$output = $output . '<td><i class="fa fa-tasks" aria-hidden="true"></i></td><td><a href="'. $current_url . '/?snapshot=' . $snapshot->ID . '">Progress Report</a></td><td></td>';

			} else {

				$current_goal = get_post_meta( $snapshot->ID, '_clubsoda_goal', true );
				$current_goal_label = $this->get_goal_label( $current_goal );

				$output = $output . '<td><i class="fa fa-trophy" aria-hidden="true"></i></td><td><a href="'. $current_url . '/?snapshot=' . $snapshot->ID . '">New Goal</a></td><td>' . $current_goal_label . '</td>';

			}

			$output = $output . '</tr>';

		}

		$output = $output . '</table>';
		$output = $output . '<p><a class="button" href="' . $current_url . '">Go Back</a></p>';

		return $output;

	}






	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_block_selected_list( $snapshot_id, $field_name, $field_label, $other_label ) {

		$output = '';

		$values = get_post_meta( $snapshot_id, '_clubsoda_' . $field_name, true );

		if( ! empty( $values ) ) {

			$other_output = '';

			$output = $output . '<p>' . $field_label . '</p><ul>';

			foreach ( $values as $key => $value ) {

				if ( 'other' == $value ) {

					$other_option = get_post_meta( $snapshot_id, '_clubsoda_' . $field_name . '_other', true );

					if (! empty( $other_option ) ) {

						$other_output = '<li>' . $other_label . ' ' . esc_html( $other_option ) . '</li>';

					}

				} else {

					$output = $output . '<li>' . $this->get_label( $field_name, $value ) . '</li>';
				}
			}

			$output = $output . $other_output . '</ul>';
		}

		return $output;

	}




	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_block_option_list( $snapshot_id, $field_name, $field_label, $other_label ) {

		$output = '';

		$value = get_post_meta( $snapshot_id, '_clubsoda_' . $field_name, true );

		if( ! empty( $value ) ) {

			if ( 'other' == $value ) {

				$other_option = get_post_meta( $snapshot_id, '_clubsoda_' . $field_name . '_other', true );

				if (! empty( $other_option ) ) {

					$output = '<p>' . $other_label . ' <strong>' . esc_html( $other_option ) . '</strong>.</p>';

				}

			} else {

				$output = $output . '<p>' . $field_label . ' <strong>' . $this->get_label( $field_name, $value ) . '</strong>.</p>';
			}

		}

		return $output;
	}





	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_block_text( $snapshot_id, $field_name, $field_label ) {

		$output = '';

		$value = get_post_meta( $snapshot_id, '_clubsoda_' . $field_name, true );

		if( ! empty( $value ) ) {

			$output = $output . '<p>' . $field_label . '</p>';

			$output = $output . '<p><blockquote>' . esc_html( $value ) . '</blockquote></p>';

		}

		return $output;

	}








	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_label( $field_name, $value ) {


		switch ( $field_name) {
			case 'goal':
				$label = $this->get_goal_label( $value );
				break;
	
			case 'confidence':
				$label = $this->confidence_scale[ $value ];
				break;

			case 'committment':
				$label = $this->committment_scale[ $value ];
				break;

			case 'cutdown_achievement':
				$label = $this->list_of_cutdown_achievements[ $value ];
				break;

			case 'cutdown_method':
				$label = $this->list_of_cutdown_methods[ $value ];
				break;

			case 'stopforabit_achievement':
				$label = $this->list_of_stopforabit_achievements[ $value ];
				break;

			case 'stopforabit_period':
				$label = $this->list_of_stopforabit_periods[ $value ];
				break;

			case 'quit_achievement':
				$label = $this->list_of_quit_achievements[ $value ];
				break;

			case 'movement_method':
				$label = $this->list_of_movement_methods[ $value ];
				break;




			default:
				$label = '{label}';
				break;
		}

		return $label;

	}



	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_goal_label( $goal_slug ) {

		$goal_label = $this->list_of_goals[ $goal_slug ];

		return $goal_label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_confidence_scale_label( $value ) {

		$label = $this->confidence_scale[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_progress_scale_label( $value ) {

		$label = $this->progress_scale[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_cutdown_achievements_label( $value ) {

		$label = $this->list_of_cutdown_achievements[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_cutdown_methods_label( $value ) {

		$label = $this->list_of_cutdown_methods[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_stopforabit_achievements_label( $value ) {

		$label = $this->list_of_stopforabit_achievements[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_stopforabit_periods_label( $value ) {

		$label = $this->list_of_stopforabit_periods[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_quit_achievements_label( $value ) {

		$label = $this->list_of_quit_achievements[ $value ];

		return $label;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_movement_methods_label( $value ) {

		$label = $this->list_of_movement_methods[ $value ];

		return $label;
	}

}