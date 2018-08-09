<?php

function clubsoda_display_frontpage_loggedin_featured_image() { ?>
  <section id="featured-image" class="row expanded site-content" role="main">
    <div class="medium-10 large-7 medium-centered column column">
      <?php oystershell_featured_image(); ?>
    </div>
  </section>
  <?php }

function clubsoda_display_frontpage_loggedin_page_text() { ?>
  <section id="page-text" class="row site-content" role="main">
    <div id="post-<?php the_ID(); ?>" <?php post_class('medium-10 large-7 medium-centered column'); ?>>
      <article class="post-entry">
        <div class="entry-content" itemprop="mainContentOfPage">
          <?php the_content(); ?>
          <hr width="100%">
        </div>
      </article><!-- .post-entry -->
    </div><!-- #post-<?php the_ID(); ?> -->
  </section>
  <?php }

  function clubsoda_display_frontpage_loggedin_widgets_middle() { ?>
    <section id="widgets-middle" class="row small-up-1 medium-up-2 large-up-3 widget-area" role="complementary">
  		<?php oystershell_before_sidebar(); ?>
  		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

  			<?php if ( ! dynamic_sidebar( 'home-in-middle-widgets' ) ) :
  			endif; // end sidebar widget area ?>

  		<?php oystershell_after_sidebar(); ?>
  	</section><!-- #secondary .widget-area -->
  <?php }

  function clubsoda_display_frontpage_loggedin_fullwidth_middle() { ?>
    <section id="fullwidth-middle" class="row widget-area" role="complementary">
  		<?php oystershell_before_sidebar(); ?>
  		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

      <?php if ( is_active_sidebar( 'home-in-middle-fullwidth' ) ) : ?>
          <hr width="100%">
      		<?php dynamic_sidebar( 'home-in-middle-fullwidth' ); ?>
      <?php endif; ?>

  		<?php oystershell_after_sidebar(); ?>
  	</section><!-- #secondary .widget-area -->

  <?php }

function clubsoda_display_frontpage_loggedout_banner( $image, $text ) {
?>
<div id="col-3-a" class="front-content-banner" style="
  background-image: url('<?php echo( esc_url($image) ); ?>');
  background-position: center center;
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-color: #86a2a5;" >
	<section id="front-content-a" class="site-content front-content" role="main">
		<div id="front-content-a-col1">
			<p><?php echo( esc_html($text) ); ?></p>
		</div>
	</section><!-- #front-content-a .site-content -->
</div>
<?php
}

function clubsoda_display_frontpage_loggedout_button( $button_text, $button_link ) {
?>
<div id="col-3-b" class="front-content-button">
	<section id="front-content-b" class="site-content front-content" role="main">
		<div id="front-content-b-col1" >
			<p><a class="clubsoda-button clubsoda-button-raspberry" href="<?php echo( esc_url($button_link) ); ?>"><?php echo( esc_html($button_text) ); ?></a></p>
		</div>
  </section><!-- #front-content-b .site-content -->
</div>
<?php }

function clubsoda_display_frontpage_loggedout_fullwidth_middle() { ?>

  <section id="fullwidth-middle" class="row widget-area" role="complementary">
		<?php oystershell_before_sidebar(); ?>
		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

    <?php if ( is_active_sidebar( 'home-out-middle-fullwidth' ) ) : ?>
        <hr width="100%">
        <?php dynamic_sidebar( 'home-out-middle-fullwidth' ); ?>
    <?php endif; ?>

		<?php oystershell_after_sidebar(); ?>
	</section><!-- #secondary .widget-area -->

<?php }

function clubsoda_display_frontpage_loggedout_widgets_middle() { ?>

  <section id="widgets-middle" class="row small-up-1 medium-up-2 large-up-3 widget-area" role="complementary">
		<?php oystershell_before_sidebar(); ?>
		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

    <?php if ( is_active_sidebar( 'home-out-middle-widgets' ) ) : ?>
        <hr width="100%">
        <?php dynamic_sidebar( 'home-out-middle-widgets' ); ?>
    <?php endif; ?>

		<?php oystershell_after_sidebar(); ?>
	</section><!-- #secondary .widget-area -->

<?php }

function clubsoda_display_frontpage_fullwidth_bottom() { ?>

  <section id="fullwidth-bottom" class="row widget-area" role="complementary">
		<?php oystershell_before_sidebar(); ?>
		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

			<?php if ( ! dynamic_sidebar( 'home-bottom-fullwidth' ) ) :
			endif; // end sidebar widget area ?>

		<?php oystershell_after_sidebar(); ?>
	</section><!-- #secondary .widget-area -->

<?php }

function clubsoda_display_frontpage_widgets_bottom() { ?>

  <section id="widgets-bottom" class="row small-up-1 medium-up-2 large-up-3 widget-area" role="complementary">
		<?php oystershell_before_sidebar(); ?>
		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

			<?php if ( ! dynamic_sidebar( 'home-bottom-widgets' ) ) :
			endif; // end sidebar widget area ?>

		<?php oystershell_after_sidebar(); ?>
	</section><!-- #secondary .widget-area -->

<?php }

function clubsoda_display_frontpage_navigation() { ?>
  <nav id="home-navigation" class="small-12 small-centered columns site-navigation home-navigation" role="navigation">
    <h1 class="assistive-text"><?php _e( 'Home page navigation', 'oystershell' ); ?></h1>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'home',
        'container_class' => 'navigation-menu home-navigation-menu',
        'menu_class'      => 'navigation-menu-list home-navigation-menu-list',
        'menu_id'		  => 'front-content-bottom-menu',
        'depth' => 1,
        'fallback_cb'     => false
      ) );
    ?>
  </nav><!-- #postscript-navigation .site-navigation .postscript-navigation -->
  <nav id="mobile-search-navigation" class="show-for-small-only small-6 small-centered columns site-navigation home-navigation clearfix" role="navigation">
    <?php get_search_form( true ); ?>
  </nav><!-- #postscript-navigation .site-navigation .postscript-navigation -->
<?php }
