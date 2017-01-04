<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RWD.IS
 */

get_header(); ?>
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-example', get_post_format() );

      the_post_navigation( array(
                  'prev_text'                  => __( 'Previous Example: %title' ),
                  'next_text'                  => __( 'Next Example: %title' ),
                  'in_same_term'               => false,
                  'taxonomy'                   => __( 'post_tag' ),
                  'screen_reader_text' => __( 'Other examples' ),
              ) );

		endwhile; // End of the loop.
		?>
<?php
get_footer();
