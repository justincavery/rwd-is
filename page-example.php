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
				<img class="intro__image" src="/wp-content/uploads/2014/10/be-inspired.svg" alt="RWD Examples Icon" />
				<div class="intro__body">
					<p class="lead"><?php the_field(page_introduction);?></p>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
			      <?php

			        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			        $custom_args = array(
			            'post_type' => 'example',
			            'posts_per_page' => 10,
			            'orderby' => 'date',
			            'order' => 'DESC',
			            'paged' => $paged
			          );

			        $custom_query = new WP_Query( $custom_args ); ?>

			        <?php if ( $custom_query->have_posts() ) : ?>

			          <!-- the loop -->
			          <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

			    <div class="section section--two-col section--padded">
			    	<div class="grid__row">
			    		<header class="section__header">
			    			<h2 class="section__title"><a href="<?php echo get_permalink($post->ID) ?>"><?php the_title(); ?></a></h2>

			    			<p class="lead"><?php the_post_thumbnail_caption(); ?></p>

			    			<a href="<?php echo get_permalink($post->ID) ?>" class="btn btn--alt-cta">Read More</a>
			    		</header>
			    		<div class="section__body">
			    			<img src="<?php the_post_thumbnail_url( 'small'); ?>" srcset="<?php the_post_thumbnail_url( 'medium'); ?> 768w, <?php the_post_thumbnail_url( 'large'); ?> 1024w, <?php the_post_thumbnail_url( 'full'); ?> 1600w" alt="<?php the_post_thumbnail_caption(); ?>" />
			    		</div>
			    	</div>
			    </div>

			    <hr />
			  <?php endwhile; ?>
			      <!-- end of the loop -->
			      <div class="grid">
			          <div class="grid__row">
			              <div class="grid__column grid__column--full">
			      <!-- pagination here -->
			      <?php
			        if (function_exists(custom_pagination)) {
			          custom_pagination($custom_query->max_num_pages,"",$paged);
			        }
			      ?>
			            </div>
			        </div>
			      </div>
			        <?php wp_reset_postdata(); ?>

			      <?php else : ?>

			      <?php endif; ?>
</div>
<?php
get_footer();
?>