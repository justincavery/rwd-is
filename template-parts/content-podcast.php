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
						<dt>Podcast Name:</dt>
						<dd><?php the_title();?></dd>
					  <dt>Podcast Number:</dt>
					  <dd><?php the_field(podcast_episode);?></dd>
					  <dt>Podcast MP3:</dt>
					  <dd><?php the_field(podcast_mp3_link);?></dd>
					  <dt>Podcast Guests:</dt>
					  <dd><?php $row = 1; if(get_field('podcast_guests')): ?>
<ul>
<?php while(has_sub_field('podcast_guests')): ?>
<!-- START CAROUSEL ITEM -->

  <li class="item <?php if($row == 1) { echo 'active'; } ?>">
      <p><?php the_sub_field('podcast_guest_name'); ?></p>
      <p><?php the_sub_field('podcast_guest_url'); ?></p>
    <p><?php the_sub_field('podcast_guest_description'); ?></p>
  <!-- END CAROUSEL ITEMs -->
</li>
<?php $row++; endwhile; ?>
</ul>
<?php endif; ?></dd>
					  <dt>Podcast Sponsor Name:</dt>
					  <dd><?php the_field(podcast_sponsor_name);?></dd>
            <dt>Podcast Sponsor URL:</dt>
            <dd><?php the_field(podcast_sponsor_url);?></dd>
            <dt>Podcast Sponsor Image:</dt>
            <dd><?php the_field(podcast_sponsor_image);?>
            </dd>
            <dt>Podcast Sponsor Description:</dt>
            <dd><?php the_field(podcast_sponsor_description);?></dd>
					  <dt>Podcast Length:</dt>
					  <dd><?php the_field(podcast_length);?></dd>
					  <dt>Podcast Size:</dt>
					  <dd><?php the_field(podcast_size);?></dd>
</dl>



<img src="<?php echo wp_get_attachment_url(the_sub_field('home_carousel_image'));?>" alt="">








	<footer class="entry-footer">
		<?php rwd_is_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
