<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

?>
<div id="col-4">
	<section id="secondary" class="row widget-area" role="complementary">

		<?php oystershell_before_sidebar(); ?>

		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

		<div id="sidebar-content" class="column row">

			<?php

			if ( is_page() ) :

				if ( ! dynamic_sidebar( 'single-page' ) ) :
				endif; // end sidebar widget area

			elseif ( is_single() ) :

				$current_post_type = get_post_type();

				if ( 'post' == $current_post_type ) :

					clubsoda_display_related_posts();

					if ( ! dynamic_sidebar( 'single-post' ) ) :
					endif; // end sidebar widget area

				else:

					if ( ! dynamic_sidebar( 'single-item' ) ) :
					endif; // end sidebar widget area

				endif;

			else:

				if ( ! dynamic_sidebar( 'default' ) ) :
				endif; // end sidebar widget area

			endif; ?>

		</div>

		<?php oystershell_after_sidebar(); ?>

		</div>
	</section><!-- #secondary .widget-area -->
</div><!-- #col-4 -->
