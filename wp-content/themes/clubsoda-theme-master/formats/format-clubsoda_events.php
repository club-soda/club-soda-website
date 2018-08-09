<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Grab the metadata from the database
$event_date = get_post_meta( $post->ID, '_clubsoda_event_date', true );
$event_start_time = get_post_meta( $post->ID, '_clubsoda_event_start_time', true );
$event_end_time = get_post_meta( $post->ID, '_clubsoda_event_end_time', true );
$event_venue = get_post_meta( $post->ID, '_clubsoda_event_venue', true );
$event_free = get_post_meta( $post->ID, '_clubsoda_event_free', true );
$woocommerce_id = get_post_meta( $post->ID, '_clubsoda_wc_product_id', true );
$event_price_01 = get_post_meta( $post->ID, '_clubsoda_event_price_01', true );
$event_price_02 = get_post_meta( $post->ID, '_clubsoda_event_price_02', true );

$price_text = 'skip';
if ( $event_price_01 >= 0.01 || $event_price_02 >= 0.01 ) {
	if ( $event_price_01 >= 0.01 && $event_price_02 >= 0.01 ) {
		$price_text = '&pound;' . esc_html( $event_price_01 ) . ' / ' . '&pound;' . esc_html( $event_price_02 );
	} else {
		if ( $event_price_01 >= 0.01 ) {
			$price_text = '&pound;' . esc_html( $event_price_01 );
		}
		if ( $event_price_02 >= 0.01 ) {
			$price_text = '&pound;' . esc_html( $event_price_02 );
		}
	}
}
if ( $event_free == true ) {
	$price_text = 'Free Event';
}
if ( !empty( $woocommerce_id ) ) {
	$price_text = 'skip';
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
			<time class="meta-entry-date" datetime="<?php echo date( "Y-m-d", $event_date ); ?>" ><?php echo date( "d M Y", $event_date ); ?></time>
			<?php clubsoda_display_post_icon(); ?>
		</span>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content">
	<div class="small-12 columns">
	<?php oystershell_featured_image(); ?>
	<div class="os-record h-event hCalendar" itemscope itemtype="http://schema.org/Event">
		<div class="os-record-text">
			<span class="os-record-value p-description description" itemprop="description">
				<?php the_excerpt(); ?>
			</span>
		</div>
		<div class="os-record-fields">
			<div class="os-record-row">
					<strong><span class="os-record-value p-name name" itemprop="name"><?php the_title(); ?></span></strong>
			</div>
			<?php if ( !empty( $event_date ) ) { ?>
				<div class="os-record-row">
					<span class="os-record-value"><time class="dt-start dtstart" itemprop="startDate" datetime="<?php echo date( "Y-m-d", $event_date ); ?>"><?php echo date( "d F Y", $event_date ); ?></time></span>
				</div>
			<?php }
			if ( !empty( $event_start_time ) ) { ?>
				<div class="os-record-row">
					<span class="os-record-value"><?php echo esc_html( $event_start_time ); ?></span><?php if ( !empty( $event_end_time ) ) { ?> - <span class="os-record-value"><?php echo esc_html( $event_end_time ); ?></span><?php } ?>
				</div>
			<?php }
			if ( !empty( $event_venue ) ) { ?>
				<div class="os-record-row">
					<span class="os-record-value"><?php echo esc_html( $event_venue ); ?></span>
				</div>
			<?php }
			if ( $price_text != 'skip' ) { ?>
				<div class="os-record-row">
					<span class="os-record-value"><?php echo $price_text ?></span>
				</div>
			<?php }
			if ( !empty( $woocommerce_id ) ) { ?>
				<div class="os-record-row">
					<?php echo do_shortcode( '[add_to_cart id="' . $woocommerce_id . '"]' ); ?>
				</div>
			<?php } ?>
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
