<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RWD.IS
 */

get_header(); ?>
<div class="content">
	<div class="entry grid">
		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
?>
			<div class="grid">
			    <div class="grid__row">
			        <div class="grid__column grid__column--full">
			            <div class="example-content">
<?php
			the_posts_navigation( array(
			            'prev_text'                  => __( 'Next page of results' ),
			            'next_text'                  => __( 'Previous page of results' ),
			            'screen_reader_text' => __( 'Additional Search Results' ),
			        ) ); ?>
			          </div>
			      </div>
			  </div>
			</div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
</div>
</div>

<?php
get_footer();
