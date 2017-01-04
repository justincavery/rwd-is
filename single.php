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

			get_template_part( 'template-parts/content', get_post_format() );

//			the_post_navigation();

		endwhile; // End of the loop.
		?>
		<?php related_posts();?>

<?php
get_footer();
