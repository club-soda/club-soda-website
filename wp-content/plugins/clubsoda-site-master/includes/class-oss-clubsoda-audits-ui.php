<?php

/**
 * Adds a UI for audits custom post type
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda_Audits
 * @subpackage OSS_ClubSoda_Audits/includes
 */

/**
 * Adds a UI for audits custom post type.
 *
 * This class defines and adds a user interface for the Audits custom post type.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda_Audits
 * @subpackage OSS_ClubSoda_Audits/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Audits_Ui {


	/**
	 * Definition of how often.
	 *
	 * @var array
	 */
	protected $list_of_how_often = array(
		        '0' => 'never',
		        '1' => 'monthly or less',
		        '2' => '2 to 4 times a month',
		        '3' => '2 to 3 times a week',
		        '4' => '4 or more times a week'
	);

	/**
	 * Definition of how many.
	 *
	 * @var array
	 */
	protected $list_of_how_many = array(
		        '0' => '1 or 2',
		        '1' => '3 or 4',
		        '2' => '5 or 6',
		        '3' => '7, 8 or 9',
		        '4' => '10 or more'
	);

	/**
	 * Definition of frequency scale.
	 *
	 * @var array
	 */
	protected $frequency_scale = array(
		        '0' => 'never',
		        '1' => 'less than monthly',
		        '2' => 'monthly',
		        '3' => 'weekly',
		        '4' => 'daily or almost daily',
	);


	/**
	 * Definition of last year scale.
	 *
	 * @var array
	 */
	protected $last_year_scale = array(
		        '0' => 'no',
		        '2' => 'yes, but not in the last year',
		        '4' => 'yes, in the last year',
	);

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_how_often() {
		
		return $this->list_of_how_often;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_list_of_how_many() {
		
		return $this->list_of_how_many;
	}


	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_frequency_scale() {
		
		return $this->frequency_scale;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function get_last_year_scale() {
		
		return $this->last_year_scale;
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
			'post_type'        => 'clubsoda_audits',
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
			'post_type'        => 'clubsoda_audits',
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
	public function display_message( $message_id ) {

		switch ( $message_id ) {

			case 'not-logged-in':
				$output = '<p class="um-profile-note" style="display: block;"><i class="um-faicon-frown-o"></i><span>Sorry, you must be logged in to view this content.</p>';
				break;

			case 'no-form-error':
				$output = '<p><strong>Error</strong>: No form chosen</p>';
				break;			

			case 'form-saved-audit':
				$output = '<p>Your results have been saved.</p>';
				break;	

			case 'new-audit-form-intro':
				$output = '<h3>Understand your drinking</h3>
							<p><i class="fa fa-check-circle fa-2x fa-pull-left fa-border" aria-hidden="true"></i> This is a short set of questions but they are pretty powerful. Your answers will give you an insight into your drinking habits, and let you know if your drinking is causing you harm. It is definitely more reliable than comparing what you drink with what your mates drink! Most importantly it suggests actions you can take, based on your score.</p>
							<p>It is also pretty good at showing how your drinking is changing over time. We all like to see progress, so we suggest popping back once every three months, and redoing your score. If you are doing well your score should go down over time. In between, you can update your weekly progress using the Club Soda goal setting feature.</p>
							<p>The first few questions ask you about the number of drinks you have. Don’t worry too much about units or standard drinks, just base your answer on whatever you normally drink. For example, if someone offers you a drink in the pub, what do you ask for? Or if you drink at home, what do you usually have? Oh, and don’t include soft drinks! This is just about drinks containing alcohol.</p>
							<p><small>Please note that this questionnaire will ask about your health and alcohol use. Club Soda will retain your answers, in line with our privacy policy. By proceeding you agree to all relevant Club Soda terms and conditions.</small></p>
							<h3>Alcohol questionnaire</h3>';
				break;	

			case 'new-user-intro':
				$output = '<h3>Understand your drinking</h3><p><i class="fa fa-check-circle fa-2x fa-pull-left fa-border" aria-hidden="true"></i> These ten questions will help you take your first steps to changing your drinking. It takes just a couple of minutes to complete.</p>';
				break;	

			case 'audit-dashboard-intro':
				$output = '<h3>My score</h3>';
				break;	

			case 'no-report-available':
				$output = '<p>Sorry, no report available.</p>';
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
	public function display_results( $score ) {

		if ( $score < 8 ) {

			$output = '<p>Whether you’ve never been much of a drinker, or perhaps made some big changes already, it looks like you’re in control of your drinking. You may be one of our “stickers” who are working to maintain a drinking goal you have already reached? Or you may still want to cut down further, or even quit completely?</p>
			<p>You will find plenty of advice and support on Club Soda. And other members might well benefit from your advice and support as well. So why not join the <a href="https://www.facebook.com/groups/joinclubsoda/" >online discussion</a>, or come along to one of our <a href="/events/">socials or events</a>?</p> 
			<p>You can take this test again later, to see how your score has changed. It can take a while to see the changes however, so we recommend taking the test again after three months.</p>';

		} elseif ( $score < 16 ) {

			$output = '<p>This is not too bad, but your drinking could already be causing you some harm. This could be either for your physical or mental health, or in other areas of your life, especially if you drink large amounts in one day. You may even have noticed that yourself already.</p>
			<p>So you may now want to do something to change your drinking: to cut down, or take some time off alcohol by doing a sober sprint. If that’s the case, you’re in the right place. Being part of Club Soda can help you whatever you want to achieve.</p>
			<p>You can set a personal drinking goal, and keep track of your progress. We will remind you via email. You can do that on your profile page. If you need hints and tips, our <a href="https://www.facebook.com/groups/joinclubsoda/" >online discussion</a> is a great place to start.</p>
			<p>We have <a href="/events/">socials</a> and online check-ins too, so if you want to chat about what’s going on, you can meet others who are changing their drinking. It’s friendly, supportive and not judgmental, and it can make a big difference. You might also want to join one of our <a href="/courses/">online programmes</a> or visit our <a href="https://www.youtube.com/c/clubsodauk">YouTube Channel</a> for our advice videos.</p>
			<p>You can take this test again later, to see how your score has changed. It can take a while to see the changes however, so we recommend taking the test again after three months.</p>';

		} elseif ( $score < 20 ) {

			$output = '<p>More than you expected? Or about where you thought you’d be?</p>
			<p>First the bad news: Your score means your drinking may already be doing some long-term damage to your health.</p>
			<p>But here’s the good news: You’re in the right place to do something about it. You’ve joined Club Soda because you want to change your drinking, and we’re behind you every step of the way. Being part of Club Soda can help you whether you’re cutting down, stopping for a bit, or going alcohol-free.</p>
			<p>It is a good idea to set a personal drinking goal, and keep track of your progress. We will remind you via email. You can do that on your profile page. If you need hints and tips, our <a href="https://www.facebook.com/groups/joinclubsoda/" >online discussion</a> is a great place to start.</p>
			<p>We have <a href="/events/">socials</a> and online check-ins too, so if you want to chat about what’s going on, you can meet others who are changing their drinking. It’s friendly, supportive and not judgmental, and it can make a big difference. You might also want to join one of our <a href="/courses/">online programmes</a> or visit our <a href="https://www.youtube.com/c/clubsodauk">YouTube Channel</a> for our advice videos.</p>
			<p>You can take this test again later, to see how your score has changed. It can take a while to see the changes however, so we recommend taking the test again after three months.</p>';

		} else {

			$output = '<p>More than you expected? Or about where you thought you’d be?</p>
			<p>First the bad news: A score of 20 or more means your drinking is probably doing some long-term damage to your health.</p>
			<p>If you drink every day, you may become physically dependent on alcohol, and will have withdrawal symptoms when you stop drinking. <a href="/paws-symptoms-changing-drinking/" >Common withdrawal symptoms</a> include shakes, sweats, feeling anxious and craving a morning drink. More frightening, serious and even life-threatening withdrawal symptoms include seizures and the ‘DTs’ – delirium tremens - that can cause hallucinations. If you have ever experienced any of these symptoms in the morning or when you have tried to stop drinking in the past, and the symptoms only go away once you have had a drink, you might be physically dependent on alcohol, and therefore quitting drinking on your own will not be safe for you. If you think this could be the case for you, please talk to your <a href="/talking-your-doctor-part-i/">doctor</a> or another other qualified <a href="http://www.nhs.uk/service-search/Alcohol-addiction/LocationSearch/1805">health professional</a>. They will have safe treatment options available for you.</p>
			<p>But here’s the good news: If it’s safe for you, and you want to change your drinking, you’re in the right place to do something about it. You’ve joined Club Soda because you want to change your drinking, and we’re behind you every step of the way. Being part of Club Soda can help you whether you’re cutting down, stopping for a bit or going alcohol-free. Joining our <a href="https://www.facebook.com/groups/joinclubsoda/" >online discussion</a> will help you keep accountable for the changes you are making.</p>
			<p>We have <a href="/events/">socials</a> and online check-ins too, so if you want to chat about what’s going on, you can meet others who are changing their drinking. It’s friendly, supportive and not judgmental, and it can make a big difference. You might also want to join one of our <a href="/courses/">online programmes</a> or visit our <a href="https://www.youtube.com/c/clubsodauk">YouTube Channel</a> for our advice videos.</p>
			<p>It might be a good idea to talk to one of our <a href="/offer-type/support/">friendly experts</a> too, to see how they can support you in becoming a happier, healthier you. Whether you want to talk in depth about your drinking, get some advice about your diet, get fitter, find someone who can help you sleep or think big thoughts about the rest of your life, our experts are ready to help.</p>
			<p>You can take this test again later, to see how your score has changed. It can take a while to see the changes however, so we recommend taking the test again after three months.</p>';
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
	public function display_form( $audit_form, $atts, $user_id ) {

		$output = '';

		$msg = $this->display_message( 'new-audit-form-intro' );
		$cmb = $this->frontend_new_form_get();

		// Get $cmb object_types
		$post_types = $cmb->prop( 'object_types' );

		// Generate unique post title 
		$post_title = uniqid('audit_snapshot_');
		
		// Parse attributes
		$atts = shortcode_atts( array(
			'post_title' => $post_title,
			'post_author' => $user_id ? $user_id : 1, // Current user, or admin
			'post_status' => 'publish',
			'post_type'   => reset( $post_types ), // Only use first object_type in array
		), $atts, 'clubsoda-audits-ui' );

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
		$output = $output . '<p><a class="button" href="'. $current_url . '/?' . $q_string . 'audit_form=new"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i> Take the test</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_audit( $latest_snapshot_id ) {
		global $wp;
		$current_url = home_url( add_query_arg(array(),$wp->request) );
		$q_string = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = 'profiletab=' . $_GET['profiletab'] . '&';
		}

		$current_score = get_post_meta( $latest_snapshot_id, '_clubsoda_audit_score', true );
		$output = $this->display_message( 'audit-dashboard-intro' );
		$output = $output . '<p><i class="fa fa-check-circle fa-pull-left fa-border" aria-hidden="true"></i>Your current score is <strong>' . $current_score . '</strong> out of 40.</p>';
		$output = $output . $this->display_results( $current_score );
		$output = $output . '<hr>';
		$output = $output . '<p><a class="button" href="'. $current_url . '/?' . $q_string . 'audit_form=new"><i class="fa fa-trophy fa-fw" aria-hidden="true"></i> Take the test again</a>&nbsp;';
		$output = $output . '<a class="button" href="'. $current_url . '/?' . $q_string . 'audit_report=history"><i class="fa fa-history fa-fw" aria-hidden="true"></i> Track your progress</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function display_confirmation( $audit_form ) {
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		$q_string = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = '?profiletab=' . $_GET['profiletab'];
		}

		$output = $this->display_message( 'form-saved-audit' );

		$output = $output . '<p><a class="button" href="'. $current_url . $q_string . '">View my score</a></p>';
		
		return $output;
	}

	/**
	 * 
	 *
	 * 
	 *
	 * @since    1.0.0
	 */
	public function process_form( $audit_form ) {

		$cmb = $this->frontend_new_form_get();

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

		$score = -1;

		// Loop through remaining (sanitized) data, and save to post-meta
		foreach ( $sanitized_values as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = array_filter( $value );
				if( ! empty( $value ) ) {
					update_post_meta( $new_submission_id, $key, $value );
					if ( $key != '_clubsoda_audit_drink_choice' || $key != '_clubsoda_new_audit' ) {
						$score = $score + $value;
					}			
				}
			} else {
				update_post_meta( $new_submission_id, $key, $value );
				if ( $key != '_clubsoda_audit_drink_choice' || $key != '_clubsoda_new_audit' ) {
					$score = $score + $value;
				}		
			}
		}

		update_post_meta( $new_submission_id, '_clubsoda_audit_score', $score );

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
	public function frontend_new_form_get() {
		// Use ID of metabox in wds_frontend_form_register
		$metabox_id = '_clubsoda_frontend_audits_new_form';
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
	public function display_archive( $user_id = false ) {
		global $wp;
		$current_url = home_url( add_query_arg(array(),$wp->request) );
		$q_string = '';
		$nav_output = '';
		if ( isset( $_GET['profiletab']) ) {
			$q_string = '/?profiletab=' . $_GET['profiletab'] . '';
			$nav_output = '<hr><p><a class="button" href="'. $current_url . $q_string . '">Go Back</a></p>';
		}


		if ( false == $user_id ) {
			$user_id = $this->get_user_id();
		}

		$output = '';

		$posts_array = array_reverse( $this->get_all_snapshots( $user_id ) );

		if ( empty( $posts_array ) ) {
			$output = $output . $this->display_message( 'no-report-available' );
		} else {

			$output = $output . '<h3>Your audit history</h3> <table>';
			$output = $output . '<tr><th>Date</th><th>Score</th></tr>';

			foreach ( $posts_array as $snapshot ) {

				$score = get_post_meta( $snapshot->ID, '_clubsoda_audit_score', true );

				$output = $output . '<tr><td>' . get_the_date( '', $snapshot->ID ) . '</td>';
				$output = $output . '<td>' . $score . '</td>';	
				$output = $output . '</tr>';

			}

			$output = $output . '</table>' . $nav_output;

		}

		return $output;

	}

}