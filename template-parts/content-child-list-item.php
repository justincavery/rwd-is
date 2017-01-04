<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<li class="article-list">
  <div class="resource resource--basic">
        <a href="<?php the_permalink( $post->ID ); ?>" class="resource__link">
          <header class="resource__header">
          <h2 class="resource__title"><?php the_title();?></h2>
          </header>
          <div class="resource__body"><p><?php mb_strimwidth(the_field(resource_short_description), 0, 200, '...'); ?></div>
          <footer class="resource__footer">
              View Resources
          </footer>
        </a>
  </div>
</li>