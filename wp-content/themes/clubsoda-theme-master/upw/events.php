<?php
/**
 * Standard ultimate posts widget template
 *
 * @version     2.0.0
 */

?>

<?php if ($instance['before_posts']) : ?>
  <div class="upw-before">
    <?php echo wpautop($instance['before_posts']); ?>
  </div>
<?php endif; ?>

<div class="upw-posts hfeed">

  <?php if ($upw_query->have_posts()) : ?>

      <?php while ($upw_query->have_posts()) : $upw_query->the_post(); ?>

        <?php 

        $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; 

        $today = date( U, mktime(00,00,00) );
        $event_date = get_post_meta( $post->ID, '_clubsoda_event_date', true );

        if ( $event_date >= $today ) {

          // Grab the metadata from the database
          $event_start_time = get_post_meta( $post->ID, '_clubsoda_event_start_time', true );
          $event_end_time = get_post_meta( $post->ID, '_clubsoda_event_end_time', true );
          $event_venue = get_post_meta( $post->ID, '_clubsoda_event_venue', true );
          $event_free = get_post_meta( $post->ID, '_clubsoda_event_free', true );
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
          
          ?>

          <article <?php post_class($current_post); ?>>

            <header>

              <?php if (current_theme_supports('post-thumbnails') && $instance['show_thumbnail'] && has_post_thumbnail()) : ?>
                <div class="entry-image">
                  <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_post_thumbnail($instance['thumb_size']); ?>
                  </a>
                </div>
              <?php endif; ?>

            </header>

            <div class="os-record h-event hCalendar" itemscope itemtype="http://schema.org/Event">
              <div class="os-record-fields">
                <div class="os-record-row">
                <?php if (get_the_title() && $instance['show_title']) : ?>
                  <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                      <?php the_title(); ?>
                    </a>
                  </h4>
                <?php endif; ?>
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
                <?php } ?>  
              </div>
            </div>

            <?php if ($instance['show_excerpt']) : ?>
              <div class="entry-summary">
                <p>
                  <?php echo get_the_excerpt(); ?>
                  <?php if ($instance['show_readmore']) : ?>
                    <a href="<?php the_permalink(); ?>" class="more-link"><?php echo $instance['excerpt_readmore']; ?></a>
                  <?php endif; ?>
                </p>
              </div>
            <?php elseif ($instance['show_content']) : ?>
              <div class="entry-content">
                <?php the_content() ?>
              </div>
            <?php endif; ?>

            <footer>

              <?php
              $categories = get_the_term_list($post->ID, 'category', '', ', ');
              if ($instance['show_cats'] && $categories) :
              ?>
                <div class="entry-categories">
                  <strong class="entry-cats-label"><?php _e('Posted in', 'upw'); ?>:</strong>
                  <span class="entry-cats-list"><?php echo $categories; ?></span>
                </div>
              <?php endif; ?>

              <?php
              $tags = get_the_term_list($post->ID, 'post_tag', '', ', ');
              if ($instance['show_tags'] && $tags) :
              ?>
                <div class="entry-tags">
                  <strong class="entry-tags-label"><?php _e('Tagged', 'upw'); ?>:</strong>
                  <span class="entry-tags-list"><?php echo $tags; ?></span>
                </div>
              <?php endif; ?>

            </footer>

          </article>

        <?php }

      endwhile; 

    else : ?>

    <p class="upw-not-found">
      <?php _e('No posts found.', 'upw'); ?>
    </p>

  <?php endif; ?>

</div>

<?php if ($instance['after_posts']) : ?>
  <div class="upw-after">
    <?php echo wpautop($instance['after_posts']); ?>
  </div>
<?php endif; ?>