<?php

/**
 * Adds custom taxonomies
 *
 * @link       http://grit-oyster.co.uk/
 * @since      1.0.0
 *
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 */

/**
 * Adds custom taxonomies.
 *
 * This class defines and adds custom taxonomies.
 *
 * @since      1.0.0
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Taxonomies {

	/**
	 * Registers the custom taxonomies with WordPress
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function define_taxonomies() {

		$custom_tax = array();

		$custom_tax[0] = array(
			'taxonomy_name' => 'clubsoda_region',
			'object_type' => array( 'clubsoda_events', 'clubsoda_offers' ),
			'oystershell_taxonomy_type' => 'custom_metabox',
			'tax_label_singular' => 'Region',
			'tax_label_plural' => 'Regions',
			'slug' => 'region',
			'description' => '',
			'display_post_class' => false,
			);

		$custom_tax[1] = array(
			'taxonomy_name' => 'clubsoda_goal',
			'object_type' => array( 'post', 'clubsoda_events', 'clubsoda_offers', 'clubsoda_resources'),
			'oystershell_taxonomy_type' => 'category',
			'tax_label_singular' => 'Goal',
			'tax_label_plural' => 'Goals',
			'slug' => 'goal',
			'description' => '',
			'display_post_class' => false,
			);

		$custom_tax[2] = array(
			'taxonomy_name' => 'clubsoda_event_type',
			'object_type' => 'clubsoda_events',
			'oystershell_taxonomy_type' => 'custom_metabox',
			'tax_label_singular' => 'Type of Event',
			'tax_label_plural' => 'Types of Event',
			'slug' => 'event-type',
			'description' => '',
			'display_post_class' => false,
			);

		$custom_tax[3] = array(
			'taxonomy_name' => 'clubsoda_offers_type',
			'object_type' => 'clubsoda_offers',
			'oystershell_taxonomy_type' => 'custom_metabox',
			'tax_label_singular' => 'Type of Offer',
			'tax_label_plural' => 'Types of Offer',
			'slug' => 'offer-type',
			'description' => '',
			'display_post_class' => false,
			);

		$custom_tax[4] = array(
			'taxonomy_name' => 'clubsoda_resources_type',
			'object_type' => 'clubsoda_resources',
			'oystershell_taxonomy_type' => 'custom_metabox',
			'tax_label_singular' => 'Type of Resource',
			'tax_label_plural' => 'Types of Resource',
			'slug' => 'resource-type',
			'description' => '',
			'display_post_class' => false,
			);

		$custom_tax[5] = array(
			'taxonomy_name' => 'clubsoda_resources_subject',
			'object_type' => 'clubsoda_resources',
			'oystershell_taxonomy_type' => 'category',
			'tax_label_singular' => 'Subject Category',
			'tax_label_plural' => 'Subject Categories',
			'slug' => 'resource-subject',
			'description' => '',
			'display_post_class' => false,
			);

		return $custom_tax;
	}

	/**
	 * Registers the custom taxonomies with WordPress
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function register_taxonomies( $custom_tax ) {

		$tax_class = new OSC_Taxonomies();
		
		foreach ( $custom_tax as $ctax ) {
 			
 			$taxonomy_name = $ctax['taxonomy_name'];
 			$object_type = $ctax['object_type'];
 			$oystershell_taxonomy_type = $ctax['oystershell_taxonomy_type'];
 			$tax_label_singular = $ctax['tax_label_singular'];
 			$tax_label_plural = $ctax['tax_label_plural'];
 			$slug = $ctax['slug'];
 			$description = $ctax['description'];

			$tax_class->register_taxonomy( $taxonomy_name, $object_type, $oystershell_taxonomy_type, $tax_label_singular, $tax_label_plural, $slug, $description );
		}

		add_filter( 'post_class', array( $this, 'taxonomy_post_class' ) );

	}

	/**
	 * Adds terms from a custom taxonomy to post_class
	 */
	function taxonomy_post_class( $classes ) {
		global $post;

		$custom_tax = $this->define_taxonomies();

		foreach ( $custom_tax as $ctax ) {

			if ( true == $ctax['display_post_class'] ) {

				$taxonomy = $ctax['taxonomy_name'];

			    $terms = get_the_terms( (int) $post->ID, $taxonomy );
			    if( !empty( $terms ) ) {
			        foreach( (array) $terms as $order => $term ) {
			            if( !in_array( $term->slug, $classes ) ) {
			                $classes[] = $term->slug;
			            }
			        }
			    }
			}
		}
	    return $classes;

	} // end taxonomy_post_class

}


