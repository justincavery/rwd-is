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
						<?php if ( has_post_thumbnail() ) { ?>
													<?php the_post_thumbnail(); ?>
							<?php } else { ?>
								<!--  What, no image? -->
							<?php }?>
						<header class="post__header">
							<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
							<p class="post__meta">By <strong><?php the_author(); ?></strong>, <?php the_time( 'j F Y' ); ?> posted in <a href="#"><?php the_category( ' ' ); ?></a></p>
						</header>

						<article class="post__body">
							<?php the_field(podcast_summary);?>
							<div class="meta-block">
							    <div class="meta-block__aside">
							        <ul class="meta-block__items">
							            <li class="meta-block__item">
							                <h3 class="meta-block__title">Episode</h3>
							                <p><?php the_title();?></p>
							            </li>
							            <?php $row = 1; if(get_field('podcast_guests')): ?>
							            <li class="meta-block__item">
							                <h3 class="meta-block__title">Guest</h3>
							                <p>
							<?php while(has_sub_field('podcast_guests')): ?>
							      <a href="<?php the_sub_field('podcast_guest_url'); ?>"><?php the_sub_field('podcast_guest_name'); ?></a>
							<?php $row++; endwhile; ?>

							</p>
							            </li><?php endif; ?>
	                        <li class="meta-block__item">
	                            <h3 class="meta-block__title">Length</h3>
	                            <p><?php the_field(podcast_length);?></p>
							                        </li>
							        </ul>
							    </div>
							    <div class="meta-block__body">
							        <h3 class="meta-block__title">Description</h3>
							        <p><?php the_field(podcast_subtitle);?></p>
							        <p><a class="btn btn--cta btn--inverted" href="<?php the_field(podcast_mp3_link);?>">Download MP3</a> <a class="btn btn--cta btn--inverted" href="https://itunes.apple.com/gb/podcast/responsive-design-podcast/id825631068?mt=2">Subscribe on iTunes</a></p>
							    </div>
							</div>
							<hr />
							<h2>Listen to episode <?php the_field(podcast_episode);?></h2>
							<audio class="u-audio" controls="controls" preload="metadata">
							Your browser does not support the <code>audio</code> element.
							<source src="<?php the_field(podcast_mp3_link);?>" type="audio/mp3">
							</audio>

							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
									'after'  => '</div>',
								) );
							?>


						</article>


					</div>
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'rwd-is' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
</div>