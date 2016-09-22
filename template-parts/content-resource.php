<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rwd_is_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-image"><?php the_post_thumbnail(); ?></div>
			<?php } else { ?>
				<!--  What, no image? -->
			<?php }?>


	</header><!-- .entry-header -->

	<div class="entry-content">
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
	</div><!-- .entry-content -->

					<dl>
						<dt>Resource Name:</dt>
						<dd><?php the_title();?></dd>
					  <dt>Resource Site URL:</dt>
					  <dd><?php the_field(resource_url);?></dd>
					  <dt>Resource Download Link:</dt>
					  <dd><?php the_field(resource_download_url);?></dd>
					  <dt>Resource Github Link:</dt>
					  <dd><?php the_field(resource_github_url);?></dd>
					  <dt>Resource Short Description:</dt>
					  <dd><?php the_field(resource_short_description);?></dd>
					  <dt>Resource Creator:</dt>
					  <dd><?php the_field(resource_creator);?></dd>
					  <dt>Resource Creator URL:</dt>
					  <dd><?php the_field(resource_creator_url);?></dd>
					  <dt>Sites that use this resource:</dt>
					  <dd>
        <?php
          $sites = get_posts(array(
            'post_type' => 'example',
            'meta_query' => array(
              array(
                'key' => 'example_site_plugins', // name of custom field
                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                'compare' => 'LIKE'
              )
            )
          ));
          ?>
          <?php if( $sites ): ?>
            <ul>
            <?php foreach( $sites as $site ): ?>

              <li>
                <a href="<?php echo get_permalink( $site->ID ); ?>">
                  <?php echo get_the_title( $site->ID ); ?>
                </a>
              </li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>
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

	                <li>
	                  <a href="<?php echo get_permalink( $example_plugin->ID ); ?>">
	                    <?php echo get_the_title( $example_plugin->ID ); ?>
	                  </a>
	                </li>
	              <?php endforeach; ?>
	              </ul>
	            <?php endif; ?>


					  </dd>
</dl>















	<footer class="entry-footer">
		<?php rwd_is_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
