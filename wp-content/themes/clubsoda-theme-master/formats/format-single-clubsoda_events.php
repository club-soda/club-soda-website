<?php
/**
 * The template to display the default post format for single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Grab the metadata from the database
$terms = get_the_terms( $post->ID, 'clubsoda_event_type' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$event_type = $terms[0]->name;
}
$event_date = get_post_meta( $post->ID, '_clubsoda_event_date', true );
$event_start_time = get_post_meta( $post->ID, '_clubsoda_event_start_time', true );
$event_end_time = get_post_meta( $post->ID, '_clubsoda_event_end_time', true );
$event_venue = get_post_meta( $post->ID, '_clubsoda_event_venue', true );
$event_venue_address = get_post_meta( $post->ID, '_clubsoda_event_venue_address', true );
$event_venue_postcode = get_post_meta( $post->ID, '_clubsoda_event_venue_postcode', true );
$event_venue_url = get_post_meta( $post->ID, '_clubsoda_event_venue_url', true );
$event_venue_notes = wpautop(get_post_meta( $post->ID, '_clubsoda_event_venue_notes', true ));
$event_url = get_post_meta( $post->ID, '_clubsoda_event_url', true );
$event_facebook_url = get_post_meta( $post->ID, '_clubsoda_event_facebook_url', true );
$event_meetup_url = get_post_meta( $post->ID, '_clubsoda_event_meetup_url', true );
$event_free = get_post_meta( $post->ID, '_clubsoda_event_free', true );
$woocommerce_id = get_post_meta( $post->ID, '_clubsoda_wc_product_id', true );
$event_price_01 = get_post_meta( $post->ID, '_clubsoda_event_price_01', true );
$event_price_01_label = get_post_meta( $post->ID, '_clubsoda_event_price_01_label', true );
$event_price_01_paypal = get_post_meta( $post->ID, '_clubsoda_event_price_01_paypal', true );
$event_price_02 = get_post_meta( $post->ID, '_clubsoda_event_price_02', true );
$event_price_02_label = get_post_meta( $post->ID, '_clubsoda_event_price_02_label', true );
$event_price_02_paypal = get_post_meta( $post->ID, '_clubsoda_event_price_02_paypal', true );
$event_booking_label = get_post_meta( $post->ID, '_clubsoda_event_booking_label', true );
$event_booking_url = get_post_meta( $post->ID, '_clubsoda_event_booking_url', true );
$event_booking_notes = wpautop(get_post_meta( $post->ID, '_clubsoda_event_booking_notes', true ));
$event_notes = wpautop(get_post_meta( $post->ID, '_clubsoda_event_notes', true ));
?>

<header class="row entry-header">
	<div class="medium-8 columns">
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>
</div>
<div class="medium-4 columns entry-meta">
		<span class="meta-pubdate">
			<time class="meta-entry-date" datetime="<?php echo date( "Y-m-d", $event_date ); ?>" ><?php echo date( "d M Y", $event_date ); ?></time>
			<?php clubsoda_display_post_icon(); ?>
		</span>

	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">

	<?php oystershell_featured_image(); ?>

	<div class="os-record h-event hCalendar" itemscope itemtype="http://schema.org/Event">
		<div class="os-record-text">
			<span class="os-record-value p-description description" itemprop="description">
				<?php the_content(); ?>
			</span>
		</div>
		<h2>Event Details</h2>
		<div class="os-record-fields">
			<div>
				<h3 class="os-record-value p-name name" itemprop="name"><?php the_title(); ?></h3>
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
			if ( !empty( $event_url ) ) { ?>
				<div class="os-record-row">
					<i class="fa fa-external-link fa-fw" aria-hidden="true"></i> <a class="os-record-value u-url url" href="<?php echo esc_url( $event_url ); ?>">Further information</a>
				</div>
			<?php }
			if ( !empty( $event_facebook_url ) ) { ?>
				<div class="os-record-row">
					<i class="fa fa-facebook-official fa-fw" aria-hidden="true"></i> <a class="os-record-value u-url url" href="<?php echo esc_url( $event_facebook_url ); ?>">This event on Facebook</a>
				</div>
			<?php }
			if ( !empty( $event_meetup_url ) ) { ?>
				<div class="os-record-row">
					<i class="fa fa-users fa-fw" aria-hidden="true"></i> <a class="os-record-value u-url url" href="<?php echo esc_url( $event_meetup_url ); ?>">This event on MeetUp</a>
				</div>
			<?php } ?>
		</div>
		<?php if ( $event_free == true ) { ?>
			<h3>Free Event</h3>
			<?php if ( !empty( $event_booking_label ) ) { ?>
				<div class="os-record-fields">
					<?php
					$booking_text = '<span class="os-record-value">' . esc_html( $event_booking_label ) . '</span>';
					if ( !empty( $event_venue_url ) ) {
							$booking_text = '<i class="fa fa-ticket fa-fw" aria-hidden="true"></i></i> <a class="os-record-value u-url url" href="' . esc_url( $event_booking_url ) . '" target="_blank">' . $event_booking_label . '</a>';
					}
					echo '<div class="os-record-row">' . $booking_text . '</div>'; ?>
				</div>
			<?php }
			if ( !empty( $event_booking_notes ) ) { ?>
				<div class="os-record-notes">
					<span class="os-record-value">
						<?php echo $event_booking_notes; ?>
					</span>
				</div>
			<?php }
		} elseif ( !empty( $woocommerce_id ) ) { ?>
			<h3>Buy Tickets</h3>
			<div class="os-record-fields">
				<div class="os-record-row">
					<?php echo do_shortcode( '[add_to_cart id="' . $woocommerce_id . '"]' ); ?>
				</div>
			</div>
			<?php if ( !empty( $event_booking_notes ) ) { ?>
				<div class="os-record-notes">
					<span class="os-record-value">
						<?php echo $event_booking_notes; ?>
					</span>
				</div>
			<?php }
 		} else { ?>
			<h3>Booking &amp; Tickets</h3>
			<?php if ( !empty( $event_booking_url ) ) { ?>
				<div class="os-record-fields">
					<?php
					$booking_label = 'Book Tickets';
					if ( !empty( $event_booking_label ) ) {
						$booking_label = esc_html( $event_booking_label );
					}
					$booking_text = '<i class="fa fa-ticket fa-fw" aria-hidden="true"></i></i> <a class="os-record-value u-url url" href="' . esc_url( $event_booking_url ) . '" target="_blank">' . $booking_label . '</a>';
					echo '<div class="os-record-row">' . $booking_text . '</div>'; ?>
				</div>
			<?php } else { ?>
				<div class="os-record-fields">
				<?php if ( $event_price_01 >= 0.01 ) { ?>
					<div class="os-record-row clubsoda-event-price">
						<div class="clubsoda-event-price-amount"><?php
							if ( !empty( $event_price_01_label ) ) {
								?><span class="os-record-value"><?php echo esc_html( $event_price_01_label ); ?></span> <?php
							} ?><span class="os-record-value">&pound;<?php echo esc_html( $event_price_01 ); ?></span>
						</div>
						<div class="clubsoda-event-price-button">
						<?php if ( !empty( $event_price_01_paypal ) ) { ?>
							<a class="clubsoda-buy-button" href="<?php echo esc_url( $event_price_01_paypal ); ?>" target="_blank"><i class="fa fa-paypal" aria-hidden="true"></i> Book With PayPal</a>
						<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }
				if ( $event_price_02 >= 0.01 ) { ?>
					<div class="os-record-row clubsoda-event-price">
						<div class="clubsoda-event-price-amount"><?php
							if ( !empty( $event_price_02_label ) ) {
								?><span class="os-record-value"><?php echo esc_html( $event_price_02_label ); ?></span> <?php
							} ?><span class="os-record-value">&pound;<?php echo esc_html( $event_price_02 ); ?></span>
						</div>
						<div class="clubsoda-event-price-button">
						<?php if ( !empty( $event_price_02_paypal ) ) { ?>
							<a class="clubsoda-buy-button" href="<?php echo esc_url( $event_price_02_paypal ); ?>" target="_blank"><i class="fa fa-paypal" aria-hidden="true"></i> Book With PayPal</a>
						<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }	?>
				</div>
			<?php }
			if ( !empty( $event_booking_notes ) ) { ?>
				<div class="os-record-notes">
					<span class="os-record-value">
						<?php echo $event_booking_notes; ?>
					</span>
				</div>
			<?php }
		}
		if ( !empty( $event_venue ) ) { ?>
			<h3>Venue Details</h3>
			<div class="os-record-fields">
				<?php
				$venue_text = '<span class="os-record-value">' . esc_html( $event_venue ) . '</span>';
				if ( !empty( $event_venue_url ) ) {
						$venue_text = '<i class="fa fa-external-link fa-fw" aria-hidden="true"></i> <a class="os-record-value u-url url" href="' . esc_url( $event_venue_url ) . '" target="_blank">' . $event_venue . '</a>';
				}
				echo '<div class="os-record-row">' . $venue_text . '</div>';
				if ( !empty( $event_venue_address ) ) {
					$address_text = '<i class="fa fa-location-arrow fa-fw" aria-hidden="true"></i> <span class="os-record-value">' . esc_html( $event_venue_address ) . '</span>';
					if ( !empty( $event_venue_postcode ) ) {
						$address_text = '<i class="fa fa-location-arrow fa-fw" aria-hidden="true"></i> <span class="os-record-value">' . esc_html( $event_venue_address ) . ', ' . esc_html( $event_venue_postcode ) . '</span>';
					}
					echo '<div class="os-record-row">' . $address_text . '</div>';
				} ?>
			</div>
			<?php if ( !empty( $event_venue_notes ) ) { ?>
				<div class="os-record-notes">
					<span class="os-record-value">
						<?php echo $event_venue_notes; ?>
					</span>
				</div>
			<?php }
		} ?>
	</div>
	<?php clubsoda_post_footer(); ?>
</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
