<?php
/**
 * The loop that displays pages.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

if ( is_user_logged_in() ) {

	 if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			if ( has_post_thumbnail() ) { ?>
				<div id="col-3-a">
					<section id="front-content-featured-image" class="site-content front-content" role="main">
						<?php clubsoda_display_frontpage_loggedin_featured_image(); ?>
					</section><!-- #front-content-a .site-content -->
				</div>
			<?php	}

			if ( !empty_content($post->post_content )) { ?>
				<div id="col-3-b">
					<section id="front-content-page-text" class="site-content front-content" role="main">
						<div id="primary" class="content-area">
							<?php clubsoda_display_frontpage_loggedin_page_text(); ?>
		  			</div><!-- #primary .content-area -->
					</section><!-- #front-content-a .site-content -->
				</div>
			<?php	}
		endwhile;
	endif; ?>

	<div id="col-3-d " class="front-content-widgets-middle clearfix">
		<section id="front-content-widgets-middle" class="site-content front-content" role="main">
			<?php clubsoda_display_frontpage_loggedin_widgets_middle(); ?>
		</section><!-- #front-content-a .site-content -->
	</div>

	<div id="col-3-c " class="front-content-fullwidth-middle clearfix">
		<section id="front-content-fullwidth-middle" class="site-content front-content" role="main">
			<?php clubsoda_display_frontpage_loggedin_fullwidth_middle(); ?>
		</section><!-- #front-content-a .site-content -->
	</div>

		<div id="col-3-e " class="front-content-widgets-bottom clearfix">
			<section id="front-content-widgets-bottom" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_widgets_bottom(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>

		<div id="col-3-f " class="front-content-fullwidth-bottom clearfix">
			<section id="front-content-fullwidth-bottom" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_fullwidth_bottom(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>
<?php
} else {

	$options = get_option( '_clubsoda_options_home', false );
	$image = $options['_clubsoda_home_main_image'];
	$text = $options['_clubsoda_home_main_image_text'];
	$button_text = $options['_clubsoda_home_button_text'];
	$button_link = $options['_clubsoda_home_button_link'];

	clubsoda_display_frontpage_loggedout_banner( $image, $text );
	clubsoda_display_frontpage_loggedout_button( $button_text, $button_link );
	?>
		<div id="col-3-c " class="front-content-fullwidth-middle clearfix">
			<section id="front-content-fullwidth-middle" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_loggedout_fullwidth_middle(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>

		<div id="col-3-d " class="front-content-widgets-middle clearfix">
			<section id="front-content-widgets-middle" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_loggedout_widgets_middle(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>

		<div id="col-3-e " class="front-content-widgets-bottom clearfix">
			<section id="front-content-widgets-bottom" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_widgets_bottom(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>

		<div id="col-3-f " class="front-content-fullwidth-bottom clearfix">
			<section id="front-content-fullwidth-bottom" class="site-content front-content" role="main">
				<?php clubsoda_display_frontpage_fullwidth_bottom(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>

		<div id="col-3-g"  class="front-content-navigation">
			<section id="front-nav" class="row expanded front-navigation" role="navigation">
				<?php clubsoda_display_frontpage_navigation(); ?>
			</section><!-- #front-content-a .site-content -->
		</div>
<?php
}
?>
