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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			      <?php
			      // the query
			      $the_query = new WP_Query( 'post_type=example&posts_per_page=-1&orderby=title&order=ASC' ); ?>

			      <?php if ( $the_query->have_posts() ) : ?>

			        <!-- pagination here -->

			<ul>

			  <!-- the loop -->
			  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			    <li>

			      <a href="<?php echo get_permalink($post->ID) ?>">
			          <h2><?php the_title(); ?></h2>
			      </a>
			    </li>
			  <?php endwhile; ?>
			  <!-- end of the loop -->
			</ul>
			        <!-- pagination here -->

			        <?php wp_reset_postdata(); ?>

			      <?php else : ?>

			      <?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

?>