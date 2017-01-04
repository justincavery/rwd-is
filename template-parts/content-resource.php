<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<article id="post-<?php the_ID(); ?>" class="post__body">
		<?php if ( has_post_thumbnail() ) { ?>
    <figure class="figure--full-width">
              <?php the_post_thumbnail(); ?>
              <figcaption><?php the_title() ;?></figcaption>
            </figure>
			<?php } else { ?>
				<!--  What, no image? -->
			<?php }?>

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rwd-is' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
				'after'  => '</div>',
			) );
		?>

          <div class="meta-block">
              <div class="meta-block__aside">
                  <ul class="meta-block__items">
                      <li class="meta-block__item">
                          <h3 class="meta-block__title">Resource Name</h3>
                          <p><?php the_title();?><a href="<?php the_field(resource_url);?>"><span class="icon icon--exit-arrow"></span></a></p>
                      </li>
                      <li class="meta-block__item">
                          <h3 class="meta-block__title">Resource Creator</h3>
                          <p><?php the_field(resource_creator);?><a href="<?php the_field(resource_creator_url);?>"><span class="icon icon--exit-arrow"></span></a></p>
                      </li>
                  </ul>
              </div>
              <div class="meta-block__body">
                  <h3 class="meta-block__title">Description</h3>
                  <p><?php the_field(resource_short_description);?></p>
                  <p><a class="btn btn--cta btn--inverted" href="">View on Github</a> <a class="btn btn--cta btn--inverted" href="<?php the_field(resource_download_url);?>">Download Resource</a></p>
              </div>
          </div>
					<?php

	            $example_plugins = get_posts(array(
	              'post_type' => 'example',
	              'meta_query' => array(
	                array(
	                  'key' => 'example_site_frameworks', // name of custom field
	                  'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
	                  'compare' => 'LIKE'
	                )
	              )
	            ));

	            ?>
	            <?php if( $example_plugins ): ?>
	              <ul>
	              <?php foreach( $example_plugins as $example_plugin ): ?>
	                <li class="secondbit">
	                  <a href="<?php echo get_permalink( $example_plugin->ID ); ?>">
	                    <?php echo get_the_title( $example_plugin->ID ); ?>
	                  </a>
	                </li>
	              <?php endforeach; ?>
	              </ul>
	            <?php endif; ?>
		<?php rwd_is_entry_footer(); ?>
</article><!-- #post-## -->
