<?php
/**
 * The template to display the default post format for single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Grab the metadata from the database
$terms = get_the_terms( $post->ID, 'clubsoda_resources_type' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$resource_type = $terms[0]->name;
	$icon_class = get_term_meta( $terms[0]->term_id, 'icon_class', true );
}
$terms2 = get_the_terms( $post->ID, 'clubsoda_resources_subject' );
if ( $terms2 && ! is_wp_error( $terms2 ) ) {
	$resource_subject = $terms2[0]->name;
}
$resource_author = get_post_meta( $post->ID, '_clubsoda_resource_author', true );

$amazon_uk_url = get_post_meta( $post->ID, '_clubsoda_resource_amazon_uk_url', true );
$amazon_us_url = get_post_meta( $post->ID, '_clubsoda_resource_amazon_us_url', true );

$resource_notes = wpautop(get_post_meta( $post->ID, '_clubsoda_resource_notes', true ));
$cover_image = wp_get_attachment_image( get_post_meta( $post->ID, '_clubsoda_resource_cover_image_id', 1 ), 'clubsoda-cover' );
?>

<header class="row entry-header">
	<div class="medium-8 columns">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
	</div>
	<div class="medium-4 columns entry-meta">
		<span class="meta-pubdate">
			<?php echo esc_html( $resource_type ); ?>
			<?php clubsoda_display_post_icon( $icon_class ); ?>
		</span>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">

		<?php if ( !empty( $cover_image ) ) { ?>
			<div class="entry-cover-image">
				<?php echo $cover_image; ?>
			</div>
		<?php } ?>

		<div class="os-record">
			<div class="os-record-text">
				<span class="os-record-value p-description description" itemprop="description">
					<?php the_content(); ?>
				</span>
			</div>
			<div class="os-record-fields">
				<div class="os-record-row">
					<strong><span class="os-record-value p-name name" itemprop="name"><?php the_title(); ?></span></strong>
				</div>
				<div class="os-record-row">
					<span class="os-record-value"><?php echo esc_html( $resource_author ); ?></span>
				</div>

				<?php if ( !empty($amazon_uk_url) ) { ?>
					<div class="os-record-row clubsoda-event-price">
						<div class="clubsoda-event-price-amount">
							Amazon UK
						</div>
						<div class="clubsoda-event-price-button">
							<a class="clubsoda-buy-button" href="<?php echo esc_url( $amazon_uk_url ); ?>" target="_blank"><i class="fa fa-amazon" aria-hidden="true"></i> Buy Now</a>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }	?>

				<?php if ( !empty($amazon_us_url) ) { ?>
					<div class="os-record-row clubsoda-event-price">
						<div class="clubsoda-event-price-amount">
							Amazon US
						</div>
						<div class="clubsoda-event-price-button">
							<a class="clubsoda-buy-button" href="<?php echo esc_url( $amazon_us_url ); ?>" target="_blank"><i class="fa fa-amazon" aria-hidden="true"></i> Buy Now</a>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }	?>
			</div>
		</div>
		<?php clubsoda_post_footer(); ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
