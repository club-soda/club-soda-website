<?php

/**
 * Adds custom metaboxes
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 */

/**
 * Adds custom metaboxes.
 *
 * This class defines and adds custom metaboxes using the CMB2 library.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Metaboxes {

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
	 * @param 	string    $prefix    The field name prefix for this plugin.
	 */
	public function __construct( $prefix ) {

		$this->prefix = $prefix;

	}

	/**
	 * Register metaboxes for the WordPress admin.
	 *
	 * @since 	1.0.0
	 */
	function register_admin_metaboxes() {

		$this->add_events_metaboxes( $this->prefix, array( 'clubsoda_events', ) );

		$this->add_offers_metaboxes( $this->prefix, array( 'clubsoda_offers', ) );

		$this->add_resources_metaboxes( $this->prefix, array( 'clubsoda_resources', ) );

		$this->add_options_general_metaboxes( $this->prefix );

		$this->add_options_home_metaboxes( $this->prefix );

		$this->add_user_metaboxes( $this->prefix, array( 'user', ) );

	}

	/**
	 * Register metaboxes for the front end.
	 *
	 * @since 	1.0.0
	 */
	function register_public_metaboxes() {

		$this->add_frontend_goals_new_form( $this->prefix, array( 'clubsoda_goals', ) );

		$this->add_frontend_goals_progress_form( $this->prefix, array( 'clubsoda_goals', ) );

		$this->add_frontend_audits_new_form( $this->prefix, array( 'clubsoda_audits', ) );

	}


	function add_events_metaboxes( $prefix, $post_types ) {

		/**
		 * Events metaboxes
		 */
		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'events_metabox',
			'title'         => __( 'Event Details', 'plugin-text-domain' ),
			'object_types'  => $post_types, // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
		) );

		$cmb->add_field( array(
		    'name'     => __( 'Type', 'plugin-text-domain' ),
		    //'desc'     => 'Description Goes Here',
		    'id'       => $prefix . 'event_type',
		    'taxonomy' => 'clubsoda_event_type', //Enter Taxonomy Slug
		    'type'     => 'taxonomy_select',
		) );

		$cmb->add_field( array(
		    'name' => __( 'Date', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_date',
		    'type' => 'text_date_timestamp',
		    // 'timezone_meta_key' => 'wiki_test_timezone',
		    'date_format' => 'd/m/y',
		    'column' => array(
		        'position' => 2,
		        'name'     => 'Event Date',
		    ),
		) );

		$cmb->add_field( array(
		    'name' => __( 'Start Time', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_start_time',
		    'type' => 'text_time',
		) );

		$cmb->add_field( array(
		    'name' => __( 'End Time', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_end_time',
		    'type' => 'text_time',
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Venue &amp; Location', 'plugin-text-domain' ),
		    //'desc' => __( 'This is a title description', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'venue_title'
		) );

		$cmb->add_field( array(
		    'name'      => __( 'Region', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_region',
		    'taxonomy'  => 'clubsoda_region',
		    'type'      => 'taxonomy_multicheck_inline',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Venue', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_venue',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Venue Address', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_venue_address',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Venue Postal Code', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_venue_postcode',
		    'type'    => 'text_small',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Venue URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_venue_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Venue Notes', 'plugin-text-domain' ),
		    'id'      => $prefix . 'event_venue_notes',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Branding', 'plugin-text-domain' ),
		    //'desc' => __( 'This is a title description', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'branding_title'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Banner Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload a banner image. Image will be cropped to W 570px by H 180px.',
		    'id'      =>  $prefix . 'banner_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Profile Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload a profile image. Image will be cropped to W 190px by H 190px.',
		    'id'      =>  $prefix . 'profile_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Links &amp; Further Information', 'plugin-text-domain' ),
		    //'desc' => __( 'This is a title description', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'links_title'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Event website URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Facebook URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_facebook_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'MeetUp URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_meetup_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Booking', 'plugin-text-domain' ),
		    'desc' => __( 'How to book or buy tickets for the event. Note that using the Booking URL field will hide any PayPal buttons.', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'booking_title'
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Free event?', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_free',
		    'type' => 'checkbox',
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Woocommerce Product ID', 'plugin-text-domain' ),
		    'id'   => $prefix . 'wc_product_id',
		    'type'    => 'text_small',
		) );

		$cmb->add_field( array(
		    'name' => __( 'Price 01', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_price_01',
		    'type' => 'text_money',
		    'before_field' => '£', // Replaces default '$'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Price 01 Label', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_price_01_label',
		    'type'    => 'text',
		    'default' => 'Price:',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Price 01 PayPal URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_price_01_paypal',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=#######',
		       ),
		) );

		$cmb->add_field( array(
		    'name' => __( 'Price 02', 'plugin-text-domain' ),
		    'id'   => $prefix . 'event_price_02',
		    'type' => 'text_money',
		    'before_field' => '£', // Replaces default '$'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Price 02 Label', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_price_02_label',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Price 02 PayPal URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_price_02_paypal',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=#######',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Booking Label', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'event_booking_label',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Booking URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'event_booking_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Booking Notes', 'plugin-text-domain' ),
		    'id'      => $prefix . 'event_booking_notes',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Notes', 'plugin-text-domain' ),
		    'id'      => $prefix . 'event_notes',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );
	}

	function add_offers_metaboxes( $prefix, $post_types ) {

		/**
		 * Support offers metaboxes
		 */
		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'offers_metabox',
			'title'         => __( 'Expert or Perk Details', 'plugin-text-domain' ),
			'object_types'  => $post_types, // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
		) );

		$cmb->add_field( array(
		    'name'     => __( 'Type', 'plugin-text-domain' ),
		    //'desc'     => 'Description Goes Here',
		    'id'       => $prefix . 'offer_type',
		    'taxonomy' => 'clubsoda_offers_type', //Enter Taxonomy Slug
		    'type'     => 'taxonomy_select',
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Branding', 'plugin-text-domain' ),
		    //'desc' => __( 'This is a title description', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'branding_title'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Banner Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload a banner image. Image will be cropped to W 570px by H 180px.',
		    'id'      =>  $prefix . 'banner_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Profile Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload a profile image. Image will be cropped to W 190px by H 190px.',
		    'id'      =>  $prefix . 'profile_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Public Offer', 'plugin-text-domain' ),
		    'desc' => __( 'These details will be available to the general public.', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'public_title'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Public Offer URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'offer_public_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Public Offer Link Label', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'offer_public_url_label',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Public Offer Description', 'plugin-text-domain' ),
		    'id'      => $prefix . 'offer_public_desc',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Members Offer', 'plugin-text-domain' ),
		    'desc' => __( 'These details will only be available to Club Soda members.', 'plugin-text-domain' ),
		    'type' => 'title',
		    'id'   => $prefix . 'members_title'
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Members Offer URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'offer_members_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'www.website.com',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Members Offer Link Label', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'offer_members_url_label',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Members Offer Description', 'plugin-text-domain' ),
		    'id'      => $prefix . 'offer_members_desc',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );

		$cmb->add_field( array(
		    'name' =>  __( 'Members only?', 'plugin-text-domain' ),
		    'desc' => __( 'Exclude from public pages.', 'plugin-text-domain' ),
		    'id'   => $prefix . 'offer_members_only',
		    'type' => 'checkbox',
		) );

		$cmb->add_field( array(
		    'name'      => __( 'Region', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'offer_region',
		    'taxonomy'  => 'clubsoda_region',
		    'type'      => 'taxonomy_multicheck_inline',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Notes', 'plugin-text-domain' ),
		    'id'      => $prefix . 'offer_notes',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );
	}

function add_resources_metaboxes( $prefix, $post_types ) {

		/**
		 * Resources metaboxes
		 */
		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'resources_metabox',
			'title'         => __( 'Resource Details', 'plugin-text-domain' ),
			'object_types'  => $post_types, // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
		) );

		$cmb->add_field( array(
		    'name'     => __( 'Type', 'plugin-text-domain' ),
		    //'desc'     => 'Description Goes Here',
		    'id'       => $prefix . 'resource_type',
		    'taxonomy' => 'clubsoda_resources_type', //Enter Taxonomy Slug
		    'type'     => 'taxonomy_select',
		) );

		$cmb->add_field( array(
		    'name'     => __( 'Subject', 'plugin-text-domain' ),
		    //'desc'     => 'Description Goes Here',
		    'id'       => $prefix . 'resource_subject',
		    'taxonomy' => 'clubsoda_resources_subject', //Enter Taxonomy Slug
		    'type'     => 'taxonomy_select',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Author', 'plugin-text-domain' ),
		    'id'      =>  $prefix . 'resource_author',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Amazon UK URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'resource_amazon_uk_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'http://',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Amazon US URL', 'plugin-text-domain' ),
			'id'   => $prefix . 'resource_amazon_us_url',
		    'type' => 'text_url',
		    'attributes'  => array(
		        'placeholder' => 'http://',
		       ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Cover Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload a cover image. Recommended 10px by 10px.',
		    'id'      =>  $prefix . 'resource_cover_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
		    'name'    => __( 'Notes', 'plugin-text-domain' ),
		    'id'      => $prefix . 'resource_notes',
		    'type'    => 'wysiwyg',
		    'options' => array(
        				'media_buttons' => false, // show insert/upload button(s)
        				'textarea_rows' => 5,
        				'teeny' => true, // output the minimal editor config used in Press This
						),
		) );
	}


	/**
	 * Specify the metaboxes for the General tab on the settings page.
	 *
	 * @since 	1.0.0
	 * @param 	string    $prefix    The field name prefix for this plugin.
	 */
	function add_options_general_metaboxes( $prefix ) {

		$key =  $prefix . 'options_general';

		$cmb = new_cmb2_box( array(
			'id'         => $key . '_metaboxes',
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $key, )
			),
		) );

		$cmb->add_field( array(
				'name'     => __( 'General Settings', 'plugin-text-domain' ),
				//'desc' => __( 'field description (optional)', 'myprefix' ),
				'id'       => $prefix . '_title',
				'type'     => 'title',
			) );

		$cmb->add_field( array(
			'name'       => __( 'Colophon', 'plugin-text-domain' ),
			'desc'       => __( 'Text to be displayed at the bottom of every page.', 'plugin-text-domain' ),
			'id'         => $prefix . 'colophon',
			'type'       => 'textarea',
		) );

	}

	/**
	 * Specify the metaboxes for the General tab on the settings page.
	 *
	 * @since 	1.0.0
	 * @param 	string    $prefix    The field name prefix for this plugin.
	 */
	function add_options_home_metaboxes( $prefix ) {

		$key =  $prefix . 'options_home';

		$cmb = new_cmb2_box( array(
			'id'         => $key . '_metaboxes',
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $key, )
			),
		) );

		$cmb->add_field( array(
				'name'     => __( 'Public Home Page Settings', 'plugin-text-domain' ),
				//'desc' => __( 'field description (optional)', 'myprefix' ),
				'id'       => $prefix . '_title',
				'type'     => 'title',
			) );

		$cmb->add_field( array(
		    'name'    => __( 'Main Image', 'plugin-text-domain' ),
		    'desc'    => 'Upload the main image for the home page. Recommended image size: height 350px width (minimum) 1280px.',
		    'id'      =>  $prefix . 'home_main_image',
		    'type'    => 'file',
		    // Optional:
		    'options' => array(
		        'url' => true, // Hide the text input for the url
		    ),
		    'text'    => array(
		        'add_upload_file_text' => 'Add or Upload Image File' // Change upload button text. Default: "Add or Upload File"
		    ),
		) );

		$cmb->add_field( array(
			'name'       => __( 'Main Image Text', 'plugin-text-domain' ),
			'desc'       => __( 'Add text to display across the main image.', 'plugin-text-domain' ),
		    'id'      	 =>  $prefix . 'home_main_image_text',
			'type'       => 'text',
		) );

		$cmb->add_field( array(
			'name'       => __( 'Button Text', 'plugin-text-domain' ),
			'desc'       => __( 'Add text for the home page button.', 'plugin-text-domain' ),
		    'id'      	 =>  $prefix . 'home_button_text',
			'type'       => 'text',
		) );

		$cmb->add_field( array(
		    'name'    	 => __( 'Button Link', 'plugin-text-domain' ),
			'desc'       => __( 'Add the full URL for the button link.', 'plugin-text-domain' ),
			'id'   		 => $prefix . 'home_button_link',
		    'type' 		 => 'text_url',
		    'attributes' => array(
		        'placeholder' => 'https://',
		       ),
		) );

	}


	/**
	 * Register the form and fields for our front-end submission form
	 */
	function add_frontend_goals_new_form(  $prefix, $post_types  ) {

		$ui = new OSS_ClubSoda_Goals_Ui();

		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'frontend_goals_new_form',
			'title'         => __( 'New Metabox', 'plugin-text-domain' ),
			'object_types' => $post_types,
			'hookup'       => false,
			'save_fields'  => false,
			'cmb_styles' => false, // false to disable the CMB stylesheet
		) );

		// GOAL

		$cmb->add_field( array(
			'name'       => __( 'Pick your goal', 'plugin-text-domain' ),
			'id'         => $prefix . 'goal',
		    'type'             => 'select',
		    'show_option_none' => true,
		    'options'          => $ui->get_list_of_goals(),
		) );

		// CUT DOWN

		$cmb->add_field( array(
			'name'       => __( 'What will you achieve by cutting down?', 'plugin-text-domain' ),
			'id'         => $prefix . 'cutdown_achievement',
		    'type'    => 'multicheck',
		    'options' => $ui->get_list_of_cutdown_achievements(),
		    'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'cut-down',
			),

		) );

		$cmb->add_field( array(
			'name'       => __( 'Other achievement', 'plugin-text-domain' ),
			'desc'       => __( 'Write in what you want to achieve.', 'plugin-text-domain' ),
			'id'         => $prefix . 'cutdown_achievement_other',
			'type'       => 'text',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'cutdown_achievement',
				'data-conditional-value' => 'other',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'How will you cut down?', 'plugin-text-domain' ),
			'id'         => $prefix . 'cutdown_method',
		    'type'    => 'multicheck',
		    'options' => $ui->get_list_of_cutdown_methods(),
		    'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'cut-down',
			),

		) );

		$cmb->add_field( array(
			'name'       => __( 'Other method', 'plugin-text-domain' ),
			'desc'       => __( 'Write in how you will cut down.', 'plugin-text-domain' ),
			'id'         => $prefix . 'cutdown_method_other',
			'type'       => 'text',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'cutdown_method',
				'data-conditional-value' => 'other',
			),
		) );


		// STOP FOR A BIT

		$cmb->add_field( array(
			'name'       => __( 'What will you achieve by stopping for a bit?', 'plugin-text-domain' ),
			'id'         => $prefix . 'stopforabit_achievement',
		    'type'    => 'multicheck',
		    'options' => $ui->get_list_of_stopforabit_achievements(),
		    'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'stop-for-a-bit',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'Other achievement', 'plugin-text-domain' ),
			'desc'       => __( 'Write in what you want to achieve.', 'plugin-text-domain' ),
			'id'         => $prefix . 'stopforabit_achievement_other',
			'type'       => 'text',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'stopforabit_achievement',
				'data-conditional-value' => 'other',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'How long will you stop for?', 'plugin-text-domain' ),
			'id'         => $prefix . 'stopforabit_period',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options' => $ui->get_list_of_stopforabit_periods(),
			'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'stop-for-a-bit',
			),

		) );

		$cmb->add_field( array(
			'name'       => __( '<i class="fa fa-calendar fa-border" aria-hidden="true"></i> I will stop until:', 'plugin-text-domain' ),
			'id'         => $prefix . 'stopforabit_period_other',
			'type'       => 'text_date',
			'date_format' => 'd/m/Y',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'stopforabit_period',
				'data-conditional-value' => 'other',
			),
		) );


		// QUIT

		$cmb->add_field( array(
			'name'       => __( 'What will you achieve by quitting?', 'plugin-text-domain' ),
			'id'         => $prefix . 'quit_achievement',
		    'type'    => 'multicheck',
		    'options' => $ui->get_list_of_quit_achievements(),
 			'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'quit',
			),

		) );

		$cmb->add_field( array(
			'name'       => __( 'Other achievement', 'plugin-text-domain' ),
			'desc'       => __( 'Write in what you want to achieve.', 'plugin-text-domain' ),
			'id'         => $prefix . 'quit_achievement_other',
			'type'       => 'text',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'quit_achievement',
				'data-conditional-value' => 'other',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( '<i class="fa fa-calendar fa-border" aria-hidden="true"></i> I will start on:', 'plugin-text-domain' ),
			'id'         => $prefix . 'quit_start_date',
			'type'       => 'text_date',
			'date_format' => 'd/m/Y',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'quit',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'Have you quit before?', 'plugin-text-domain' ),
			'id'         => $prefix . 'quit_frequency',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options' => array(
		        'no' => __( 'No', 'plugin-text-domain' ),
				'few-times' => __( 'Yes, a few times', 'plugin-text-domain' ),
				'many-times' => __( 'Yes, many times', 'plugin-text-domain' ),
		    ),
		    'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'quit',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'What is your biggest challenge going to be?', 'plugin-text-domain' ),
			'id'         => $prefix . 'quit_challenge',
			'type'       => 'textarea',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'quit',
			),
		) );

		// STICK

		$cmb->add_field( array(
			'name'       => __( 'How will you stick to the goals you’ve already reached?', 'plugin-text-domain' ),
			'id'         => $prefix . 'stick_method_text',
			'type'       => 'textarea',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'stick',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'What will you achieve?', 'plugin-text-domain' ),
			'id'         => $prefix . 'stick_achievement_text',
			'type'       => 'textarea',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'stick',
			),
		) );

		// MOVEMENT

		$cmb->add_field( array(
			'name'       => __( 'How will you be part of the movement?', 'plugin-text-domain' ),
			'id'         => $prefix . 'movement_method',
		    'type'    => 'multicheck',
		    'options' => $ui->get_list_of_movement_methods(),
		    'select_all_button' => false,
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'movement',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'Other support', 'plugin-text-domain' ),
			'desc'       => __( 'Write in how you will help.', 'plugin-text-domain' ),
			'id'         => $prefix . 'movement_method_other',
			'type'       => 'text',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'movement_method',
				'data-conditional-value' => 'other',
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'What will you achieve?', 'plugin-text-domain' ),
			'id'         => $prefix . 'movement_achievement_text',
			'type'       => 'textarea',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => 'movement',
			),
		) );

		// DO FIRST

		$cmb->add_field( array(
			'name'       => __( 'What’s the first thing you will do?', 'plugin-text-domain' ),
			'id'         => $prefix . 'do_first',
			'type'       => 'textarea',
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => wp_json_encode( array( 'cut-down', 'stop-for-a-bit', 'quit', 'movement' ) ),
			),
		) );

		// COMITTMENT & CONFIDENCE

		$cmb->add_field( array(
		    'name'       => __( 'How committed are you?', 'plugin-text-domain' ),
		    //'desc'       => __( '0 = not at all, 1 = a bit, 2 = fairly, 3 = strongly, 4 = extremely', 'plugin-text-domain' ),
		    'id'          => $prefix . 'goal_committment',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options' => $ui->get_confidence_scale(),
			'select_all_button' => false,
			/*
		    'type'        => 'own_slider',
		    'min'         => '0',
		    'max'         => '4',
		    'default'     => '2', // start value
		    'value_label' => 'Value:',
			*/
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => wp_json_encode( array( 'cut-down', 'stop-for-a-bit', 'stick', 'quit',  ) ),
			),
		) );

		$cmb->add_field( array(
		    'name'       => __( 'How confident are you?', 'plugin-text-domain' ),
		    //'desc'       => __( '0 = not at all, 1 = a bit, 2 = fairly, 3 = strongly, 4 = extremely', 'plugin-text-domain' ),
		    'id'          => $prefix . 'goal_confidence',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options' => $ui->get_confidence_scale(),
			'select_all_button' => false,
			/*
		    'type'        => 'own_slider',
		    'min'         => '0',
		    'max'         => '4',
		    'default'     => '2', // start value
		    'value_label' => 'Value:',
			*/
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'goal',
				'data-conditional-value' => wp_json_encode( array( 'cut-down', 'stop-for-a-bit', 'stick', 'quit',  ) ),
			),
		) );

		// HIDDEN

		$cmb->add_field( array(
		    'id'         => $prefix . 'new_goal',
		    'type' => 'hidden',
		    'default' => true,
		) );

	}

	/**
	 * Register the form and fields for our front-end submission form
	 */
	function add_frontend_goals_progress_form(  $prefix, $post_types  ) {

		$ui = new OSS_ClubSoda_Goals_Ui();

		// Get user
		$user_id = $ui->get_user_id();

		// Get latest snapshot
		$current_goal = '';
		$latest_snapshot = $ui->get_latest_snapshot( $user_id );
		if ( false != $latest_snapshot ) {
			$snapshot_meta = get_post_meta( $latest_snapshot->ID );
			$current_goal = $snapshot_meta['_clubsoda_goal']['0'];
		}


		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'frontend_goals_progress_form',
			'title'         => __( 'Progress Metabox', 'plugin-text-domain' ),
			'object_types' => $post_types,
			'hookup'       => false,
			'save_fields'  => false,
			'cmb_styles' => false, // false to disable the CMB stylesheet
		) );

		// PROGRESS

		$cmb->add_field( array(
		    'name'       => __( 'So, how’s it going?', 'plugin-text-domain' ),
			//'desc'       => __( '0 = not at all, 1 = a little, 2 = fairly well, 3 = very well, 4 = extremely well', 'plugin-text-domain' ),
		    'id'          => $prefix . 'goal_progress',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options' => $ui->get_progress_scale(),
			'select_all_button' => false,
			/*
		    'type'        => 'own_slider',
		    'min'         => '0',
		    'max'         => '4',
		    'default'     => '2', // start value
		    'value_label' => 'Value:',
		    */
		) );

		$cmb->add_field( array(
			'name'       => __( 'What is your biggest achievement since last time?', 'plugin-text-domain' ),
			'id'         => $prefix . 'goal_progress_achievement',
			'type'       => 'textarea',
		) );

		$cmb->add_field( array(
			'name'       => __( 'What is your biggest challenge?', 'plugin-text-domain' ),
			'id'         => $prefix . 'goal_progress_challenge',
			'type'       => 'textarea',
		) );

		$cmb->add_field( array(
			'name'       => __( 'What is the next thing you will do?', 'plugin-text-domain' ),
			'id'         => $prefix . 'goal_progress_next',
			'type'       => 'textarea',
		) );

		// COMITTMENT & CONFIDENCE

		if ( 'movement' != $current_goal ) {

			$cmb->add_field( array(
			    'name'       => __( 'How committed are you?', 'plugin-text-domain' ),
			    //'desc'       => __( '0 = not at all, 1 = a bit, 2 = fairly, 3 = strongly, 4 = extremely', 'plugin-text-domain' ),
			    'id'          => $prefix . 'goal_committment',
			    'type'    => 'radio',
			    'show_option_none' => false,
			    'options' => $ui->get_confidence_scale(),
				'select_all_button' => false,
				/*
			    'type'        => 'own_slider',
			    'min'         => '0',
			    'max'         => '4',
			    'default'     => '2', // start value
			    'value_label' => 'Value:',
			    */
			) );

			$cmb->add_field( array(
			    'name'       => __( 'How confident are you?', 'plugin-text-domain' ),
			    //'desc'       => __( '0 = not at all, 1 = a bit, 2 = fairly, 3 = strongly, 4 = extremely', 'plugin-text-domain' ),
			    'id'          => $prefix . 'goal_confidence',
			    'type'    => 'radio',
			    'show_option_none' => false,
			    'options' => $ui->get_confidence_scale(),
				'select_all_button' => false,
				/*
			    'type'        => 'own_slider',
			    'min'         => '0',
			    'max'         => '4',
			    'default'     => '2', // start value
			    'value_label' => 'Value:',
			    */
			) );
		}

		// HIDDEN

		$cmb->add_field( array(
		    'id'         => $prefix . 'new_goal',
		    'type' => 'hidden',
		    'default' => false,
		) );

		$cmb->add_field( array(
		    'id'         => $prefix . 'goal',
		    'type' => 'hidden',
		    'default' => $current_goal,
		) );

	}




	/**
	 * Register the form and fields for our front-end submission form
	 */
	function add_frontend_audits_new_form(  $prefix, $post_types  ) {

		$ui = new OSS_ClubSoda_Audits_Ui();

		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'frontend_audits_new_form',
			'title'         => __( 'New Metabox', 'plugin-text-domain' ),
			'object_types' => $post_types,
			'hookup'       => false,
			'save_fields'  => false,
			'cmb_styles' => false, // false to disable the CMB stylesheet
		) );

		// SECTION 1

		$cmb->add_field( array(
			'name'       => __( 'How often do you drink?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_how_often',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_list_of_how_often(),
		    'default' => '2',
		) );

		// SECTION 2

		$cmb->add_field( array(
			'name'       => __( 'What do you normally drink?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_drink_choice',
			'type'       => 'textarea',
			'attributes' => array(
				'placeholder' => 'A large glass of white wine, a pint of beer, a double gin and tonic, etc.',
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'How many drinks do you have on a typical day when you are drinking?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_how_many',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_list_of_how_many(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'How often do you have 6 or more drinks in a single session?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_six_or_more',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'In the last year, how often have you not been able to stop drinking once you had started?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_not_stopping',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'In the last year, how often have you not done what was normally expected of you because of drinking?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_not_doing',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'In the last year, how often have you needed a drink in the morning to get yourself going?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_mornings',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'In the last year, how often have you felt guilty or sorry about your drinking?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_feeling_guilty',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		$cmb->add_field( array(
			'name'       => __( 'In the last year, how often have you not been able to remember what happened the night before?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_not_remembering',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_frequency_scale(),
			'attributes' => array(
				'data-conditional-id'    => $prefix . 'audit_how_often',
				'data-conditional-value' => wp_json_encode( array( '1', '2', '3', '4',  ) ),
			),
		) );

		// SECTION 3

		$cmb->add_field( array(
			'name'       => __( 'Have you ever hurt yourself or anyone else because of your drinking?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_hurt_others',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_last_year_scale(),
		) );

		$cmb->add_field( array(
			'name'       => __( 'Has anyone ever been worried about your drinking or suggested you cut down?', 'plugin-text-domain' ),
			'id'         => $prefix . 'audit_others_worried',
		    'type'    => 'radio',
		    'show_option_none' => false,
		    'options'          => $ui->get_last_year_scale(),
		) );


		// HIDDEN

		$cmb->add_field( array(
		    'id'         => $prefix . 'new_audit',
		    'type' => 'hidden',
		    'default' => true,
		) );

	}

	/**
	 * Specify the metaboxes for users.
	 *
	 * @since 	1.0.0
	 * @param 	string    $prefix    The field name prefix for this plugin.
	 * @param 	array    $post_types   The post types (should be 'user') that use these metaboxes.
	 */
	function add_user_metaboxes( $prefix, $post_types ) {

		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'user_metabox',
			'title'         => __( 'User Metabox', 'plugin-text-domain' ),
			'object_types'  => $post_types, // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		) );

		$cmb->add_field( array(
			'name'     => __( 'User Settings', 'plugin-text-domain' ),
			'id'       => $prefix . 'settings',
			'type'     => 'title',
			'on_front' => false,
	        'show_on_cb' => 'osc_cmb_only_show_on_admin_user_profile', // function should return a bool value
		) );

		$cmb->add_field( array(
			'name'       => __( 'Test Text', 'plugin-text-domain' ),
			'desc'       => __( 'field description (optional)', 'plugin-text-domain' ),
			'id'         => 'test_text',
			'type'       => 'text',
		) );

		$cmb->add_field( array(
			'name'       => __( 'Test Text 2', 'plugin-text-domain' ),
			'desc'       => __( 'field description (optional)', 'plugin-text-domain' ),
			'id'         => 'test_text_2',
			'type'       => 'text',
			'show_on_cb' => 'osc_cmb_only_show_on_admin_user_profile', // function should return a bool value
		) );

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
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}
		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'plugin-text-domain' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}
}
