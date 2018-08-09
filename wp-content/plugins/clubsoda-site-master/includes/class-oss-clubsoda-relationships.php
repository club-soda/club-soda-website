<?php

/**
 * Adds relationships between posts
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 */

/**
 * Adds relationships between posts.
 *
 * This class defines and adds relationships between post types.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Relationships {

	/**
	 * 
	 */
	function register_relationships() {

		// Posts -> Posts
		p2p_register_connection_type( array(
		    'name' => 'posts_to_posts',
		    'from' => 'post',
		    'to' => 'post',
		    'reciprocal' => true,
		    'title' => __( 'Related Posts', 'plugin-text-domain' ),
	        'admin_box' => array(
			    'show' => 'any',
			    'context' => 'advanced'
			    )
		) );

		// Events -> Users
		p2p_register_connection_type( array(
		    'name' => 'events_to_users',
		    'from' => 'clubsoda_events',
		    'to' => 'user',
		    //'to_query_vars' => array( 'role' => 'editor' )
		) );

		// Offers -> Users
		p2p_register_connection_type( array(
		    'name' => 'offers_to_users',
		    'from' => 'clubsoda_offers',
		    'to' => 'user',
		    //'to_query_vars' => array( 'role' => 'editor' )
		) );

	}

}