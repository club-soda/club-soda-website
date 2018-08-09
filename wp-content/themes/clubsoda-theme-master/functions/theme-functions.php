<?php
/**
 * Custom theme functions
 * Functions unique to this theme
 * @package Oystershell
 * @since Oystershell 1.0
 */

function clubsoda_display_post_icon( $icon_class = null ) {


	if ( $icon_class ) {

		$icon = $icon_class;

	} else {

		$current_post_type = get_post_type();

		if ( is_page() ) :

			$icon = 'fa-page';

		elseif ( 'post' == $current_post_type ) :

			$icon = 'fa-newspaper-o';

		elseif ( 'clubsoda_events' == $current_post_type ) :

			$icon = 'fa-calendar';

		elseif ( 'clubsoda_offers' == $current_post_type ) :

			$icon = 'fa-life-ring';

		elseif ( 'clubsoda_resources' == $current_post_type ) :

			$icon = 'fa-archive';

		else:

			$icon = 'fa-newspaper-o';

		endif;
	}

	echo '<span class="clubsoda-post-icon fa ' . $icon . '" aria-hidden="true"></span>';

}


function clubsoda_related_user_badge( $user_id = '', $title_text = 'Related User' ) {

	if ( empty( $user_id ) ) {
		$user_id = get_the_author_meta( 'ID' );
	}

	printf( '<div class="clubsoda-user-badge"><div class="clubsoda-user-badge-avatar">%1$s</div><div class="clubsoda-user-badge-text"><h3 class="text-color-green">%2$s</h3><p><a class="url fn n" href="%3$s" title="%4$s" rel="author">%5$s</a></p><p>%6$s</p></div></div>',
			get_avatar( $user_id ),
			$title_text,
			esc_url( get_author_posts_url( $user_id ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'oystershell' ), get_the_author_meta( 'display_name', $user_id ) ) ),
			esc_html( get_the_author_meta( 'display_name', $user_id ) ),
			esc_html( get_the_author_meta( 'description', $user_id ) )
			);
}

function clubsoda_post_footer() {

	$current_post_type = get_post_type();

	if ( 'post' == $current_post_type ) :
		$title_text = 'Article By';
		$user_id = '';
	elseif ( 'clubsoda_events' == $current_post_type ) :

		$title_text = 'Organised By';

		$connected_users = get_users( array(
		  'connected_type' => 'events_to_users',
		  'connected_items' => get_the_ID(),
		) );

		if (!empty($connected_users)) {
			$user_id = $connected_users[0]->ID;
		} else {
			$user_id = 'skip';
		}
	elseif ( 'clubsoda_offers' == $current_post_type ) :

		$title_text = 'Provided By';

		$connected_users = get_users( array(
		  'connected_type' => 'offers_to_users',
		  'connected_items' => get_the_ID(),
		) );

		if (!empty($connected_users)) {
			$user_id = $connected_users[0]->ID;
		} else {
			$user_id = 'skip';
		}
	else:
		$user_id = 'skip';
	endif;

	?>
	<div id="clubsoda-post-footer">
		<?php if ( $user_id != 'skip' ) {
			clubsoda_related_user_badge( $user_id, $title_text );
		} ?>
		<div class="clubsoda-post-meta">
			<?php if ( 'clubsoda_resources' == $current_post_type ) {
				clubsoda_display_resource_type( '<p><i class="fa fa-tag" aria-hidden="true"></i> <span class="meta-type">', '</span></p>');
				clubsoda_display_resource_subject( '<p><i class="fa fa-tags" aria-hidden="true"></i> <span class="meta-type">', '</span></p>');
			} ?>
			<?php if ( 'clubsoda_offers' == $current_post_type ) { clubsoda_display_offer_type( '<p><i class="fa fa-tag" aria-hidden="true"></i> <span class="meta-type">', '</span></p>'); } ?>
			<?php if ( 'clubsoda_events' == $current_post_type ) { clubsoda_display_event_type( '<p><i class="fa fa-calendar" aria-hidden="true"></i> <span class="meta-type">', '</span></p>'); } ?>
			<?php clubsoda_display_regions( '<p><i class="fa fa-location-arrow" aria-hidden="true"></i> <span class="meta-regions">', '</span></p>'); ?>
			<?php clubsoda_display_goals( '<p><i class="fa fa-trophy" aria-hidden="true"></i> <span class="meta-goals">', '</span></p>'); ?>
			<?php oystershell_tags_n_cats( '<p><span class="meta-tags-n-cats">', '</span></p>' ); ?>
			<?php echo do_shortcode('[ssba]'); ?>
		</div>
	</div>
<?php
}

