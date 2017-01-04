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

$terms = get_terms( array('taxonomy' => 'resource_tags', 'hide_empty' => true, ) );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    echo '<ul class="flex-grid article-list">';
    foreach ( $terms as $term ) {
        echo '<li><div class="resource resource--basic">
        <a href="' . $term->slug . '" class="resource__link">
          <header class="resource__header">
          <h2 class="resource__title">' . $term->name . '</h2>
          </header>
          <div class="resource__body"><p>' . mb_strimwidth($term->description, 0, 200, '...') . '</div>
      <footer class="resource__footer">
          View Resources
      </footer>
  </a>
</div></li>';
    }
    echo '</ul>';
}

?>
<?php
get_footer();
?>

