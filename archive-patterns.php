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

      <?php
      // the query
      $the_query = new WP_Query( 'post_type=patterns&posts_per_page=100&orderby=date&order=DESC' ); ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <!-- pagination here -->

<ul class="flex-grid article-list">

  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<li>
  <div class="resource resource--media">
      <a href="<?php the_permalink(); ?>" class="resource__link">
          <header class="resource__header">
              <h3 class="resource__title"><?php the_title(); ?></h3>
          </header>
          <div class="resource__body">
              <?php
              the_post_thumbnail( 'medium', ['sizes' => '(min-width:64em) 33vw,(min-width:48em) 50vw, 100vw']);
              ?>
          </div>
      </a>
  </div>
</li>
  <?php endwhile; ?>
  <!-- end of the loop -->
</ul>
        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

      <?php else : ?>

      <?php endif; ?>

<?php
get_footer();
?>