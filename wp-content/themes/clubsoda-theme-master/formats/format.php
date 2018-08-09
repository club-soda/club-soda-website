<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
		<div class="medium-8 columns">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
		</div>
		<div class="medium-4 columns entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-content">
			<?php the_excerpt(); ?>
			<p>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">More&hellip;</a>
			</p>
	</div><!-- .entry-summary -->
<?php else : ?>
	<div class="entry-content">
			<?php oystershell_featured_image(); ?>
			<?php the_excerpt(); ?>
			<p>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">More&hellip;</a>
			</p>
	</div><!-- .entry-content -->
<?php endif; ?>

<footer class="row entry-footer">
		<div class="small-12 columns entry-meta">
			<?php oystershell_footer_meta(); ?>
		</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
