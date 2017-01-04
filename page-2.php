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
<div class="site-header site-header--expanded">
  <div class="welcome">
    <header class="welcome__header">
      <h1 class="welcome__logo logo">Responsive Design</h1>
    </header>
    <div class="welcome__body">
      <h2 class="welcome__title"><span>Responsive</span> Web Design Is&hellip;</h2>
      <div class="welcome__lead">
          <?php the_field(home_introduction_text); ?>
                <a href="/articles" class="btn btn--cta btn--inverted">Read Latest Articles</a>
              </div>
            </div>
          </div>

          <div class="learn-more">
            Or Learn More <span class="icon icon--down"></span>
          </div>

            <ul class="section-summaries">
              <li class="section-summaries__item">
                <img class="section-summaries__image" src="<?php the_field(home_promo_box_1_image); ?>" alt=" ">

                <div class="section-summaries__container">
                  <header class="section-summaries__header">
                    <h2 class="section-summaries__title"><?php the_field(home_promo_box_1_title); ?></h2>
                  </header>
                  <div class="section-summaries__body">
                    <?php the_field(home_promo_box_1_description); ?>
                  </div>
                  <footer class="section-summaries__footer">
                    <a class="btn btn--cta" href="<?php the_field(home_promo_box_1_button_url); ?>"><?php the_field(home_promo_box_1_button_text); ?></a>
                  </footer>
                </div>
              </li>
              <li class="section-summaries__item">
                <img class="section-summaries__image" src="<?php the_field(home_promo_box_2_image); ?>" alt=" ">

                <div class="section-summaries__container">
                  <header class="section-summaries__header">
                    <h2 class="section-summaries__title"><?php the_field(home_promo_box_2_title); ?></h2>
                  </header>
                  <div class="section-summaries__body">
                    <?php the_field(home_promo_box_2_description); ?>
                  </div>
                  <footer class="section-summaries__footer">
                    <a href="<?php the_field(home_promo_box_2_button_url); ?>" class="btn btn--cta"><?php the_field(home_promo_box_2_button_text); ?></a>
                  </footer>
                </div>
              </li>
              <li class="section-summaries__item">
                <img class="section-summaries__image" src="<?php the_field(home_promo_box_3_image); ?>" alt=" ">

                <div class="section-summaries__container">
                  <header class="section-summaries__header">
                    <h2 class="section-summaries__title"><?php the_field(home_promo_box_3_title); ?></h2>
                  </header>
                  <div class="section-summaries__body">
                    <?php the_field(home_promo_box_3_description); ?>
                  </div>
                  <footer class="section-summaries__footer">
                    <a href="<?php the_field(home_promo_box_3_button_url); ?>" class="btn btn--cta"><?php the_field(home_promo_box_3_button_text); ?></a>
                  </footer>
                </div>
              </li>
            </ul>
          </div>

          <div class="content">
            <div class="section grid">
              <div class="grid__row">
                <!-- Begin Latest News -->
                <div class="grid__column grid__column--two-thirds">
                  <div class="section__column section__column--right-divider">
                    <header class="section__header">
                      <h2 class="section-heading"><span class="icon icon--news"></span> Latest RWD News</h2>
                    </header>
<?php $query = new WP_Query( 'cat=39&posts_per_page=4' ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

 <div class="resource resource--post resource--wide">

  <?php if ( has_post_thumbnail() ) : ?>
  <div class="resource__image">
    <a href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'medium', ['sizes' => '(min-width:64em) 33vw,(min-width:48em) 50vw,(min-width:37.5em) 100vw, 100vw']);
      ?>
    </a>


  </div>
  <?php endif; ?>
 <!-- Display the Title as a link to the Post's permalink. -->
 <div class="resource__content">
               <header class="resource__header">
                 <h3 class="resource__title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                   <div class="resource__meta"><?php the_time( 'F jS, Y' ); ?> by <a href="<?php the_field(news_website_link); ?>"><?php the_field(news_article_author); ?></a></div>
                 </header>

                 <div class="resource__body">
                   <?php the_excerpt(); ?>
                 </div>
               <footer class="resource__footer">
                 <a href="<?php the_permalink() ?>">Read more</a>
               </footer>
             </div>
  </div>
 <?php endwhile;
 wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
     <footer class="section__footer">
       <a href="/news" class="btn">View All News</a>
     </footer>
   </div>
 </div>
 <!-- End Latest News -->

 <!-- Begin Podcasts -->
 <div class="grid__column grid__column--one-third">
   <div class="section__column section__column--left-divider">
     <header class="section__header">
       <h2 class="section-heading"><span class="icon icon--podcast"></span> Fresh From The Podcast</h2>
     </header>
