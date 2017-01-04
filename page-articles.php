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
			      $the_query = new WP_Query( 'post_type=article&posts_per_page=-1&orderby=date&order=DESC' ); ?>

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
			    	      <a href="<?php the_permalink(); ?>">Read more</a>
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