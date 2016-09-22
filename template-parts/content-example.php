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
	</header><!-- .entry-header -->



					<dl>
					  <dt>Site URL:</dt>
					  <dd><?php the_field(example_site_url);?></dd>
					  <dt>Webpage Test ID:</dt>
					  <dd><?php the_field(site_example_web_page_test_id);?></dd>
					  <dt>Media Queries:</dt>
					  <dd><?php the_field(example_site_media_queries);?></dd>
					  <dt>Site Meta Tag:</dt>
					  <dd><?php the_field(example_site_meta_tag);?></dd>
					  <dt>Plugins:</dt>
					 	<dd>
					 		<?php

					                         $plugins = get_field('example_site_plugins');

					                         ?>
					                         <?php if( $plugins ): ?>
					                         <ul>
					                           <?php foreach( $plugins as $plugin ): ?>
					                               <li><a href="<?php echo get_permalink( $plugin->ID ); ?>">
					                                 <?php echo get_the_title( $plugin->ID ); ?>
					                               </a></li>
					                           <?php endforeach; ?>
					                         </ul>
					                         <?php endif; ?></dd>
					  <dt>Frameworks:</dt>
					  <dd>	            <?php

	                        $frameworks = get_field('example_site_frameworks');

	                        ?>
	                        <?php if( $frameworks ): ?>
	                          <?php foreach( $frameworks as $framework ): ?>
	                              <a href="<?php echo get_permalink( $framework->ID ); ?>">
	                                <?php echo get_the_title( $framework->ID ); ?>
	                              </a>
	                          <?php endforeach; ?>
	                        <?php endif; ?></dd>
					</dl>





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




















	<footer class="entry-footer">
		<?php rwd_is_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
