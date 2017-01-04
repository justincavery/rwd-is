<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<div class="content">

		<div class="post">
			<?php if ( has_post_thumbnail() ) { ?>
										<?php the_post_thumbnail('post-standard'); ?>
				<?php } else { ?>
					<!--  What, no image? -->
				<?php }?>
			<header class="post__header">
				<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
				<p class="post__meta">By <strong><?php the_author(); ?></strong>, <?php the_time( 'j F Y' ); ?> posted in <a href="#"><?php the_category( ' ' ); ?></a></p>
			</header>

			<article class="post__body">
				<?php the_field(article_introduction);?>
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
						'after'  => '</div>',
					) );
				?>

			</article>

		<!-- 	<div class="post__comments">
				Disqus code goes here...
			</div> -->
		</div>

--------------------

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
</article><!-- #post-## -->
</div>