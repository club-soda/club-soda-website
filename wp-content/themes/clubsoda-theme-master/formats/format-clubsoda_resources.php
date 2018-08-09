<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Grab the metadata from the database
$terms = get_the_terms( get_the_ID(), 'clubsoda_resources_type' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$resource_type = $terms[0]->name;
	$icon_class = get_term_meta( $terms[0]->term_id, 'icon_class', true );
}
$cover_image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_clubsoda_resource_cover_image_id', 1 ), 'medium' );
$resource_author = get_post_meta( $post->ID, '_clubsoda_resource_author', true );
?>

<header class="row entry-header">
	<div class="medium-8 columns">
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
</div>
<div class="medium-4 columns entry-meta">
		<span class="meta-pubdate">
			<?php echo esc_html( $resource_type ); ?>
			<?php clubsoda_display_post_icon( $icon_class ); ?>
		</span>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content">
	<div class="small-12 columns">
	<?php if ( !empty( $cover_image ) ) { ?>
		<div class="entry-cover-image">
			<?php echo $cover_image; ?>
		</div>
	<?php } ?>
	<div class="os-record">
		<div class="os-record-fields">
			<div class="os-record-text">
				<span class="os-record-value p-summary summary" itemprop="summary">
					<?php the_excerpt(); ?>
				</span>
			</div>
			<div class="os-record-row">
				<strong><span class="os-record-value p-name name" itemprop="name"><?php the_title(); ?></span></strong>
			</div>
			<div class="os-record-row">
				<span class="os-record-value"><?php echo esc_html( $resource_author ); ?></span>
			</div>
			<div class="os-record-row">
				<span class="os-record-value"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">More&hellip;</a></span>
			</div>
		</div>
	</div>
</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
