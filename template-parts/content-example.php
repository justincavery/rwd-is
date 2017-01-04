<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<div class="content">
		<div class="post">
			<header class="post__header">
				<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
				<p class="post__meta">By <strong><?php the_author(); ?></strong>, <?php the_time( 'j F Y' ); ?> posted in <a href="#"><?php the_category( ' ' ); ?></a></p>
			</header>

			<article class="post__body">

				<?php if ( has_post_thumbnail() ) { ?>
						<figure class="figure--full-width">
							<?php the_post_thumbnail(); ?>
							<figcaption><?php the_title()?> across four different breakpoints</figcaption>
										</figure>
					<?php } else { ?>
						<!--  What, no image? -->
					<?php }?>
<p><a class="btn" href="<?php the_field(example_site_url);?>">View <?php the_title()?></a></p>
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
						'after'  => '</div>',
					) );
				?>

<h2><?php the_title();?> Technical Details</h2>

<h3>Site Meta Tag</h3>

<pre><code>&lt;<?php the_field(example_site_meta_tag);?>&gt;</code></pre>

<h3>Media Queries</h3>

<pre><code><?php the_field(example_site_media_queries);?></code></pre>


								                      <?php
								                         $plugins = get_field('example_site_plugins');

								                         ?>
								                         <?php if( $plugins ): ?>
								                         <div class="section section--highlighted grid">
								                           <div class="grid__row">
								                             <div class="grid__column grid__column--full">
								                               <div class="section__column">
								                                 <header class="section__header">
								                                   <h2 class="section-heading"><span class="icon icon--articles"></span>Plugins used on <?php the_title(); ?></h2>
								                                 </header>
								                               </div>
								                             </div>
								                           </div>
								                           <ul class="grid__row flex-grid article-list">
								                           	<?php foreach( $plugins as $plugin ): ?>
								                               <li class="article-list">
								                                 <div class="resource resource--basic">
								                                       <a href="<?php echo get_permalink( $plugin->ID ); ?>" class="resource__link">
								                                         <header class="resource__header">
								                                         <h2 class="resource__title"><?php echo get_the_title( $plugin->ID ); ?></h2>
								                                         </header>
								                                         <div class="resource__body"><p><?php mb_strimwidth(the_field(resource_short_description), 0, 200, '...'); ?></div>
								                                         <footer class="resource__footer">
								                                             View Plugin
								                                         </footer>
								                                       </a>
								                                 </div>
								                               </li>
								                           <?php endforeach; ?>
								                         </ul>
								                       </div>
								                         <?php endif; ?>
								                         <small>frameworks</small>
								  	            <?php
				                        $frameworks = get_field('example_site_frameworks');
				                        ?>
				                        <?php if( $frameworks ): ?>
				                        <div class="section section--highlighted grid">
				                          <div class="grid__row">
				                            <div class="grid__column grid__column--full">
				                              <div class="section__column">
				                                <header class="section__header">
				                                  <h2 class="section-heading"><span class="icon icon--articles"></span>Frameworks used on <?php the_title(); ?></h2>
				                                </header>
				                              </div>
				                            </div>
				                          </div>
				                          <ul class="grid__row flex-grid article-list">
				                        <?php foreach( $frameworks as $framework ): ?>

				                          <li class="article-list">
				                            <div class="resource resource--basic">
				                                  <a href="<?php echo get_permalink( $framework->ID ); ?>" class="resource__link">
				                                    <header class="resource__header">
				                                    <h2 class="resource__title"><?php echo get_the_title( $framework->ID ); ?></h2>
				                                    </header>
				                                    <div class="resource__body"><p><?php mb_strimwidth(the_field(resource_short_description), 0, 200, '...'); ?></div>
				                                    <footer class="resource__footer">
				                                        View Framework
				                                    </footer>
				                                  </a>
				                            </div>
				                          </li>

				                          <?php endforeach; ?>
				                        </ul>
				                      </div>
				                        <?php endif; ?>

									<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
										'after'  => '</div>',
									) );
								?>
			</article>

			<div class="post__comments">
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
							</div>
		</div>




	<footer class="entry-footer">
		<?php rwd_is_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
