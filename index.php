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

<div class="content content--divider">
        <div class="section section--highlighted section--no-padding">
            <div class="intro">
            	<h1>Responsive Design News</h1>
                <div class="intro__body">
                    <p class="lead">Keep up with the latest news and developments around responsive design and the new direcitons that web designa and development are taking.</p>
                </div>
            </div>
        </div>


<div class="entry grid">
  <div class="grid__row">
 		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'news-listing' );

			endwhile;

	//		the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
		</div>
<?php		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => __( 'Back', 'textdomain' ),
			'next_text' => __( 'Onward', 'textdomain' ),
		) );?>
		</div>
<?php
get_footer();
