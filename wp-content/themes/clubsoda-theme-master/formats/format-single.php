<?php
/**
 * The template to display the default post format for single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="medium-8 columns">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
	</div>
	<div class="medium-4 columns entry-meta">
		<?php oystershell_header_meta(); ?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<?php the_content(); ?>
		<?php if ( oystershell_is_paginated_post() ) { ?>
			<div class="page-links">
				<?php wp_link_pages(); ?>
			</div><!-- .page-links -->
		<?php } // end if ?>
		<?php clubsoda_post_footer(); ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
