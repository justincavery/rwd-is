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

			get_template_part( 'template-parts/content-podcast', get_post_format() );

			the_post_navigation( array(
			            'prev_text'                  => __( 'Previous Podcast: %title' ),
			            'next_text'                  => __( 'Next Podcast: %title' ),
			     			  'screen_reader_text' => __( ' ' ),
			        ) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		  <?php related_posts(array(
		   'template' => 'yarpp-template-podcasts.php',
		   'post_type' => array('podcast'),
		   'exclude' => array(39)
		   ), $ID, true);?>


<?php
get_footer();
