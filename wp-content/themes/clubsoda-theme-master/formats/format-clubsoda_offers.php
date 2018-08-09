<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Grab the metadata from the database
$terms = get_the_terms( $post->ID, 'clubsoda_offers_type' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$offer_type = $terms[0]->name;
	$icon_class = get_term_meta( $terms[0]->term_id, 'icon_class', true );
}
$offer_members_only = get_post_meta( $post->ID, '_clubsoda_offer_members_only', true );

if ( !is_user_logged_in() && ( true == $offer_members_only) ) {
	return;
}

?>

<header class="row entry-header">
	<div class="medium-8 columns">
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
</div>
<div class="medium-4 columns entry-meta">
		<span class="meta-pubdate">
			<?php echo esc_html( $offer_type ); ?>
			<?php clubsoda_display_post_icon( $icon_class ); ?>
		</span>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content">
	<div class="small-12 columns">
	<?php oystershell_featured_image(); ?>
	<div class="os-record">
		<div class="os-record-text">
			<span class="os-record-value p-summary summary" itemprop="summary">
				<?php the_excerpt(); ?>
			</span>
			<p>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">More&hellip;</a>
			</p>
		</div>
	</div>
</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
