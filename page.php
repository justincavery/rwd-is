<?php
/**
 * The template for displaying all pages.
 *
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

			if( is_page( array( 89, 87, 85, 1464, 1519 ) ) ){
			  get_template_part( 'template-parts/content', 'listing' );

			  } else {
			     //none of the page about us, contact or management is in view
				get_template_part( 'template-parts/content', 'page' );
}
				// If comments are open or we have at least one comment, load up the comment template.
		//		if ( comments_open() || get_comments_number() ) :
		//			comments_template();
		//		endif;

			endwhile; // End of the loop.
			?>

	</div><!-- #primary -->

<?php
get_footer();
// get_sidebar();
?>