<?php

/**
 * Adds a custom post type.
 *
 * This class defines and adds a custom post type.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Cpt_Resources {

	/**
	 * Defines the name of the custom post type
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function name() {

		$name = 'clubsoda_resources'; // Post type name. Max of 20 characters. Uppercase and spaces not allowed.

		return $name;
	}

	/**
	 * Defines the labels for the custom post type
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function labels() {

		$label_general = 'Resources';
		$label_singular = 'Resource';

		$label_featured_image = 'Resource Image';
	
		$label_general_lc = strtolower( $label_general );
		$label_singular_lc = strtolower( $label_singular );
		$label_featured_image_lc = strtolower( $label_featured_image );

	    $labels = array(
	        'name'                  => _x( $label_general, 'Post type general name', 'textdomain' ),
	        'singular_name'         => _x( $label_singular, 'Post type singular name', 'textdomain' ),
	        'menu_name'             => _x( $label_general, 'Admin Menu text', 'textdomain' ),
	        'name_admin_bar'        => _x( $label_singular, 'Add New on Toolbar', 'textdomain' ),
	        'add_new'               => __( 'Add New', 'textdomain' ),
	        'add_new_item'          => __( 'Add New ' . $label_singular, 'textdomain' ),
	        'new_item'              => __( 'New ' . $label_singular, 'textdomain' ),
	        'edit_item'             => __( 'Edit ' . $label_singular, 'textdomain' ),
	        'view_item'             => __( 'View ' . $label_singular, 'textdomain' ),
	        'all_items'             => __( 'All ' . $label_general, 'textdomain' ),
	        'search_items'          => __( 'Search ' . $label_general, 'textdomain' ),
	        'parent_item_colon'     => __( 'Parent ' . $label_singular . ':', 'textdomain' ),
	        'not_found'             => __( 'No ' . $label_general_lc . ' found.', 'textdomain' ),
	        'not_found_in_trash'    => __( 'No ' . $label_general_lc . ' found in Trash.', 'textdomain' ),
	        'featured_image'        => _x( $label_featured_image, 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'set_featured_image'    => _x( 'Set ' . $label_featured_image, 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'remove_featured_image' => _x( 'Remove ' . $label_featured_image, 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'use_featured_image'    => _x( 'Use as ' . $label_featured_image, 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'archives'              => _x( $label_singular . ' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
	        'insert_into_item'      => _x( 'Insert into ' . $label_singular_lc, 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
	        'uploaded_to_this_item' => _x( 'Uploaded to this ' . $label_singular_lc, 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
	        'filter_items_list'     => _x( 'Filter ' . $label_general_lc . ' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
	        'items_list_navigation' => _x( $label_general . ' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
	        'items_list'            => _x( $label_general . ' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	 
	    );

		return $labels;
	}



	/**
	 * Defines the settings of the custom post type
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function config() {

		$config = array();

        /**
         * A short description of what your post type is. As far as I know, this isn't used anywhere 
         * in core WordPress.  However, themes may choose to display this on post type archives. 
         */
        //$config['description'] = __( 'This is a description for my post type.', 'example-textdomain' ); // string

        /**
        * The slug to use for individual posts of this type. 
        */
        $config['slug'] = 'resources'; // string (defaults to the post type name)

        /** 
         * Whether the post type should be used publicly via the admin or by front-end users.  This 
         * argument is sort of a catchall for many of the following arguments.  I would focus more 
         * on adjusting them to your liking than this argument.
         */
        $config['public'] = true; // bool (default is FALSE)

        /**
         * Whether to exclude posts with this post type from front end search results.
         */
        $config['exclude_from_search'] = false; // bool (defaults to opposite of 'public')

        /**
         * Whether queries can be performed on the front end as part of parse_request(). 
         */
        $config['publicly_queryable'] = true; // bool (defaults to 'public').

        /**
         * Whether individual post type items are available for selection in navigation menus. 
         */
        $config['show_in_nav_menus'] = false; // bool (defaults to 'public')

        /**
         * Whether to generate a default UI for managing this post type in the admin. You'll have 
         * more control over what's shown in the admin with the other arguments.  To build your 
         * own UI, set this to FALSE.
         */
        $config['show_ui'] = true; // bool (defaults to 'public')

        /**
         * Whether to show post type in the admin menu. 'show_ui' must be true for this to work. 
         */
        $config['show_in_menu'] = true; // bool (defaults to 'show_ui')

        /**
         * Whether to make this post type available in the WordPress admin bar. The admin bar adds 
         * a link to add a new post type item.
         */
        $config['show_in_admin_bar'] = true; // bool (defaults to 'show_in_menu')

        /**
         * The position in the menu order the post type should appear. 'show_in_menu' must be true 
         * for this to work.
         */
        $config['menu_position'] = null; // int (defaults to 25 - below comments)

        /**
         * The URI to the icon to use for the admin menu item. There is no header icon argument, so 
         * you'll need to use CSS to add one.
         */
        //$config['menu_icon'] = null; // string (defaults to use the post icon)
        //$config['menu_icon'] = get_template_directory_uri() . '/images/cutom-posttype-icon.png';
        $config['menu_icon'] = 'dashicons-book';

        /**
         * Whether the posts of this post type can be exported via the WordPress import/export plugin 
         * or a similar plugin. 
         */
        $config['can_export'] = true; // bool (defaults to TRUE)

        /**
         * Whether to delete posts of this type when deleting a user who has written posts. 
         */
        $config['delete_with_user'] = false; // bool (defaults to TRUE if the post type supports 'author')

        /**
         * Whether this post type should allow hierarchical (parent/child/grandchild/etc.) posts. 
         */
        $config['hierarchical'] = false; // bool (defaults to FALSE)

        /** 
         * Whether the post type has an index/archive/root page like the "page for posts" for regular 
         * posts. If set to TRUE, the post type name will be used for the archive slug.  You can also 
         * set this to a string to control the exact name of the archive slug.
         */
        $config['has_archive'] = true; // bool|string (defaults to FALSE)
        //$config['has_archive'] = 'bookslist';

        /**
         * Sets the query_var key for this post type. If set to TRUE, the post type name will be used. 
         * You can also set this to a custom string to control the exact key.
         */
        $config['query_var'] = true; // bool|string (defaults to TRUE - post type name)
        //$config['query_var'] = 'books';

        /**
         * A string used to build the edit, delete, and read capabilities for posts of this type. You 
         * can use a string or an array (for singular and plural forms).  The array is useful if the 
         * plural form can't be made by simply adding an 's' to the end of the word.  For example, 
         * array( 'box', 'boxes' ).
         * We just want to keep the same permissions as for blog posts so we are using the default.
         * This means that 'map_meta_cap' and 'capabilities' arguments are left out.
         */
        $config['capability_type'] = 'post'; // string|array (defaults to 'post')

		/**
		* Whether to show the $wp_rewrite->front slug in the permalink.
		* If your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/. 
		*/
		$config['with_front'] = false; // bool (defaults to TRUE)

        /**
        * Whether to create feeds for this post type. 
        */
        $config['feeds'] = true; // bool (defaults to the 'has_archive' argument)

		/**
         * What WordPress features the post type supports. 
         */
        $config['supports_thumbnail'] = false;
        $config['supports_comments'] = true;
		$config['supports_customfields'] = false;

		/**
         * Standard taxonomies. 
         */
		$config['has_cats'] = true;
		$config['has_tags'] = true;

		return $config;
	}

	/**
	 * Creates the custom post type
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function create( $name, $labels, $config ) {

	    $args = array(
	    	//'description'		  => $config['description'],	
	        'labels'              => $labels,
	        'public'              => $config['public'],
	        'exclude_from_search' => $config['exclude_from_search'],
	        'publicly_queryable'  => $config['publicly_queryable'],
			'show_in_nav_menus'   => $config['show_in_nav_menus'],
	        'show_ui'             => $config['show_ui'],
	        'show_in_menu'        => $config['show_in_menu'],
	        'show_in_admin_bar'   => $config['show_in_admin_bar'],
	        'menu_position'       => $config['menu_position'],
	        'menu_icon'      	  => $config['menu_icon'],
			'can_export'      	  => $config['can_export'],
			'delete_with_user'    => $config['delete_with_user'],
			'hierarchical'        => $config['hierarchical'],
			'has_archive'         => $config['has_archive'],
	        'query_var'           => $config['query_var'],
	        'capability_type'     => $config['capability_type'],
	        'rewrite'             => array( 
	        							'slug' => $config['slug'],
	        							'with_front' => $config['with_front'],
	        							'feeds' => $config['feeds'],
	        						 ),
	        'supports'           => array('title','editor','author','excerpt'),
	    );

    	/* Register the post type. */
    	register_post_type( $name, $args );

		/* Add feature support. */
    	if ( true == $config['supports_thumbnail'] ) {
			add_post_type_support( $name, 'thumbnail' );
		}

		if ( true == $config['supports_comments'] ) {
			add_post_type_support( $name, 'comments' );
		}

		if ( true == $config['supports_customfields'] ) {
			add_post_type_support( $name, 'custom-fields' );
		}

		/* Add standard taxonomies. */
		if ( true == $config['has_cats'] ) {
			register_taxonomy_for_object_type( 'category', $name );
		}

		if ( true == $config['has_tags'] ) {
			register_taxonomy_for_object_type( 'post_tag', $name );
		}


	}

}