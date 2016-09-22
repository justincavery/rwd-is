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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <h1>Responsive Web Design Is....</h1>
      <?php the_field(home_introduction_text); ?>
      <a href="/articles">Read latest articles</a>
      <a href="#">or learn more</a>
      <?php the_field(home_promo_box_1_title); ?>
      <?php the_field(home_promo_box_1_image); ?>
      <?php the_field(home_promo_box_1_description); ?>
      <?php the_field(home_promo_box_1_button_text); ?>
      <?php the_field(home_promo_box_1_button_url); ?>
      <?php the_field(home_promo_box_2_title); ?>
      <?php the_field(home_promo_box_2_image); ?>
      <?php the_field(home_promo_box_2_description); ?>
      <?php the_field(home_promo_box_2_button_text); ?>
      <?php the_field(home_promo_box_2_button_url); ?>
      <?php the_field(home_promo_box_3_title); ?>
      <?php the_field(home_promo_box_3_image); ?>
      <?php the_field(home_promo_box_3_description); ?>
      <?php the_field(home_promo_box_3_button_text); ?>
      <?php the_field(home_promo_box_3_button_url); ?>

<h2>Latest RWD News</h2>

<?php $query = new WP_Query( 'cat=39&posts_per_page=3' ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

 <div class="post">

  <?php if ( has_post_thumbnail() ) : ?>
    <img src="<?php the_post_thumbnail_url( 'medium'); ?>"/>
  <?php endif; ?>
 <!-- Display the Title as a link to the Post's permalink. -->
 <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 <small><?php the_time( 'F jS, Y' ); ?> by <a href="<?php the_field(news_website_link); ?>"><?php the_field(news_article_author); ?></a></small>

  <div class="entry">
      <?php the_content(); ?>
  </div>
<a href="?php the_permalink() ?>">Read More</a>
  <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_tags( '', ', ' ); ?></p>
 </div> <!-- closes the first div box -->

 <?php endwhile;
 wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>




<h2>Podcasts</h2>
<?php
$newqueryObject = new WP_Query(array(
  'post_type' => 'podcasts',
  'order' => 'DESC',
  'posts_per_page' => '4'
));
// The Loop!
if ($newqueryObject->have_posts()) {
    ?>
    <ul>
  <?php
  while ($newqueryObject->have_posts()) {
      $newqueryObject->the_post();
      ?>
      <li>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <date><?php the_time('F jS, Y'); ?></date>
            <?php the_excerpt(); ?>
      <?php wp_reset_postdata(); ?>
</li>
  <?php }?>
</ul>
  <?php }?>
<a href="/podcasts">View all episodes</a>


<h2>Articles</h2>
<?php
$newqueryObject = new WP_Query(array(
  'post_type' => 'article',
  'order' => 'DESC',
  'posts_per_page' => '3'
));
// The Loop!
if ($newqueryObject->have_posts()) {
    ?>
    <ul>
  <?php
  while ($newqueryObject->have_posts()) {
      $newqueryObject->the_post();
      ?>
      <li>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <date><?php the_time('F jS, Y'); ?></date>
            <?php the_excerpt(); ?>
      <?php wp_reset_postdata(); ?>
</li>
  <?php }?>
</ul>
  <?php }?>
<a href="/articles">View more articles</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>