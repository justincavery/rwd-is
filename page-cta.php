<?php
/**
 * The template for displaying all pages.
 *
  * Template Name: Call to Action - no nav
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

get_header(); ?>
<div class="content">
			<?php
			while ( have_posts() ) : the_post();


				get_template_part( 'template-parts/content', 'cta' );


			endwhile; // End of the loop.
			?>

	</div><!-- #primary -->

<?php
get_footer();
// get_sidebar();
?>