function clubsoda_single_meta() {
?>
	<p>
		<?php oystershell_meta_pubdatetime( '<span class="meta-pubdate">Posted on ', '</span>'); ?>
		<?php oystershell_meta_byline( 'by <span class="byline">', '</span>' ); ?>
		<?php oystershell_meta_moddatetime( '<span class="meta-moddate"> and last modified on ', '</span>'); ?>
		<?php oystershell_meta_modauthor( '<span class="meta-modauthor"> by ', '</span>'); ?>
		<?php oystershell_meta_permalink( '<span class="sep"> &middot; </span><i class="fa fa-link" aria-hidden="true"></i><span class="meta-permalink"> ', '</span>'); ?>
		<?php oystershell_comments_meta( '<span class="sep"> &middot; </span><i class="fa fa-comment" aria-hidden="true"></i><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><i class="fa fa-edit" aria-hidden="true"></i> <span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}


function clubsoda_archive_meta() {
	$current_post_type = get_post_type();
?>
	<p>
		<?php oystershell_meta_pubdate( '<span class="meta-pubdate">Posted on ', '</span>'); ?>
		<?php oystershell_meta_byline( 'by <span class="byline">', '</span>' ); ?>
		<?php if ( 'clubsoda_resources' == $current_post_type ) {
			clubsoda_display_resource_type( '<span class="sep"> &middot; </span><i class="fa fa-tag" aria-hidden="true"></i> <span class="meta-type">', '</span>');
			clubsoda_display_resource_subject( '<span class="sep"> &middot; </span><i class="fa fa-tags" aria-hidden="true"></i> <span class="meta-type">', '</span>');
		} ?>
		<?php if ( 'clubsoda_offers' == $current_post_type ) { clubsoda_display_offer_type( '<span class="sep"> &middot; </span><i class="fa fa-tag" aria-hidden="true"></i> <span class="meta-type">', '</span>'); } ?>
		<?php if ( 'clubsoda_events' == $current_post_type ) { clubsoda_display_event_type( '<span class="sep"> &middot; </span><i class="fa fa-calendar" aria-hidden="true"></i> <span class="meta-type">', '</span>'); } ?>
		<?php clubsoda_display_regions( '<span class="sep"> &middot; </span><i class="fa fa-location-arrow" aria-hidden="true"></i> <span class="meta-regions">', '</span>'); ?>
		<?php clubsoda_display_goals( '<span class="sep"> &middot; </span><i class="fa fa-trophy" aria-hidden="true"></i> <span class="meta-goals">', '</span>'); ?>
		<?php oystershell_tags_n_cats( '<span class="sep"> &middot; </span><span class="meta-tags-n-cats">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}

function clubsoda_display_goals( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_goal', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}


function clubsoda_display_regions( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_region', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}

function clubsoda_display_event_type( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_event_type', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}

function clubsoda_display_offer_type( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_offers_type', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}

function clubsoda_display_resource_type( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_resources_type', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}


function clubsoda_display_resource_subject( $before = '', $after = '' ) {

	$term_list =  get_the_term_list( get_the_ID(), 'clubsoda_resources_subject', '', ', ','' );

	if ( empty($term_list) || is_wp_error($term_list)) {
		return;
	}

	$meta_text = '%1$s%2$s%3$s';

	printf(
		$meta_text,
		$before,
		$term_list,
		$after
	);
}

function clubsoda_display_related_posts() {

	$related_posts = osc_get_connections( 'posts_to_posts' );

	if (!empty($related_posts)) :
	?>
	<section id="text-2" class="medium-10 large-7 medium-centered column widget widget_clubsoda-related-posts">
		<h1 class="widget-title">Related Articles</h1>
			<?php foreach ( $related_posts as $key => $related_post ) {
				$post_excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $related_post->ID));
				?>
				<h2 class="widget-title"><a href="<?php echo get_post_permalink( $related_post->ID ); ?>" ><?php echo $related_post->post_title; ?></a></h2>
				<p><?php if ( empty( $related_post->post_excerpt ) ) : ?>
					<?php echo wp_kses_post( wp_trim_words( $related_post->post_content ) ); ?>
				<?php else : ?>
					<?php echo wp_kses_post( $related_post->post_excerpt ); ?>
				<?php endif; ?></p>
			<?php } ?>
	</section>
	<?php endif;
}
