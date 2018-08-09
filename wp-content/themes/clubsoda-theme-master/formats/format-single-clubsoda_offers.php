<?php
/**
 * The template to display the default post format for single posts.
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
$offer_public_url = get_post_meta( $post->ID, '_clubsoda_offer_public_url', true );
$offer_public_url_label = get_post_meta( $post->ID, '_clubsoda_offer_public_url_label', true );
$offer_public_desc = wpautop(get_post_meta( $post->ID, '_clubsoda_offer_public_desc', true ));

$offer_members_url = get_post_meta( $post->ID, '_clubsoda_offer_members_url', true );
$offer_members_url_label = get_post_meta( $post->ID, '_clubsoda_offer_members_url_label', true );
$offer_members_desc = wpautop(get_post_meta( $post->ID, '_clubsoda_offer_members_desc', true ));

$offer_members_only = get_post_meta( $post->ID, '_clubsoda_offer_members_only', true );
?>

<header class="row entry-header">
	<div class="medium-8 columns">
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>
</div>
<div class="medium-4 columns entry-meta">
		<span class="meta-pubdate">
			<?php echo esc_html( $offer_type ); ?>
			<?php clubsoda_display_post_icon( $icon_class ); ?>
		</span>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
<?php if ( is_user_logged_in() ) : ?>

	<?php oystershell_featured_image(); ?>
	<div class="os-record">
		<div class="os-record-text">
			<span class="os-record-value p-description description" itemprop="description">
				<?php the_content(); ?>
			</span>
		</div>

	<?php if ( !empty( $offer_members_url ) ) : ?>

		<?php if ( !empty( $offer_members_desc ) ) { ?>
			<div class="os-record-text">
				<span class="os-record-value p-description description" itemprop="description">
					<?php echo $offer_members_desc; ?>
				</span>
			</div>

		<?php }

			$offer_label = 'Find Out More';
			if ( !empty( $offer_members_url_label ) ) {
				$offer_label = $offer_members_url_label;
			} ?>
			<div class="os-record-row">
				<a class="os-record-value u-url url clubsoda-button-skinny clubsoda-button-sombre" href="<?php echo esc_url( $offer_members_url ); ?>"><?php clubsoda_display_post_icon( $offer_type_slug ); ?> <?php echo $offer_label; ?></a>
			</div>

	<?php else: ?>

		<?php if ( !empty( $offer_public_desc ) ) { ?>
			<div class="os-record-text">
				<span class="os-record-value p-description description" itemprop="description">
					<?php echo $offer_public_desc; ?>
				</span>
			</div>

		<?php } if ( !empty( $offer_public_url ) ) {
			$offer_label = 'Find Out More';
			if ( !empty( $offer_public_url_label ) ) {
				$offer_label = $offer_public_url_label;
			} ?>
			<div class="os-record-row">
				<a class="os-record-value u-url url clubsoda-button-skinny clubsoda-button-sombre" href="<?php echo esc_url( $offer_public_url ); ?>"><?php clubsoda_display_post_icon( $offer_type_slug ); ?> <?php echo $offer_label; ?></a>
			</div>

		<?php }
	endif; ?>

	</div>
	<?php clubsoda_post_footer(); ?>

<?php else: ?>

	<?php if ( true == $offer_members_only ) : ?>

		<p>This offer is only available to Club Soda members. Go <a href="#">here</a> to sign up.</p>

	<?php else: ?>

		<?php oystershell_featured_image(); ?>
		<div class="os-record">
			<div class="os-record-text">
				<span class="os-record-value p-description description" itemprop="description">
					<?php the_content(); ?>
				</span>
			</div>

		<?php if ( !empty( $offer_public_url ) ) : ?>

			<?php if ( !empty( $offer_public_desc ) ) { ?>
				<div class="os-record-text">
					<span class="os-record-value p-description description" itemprop="description">
						<?php echo $offer_public_desc; ?>
					</span>
				</div>

			<?php }

				$offer_label = 'Find Out More';
				if ( !empty( $offer_public_url_label ) ) {
					$offer_label = $offer_public_url_label;
				} ?>
				<div class="os-record-row">
					<a class="os-record-value u-url url clubsoda-button-skinny clubsoda-button-sombre" href="<?php echo esc_url( $offer_public_url ); ?>"><?php clubsoda_display_post_icon( $offer_type_slug ); ?> <?php echo $offer_label; ?></a>
				</div>

		<?php endif; ?>

		<?php if ( !empty( $offer_members_url ) ) : ?>

			<h2>Members Offer</h2>

			<p>There is a special offer on this item only available to Club Soda members. Go <a href="#">here</a> to sign up.</p>

		<?php endif; ?>

		</div>
		<?php clubsoda_post_footer(); ?>

	<?php endif; ?>


<?php endif; ?>
</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