/**
 * Adds custom meta fields to taxonomies.
 *
 * This class defines and adds custom meta fields to taxonomies.
 *
 * @since      1.0.1
 * @package    OSS_ClubSoda
 * @subpackage OSS_ClubSoda/includes
 * @author     Grit & Oyster <code@grit-oyster.co.uk>
 */
class OSS_ClubSoda_Term_Meta {

	/**
	 * Defines the custom taxonomy meta data
	 *
	 * Long Description.
	 *
	 * @since    1.0.1
	 */
	public function define_term_meta() {

		$term_meta = array();

		$term_meta[0] = array(
			'custom_meta_key' => 'icon_class',
			'custom_meta_taxonomy' => 'clubsoda_offers_type',
			);

		$term_meta[1] = array(
			'custom_meta_key' => 'icon_class',
			'custom_meta_taxonomy' => 'clubsoda_resources_type',
			);

		return $term_meta;
	}

	/**
	 * Registers the custom taxonomy meta data with WordPress
	 *
	 * Long Description.
	 *
	 * @since    1.0.1
	 */
	public function register_term_meta( $term_meta ) {

		foreach ( $term_meta as $term ) {

			register_meta( 'term', $term['custom_meta_key'],  array( $this, 'sanitize_term_meta' . $term['custom_meta_key'] )  );
			add_action( $term['custom_meta_taxonomy'] . '_add_form_fields', array( $this, 'new_term_field_' . $term['custom_meta_key'] ) );
			add_action( $term['custom_meta_taxonomy'] . '_edit_form_fields', array( $this, 'edit_term_field_' . $term['custom_meta_key'] ) );
			add_action( 'edit_' . $term['custom_meta_taxonomy'],   array( $this, 'save_term_' . $term['custom_meta_key'] ) );
			add_action( 'create_' . $term['custom_meta_taxonomy'] , array( $this, 'save_term_' . $term['custom_meta_key'] ) );

		}
	}

	/* Icon Class */

	public function sanitize_term_meta_icon_class( $value ) {

	    $value = sanitize_text_field( $value );

	    return $value;
	}

	public function new_term_field_icon_class() {

	    wp_nonce_field( basename( __FILE__ ), 'oss_term_icon_class_nonce' ); ?>

	    <div class="form-field oss-term-icon-class-wrap">
	        <icon-class for="oss-term-icon-class"><?php _e( 'Icon Class', 'plugin-text-domain' ); ?></icon-class>
	        <input type="text" name="oss-term-icon-class" id="oss-term-icon-class" value="" class="oss-term-icon-class-field" />
	    </div>
	<?php }

	public function edit_term_field_icon_class( $term ) {

	    $default = '';
	    $value = get_term_meta( $term->term_id, 'icon_class', true );

	    if ( ! $value )
	        $value = $default; ?>

	    <tr class="form-field oss-term-icon-class-wrap">
	        <th scope="row"><icon-class for="oss-term-icon-class"><?php _e( 'Icon Class', 'plugin-text-domain' ); ?></icon-class></th>
	        <td>
	            <?php wp_nonce_field( basename( __FILE__ ), 'oss_term_icon_class_nonce' ); ?>
	            <input type="text" name="oss-term-icon-class" id="oss-term-icon-class" value="<?php echo esc_attr( $value ); ?>" class="oss-term-icon-class-field" />
	        </td>
	    </tr>
	<?php }

	public function save_term_icon_class( $term_id ) {

	    if ( ! isset( $_POST['oss_term_icon_class_nonce'] ) || ! wp_verify_nonce( $_POST['oss_term_icon_class_nonce'], basename( __FILE__ ) ) )
	        return;

	    $old_value = get_term_meta( $term_id, 'icon_class', true );
	    $new_value = isset( $_POST['oss-term-icon-class'] ) ? $this->sanitize_term_meta_icon_class( $_POST['oss-term-icon-class'] ) : '';

	    if ( $old_value && '' === $new_value )
	        delete_term_meta( $term_id, 'icon_class' );

	    else if ( $old_value !== $new_value )
	        update_term_meta( $term_id, 'icon_class', $new_value );
	}
}