<?php
$newqueryObject = new WP_Query(array(
  'post_type' => 'podcasts',
  'order' => 'DESC',
  'posts_per_page' => '3'
));
// The Loop!
if ($newqueryObject->have_posts()) {
    ?>
<!--     <ul>
 -->  <?php
  while ($newqueryObject->have_posts()) {
      $newqueryObject->the_post();
      ?>
      <div class="resource resource--podcast resource--small">
        <header class="resource__header">
          <div class="podcast-banner">
            <a class="podcast-banner__link" href="<?php the_permalink(); ?>">
              <div class="podcast-banner__image" style="background-image: url(<?php the_post_thumbnail_url( 'large'); ?>);"></div>
              <div class="podcast-banner__body">
                <h3 class="podcast-banner__title">Responsive<br/>Design<br/>Podcast <small>with <?php $row = 1; if(get_field('podcast_guests')): ?><?php while(has_sub_field('podcast_guests')): ?>
  <?php if($row == 1) { the_sub_field('podcast_guest_name'); } ?><?php $row++; endwhile; ?><?php endif; ?></small></h3>
              </div>
            </a>
          </div>
          <h3 class="resource__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
          <div class="resource__meta"><?php the_time('F jS, Y'); ?></div>
        </header>
        <div class="resource__body">
          <?php the_excerpt(); ?>
        </div>
      </div>
      <?php wp_reset_postdata(); ?>
<!-- </li> -->
  <?php }?>
<!-- </ul>
 -->  <?php }?>
         <footer class="section__footer">
           <a href="/podcasts" class="btn">View All Episodes</a>
         </footer>
       </div>
     </div>
   </div>
 </div>
<!-- End Podcasts -->

<!-- Begin Latest Articles -->

<div class="section section--highlighted grid">
  <div class="grid__row">
    <div class="grid__column grid__column--full">
      <div class="section__column">
        <header class="section__header">
          <h2 class="section-heading"><span class="icon icon--articles"></span> Most Recent Articles</h2>
        </header>
      </div>
    </div>
  </div>
  <div class="grid__row">

<?php
$newqueryObject = new WP_Query(array(
  'post_type' => 'article',
  'order' => 'DESC',
  'posts_per_page' => '3'
));
// The Loop!
if ($newqueryObject->have_posts()) {
    ?>
 <?php
  while ($newqueryObject->have_posts()) {
      $newqueryObject->the_post();
      ?>
        <div class="grid__column grid__column--one-third">
          <div class="section__column">
            <div class="resource resource--post">
              <div class="resource__image">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'medium', ['sizes' => '(min-width:64em) 33vw,(min-width:48em) 50vw, 100vw']);
                ?></a>
              </div>
              <div class="resource__content">
                <header class="resource__header">
                  <h3 class="resource__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <date class="resource__meta"><?php the_time('F jS, Y'); ?></date>
                </header>
                <div class="resource__body">
                  <?php the_excerpt(); ?>
                </div>
                <footer class="resource__footer">
                  <a href="<?php the_permalink(); ?>">Read more</a>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>

  <?php }?>

  <?php }?>
            <footer class="section__footer">
              <a href="/articles" class="btn">View All Articles</a>
            </footer>
          </div>
<!--         </div>
      </div> -->

<?php get_footer(); ?>