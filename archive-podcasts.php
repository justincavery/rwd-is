<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

get_header(); ?>
<div class="content">
	<div class="entry grid">
<div class="grid__row">
	<?php
	// the query
	$the_query = new WP_Query( 'post_type=podcasts&posts_per_page=1&orderby=date&order=DESC' ); ?>

	<?php if ( $the_query->have_posts() ) : ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


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
						</article>



		<?php endwhile; ?>



		<?php endif; ?>
</div>

<hr />
	  <div class="grid__row">
	  	<h2>...or Listen to the archives</h2>
			      <?php
			      // the query
			      $the_query = new WP_Query( 'post_type=podcasts&posts_per_page=100&orderby=date&order=DESC&offset=1' ); ?>

			      <?php if ( $the_query->have_posts() ) : ?>

			        <!-- pagination here -->

			<ul class="flex-grid article-list">

			  <!-- the loop -->
			  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			    <li>
			    	<div class="resource resource--post">
			    	  <div class="resource__image">
			    	    <a href="<?php the_permalink(); ?>">
			    	    	<?php
			    	    	if ( has_post_thumbnail() ) {
			    	    	    the_post_thumbnail('post-standard');
			    	    	}
			    	    	else {
			    	    	    echo '<img src="/wp-content/themes/rwd-is/no-image.png" alt="Image placeholder" />';
			    	    	}
			    	    	?>
			    	    </a>
			    	  </div>
			    	  <div class="resource__content">
			    	    <header class="resource__header">
			    	      <h3 class="resource__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			    	      <date class="resource__meta"><?php the_time('F jS, Y'); ?></date>
			    	    </header>
			    	    <div class="resource__body">
			    	      <?php the_excerpt(); ?>
			    	    </div>
			    	    <footer class="resource__footer">
			    	      <a href="<?php the_permalink(); ?>">Listen</a>
			    	    </footer>
			    	  </div>
			    	</div>
			    </li>
			  <?php endwhile; ?>
			  <!-- end of the loop -->
			</ul>
			        <!-- pagination here -->

			        <?php wp_reset_postdata(); ?>

			      <?php else : ?>

			      <?php endif; ?>
			    </div>
			  </div>
</div>
<?php
get_footer();
?>