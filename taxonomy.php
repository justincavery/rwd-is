<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<h1>Taxonomy</h1>
      <?php if ( have_posts() ) : ?>
        <h1 class="post__title"><?php printf( __( 'Tag Archives: %s'), single_tag_title( '', false ) ); ?></h1>

        <?php
          // Show an optional term description.
          $term_description = term_description();
          if ( ! empty( $term_description ) ) :
            printf( '<div class="taxonomy-description">%s</div>', $term_description );
          endif;
        ?>
      <?php
          query_posts('showposts=-1');
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );

          endwhile;
          // Previous/next page navigation.
          the_post_navigation();

        else :
          // If no content, include the "No posts found" template.
          get_template_part( 'content', 'none' );

        endif;
      ?>

<?php
get_footer();
