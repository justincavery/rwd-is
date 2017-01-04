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
				<p class="post__meta">By <strong><?php the_author(); ?></strong>, <?php the_time( 'j F Y' ); ?> posted in <a href="/patterns">Patterns</a>.</p>
			</header>

			<article class="post__body">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
						'after'  => '</div>',
					) );
				?>

				<?php if ( has_post_thumbnail() ) { ?>
				<div class="figure--left">
											<?php the_post_thumbnail('post-standard'); ?>
										</div>
					<?php } else { ?>
						<!--  What, no image? -->
					<?php }?>

					<?php the_field(codepen_embed_code);?>

<p><a class="btn" href="<?php the_field(codpen_link);?>">View Codepen for <?php the_title(); ?></a></p>
			</article>
		</div>
	<?php if ( get_edit_post_link() ) : ?>
	<?php endif; ?>