<?php
/*
YARPP Template: Posts
Description: This template is badass.
Author: Justin Avery
*/
?>
<div class="section grid">
      <div class="grid__row">
        <div class="grid__column grid__column--full">
          <div class="section__column">
            <header class="section__header">
              <h2 class="section-heading"><span class="icon icon--articles"></span> Related News</h2>
            </header>
          </div>
        </div>
      </div>

<div class="grid__row">
  <div class="grid__column grid__column--full">
        <ul class="article-list">
<?php if (have_posts()): ?>

      <?php while (have_posts()) : the_post(); ?>
        <li><div class="grid__column grid__column--one-third"><div class="section__column">
                    <div class="resource resource--post">
                      <div class="resource__image">
                        <a href="<?php the_permalink()?>">
                          <?php
                          if ( has_post_thumbnail() ) {
                              the_post_thumbnail('post-standard');
                          }
                          else {
                              echo '<img src="/wp-content/themes/rwd-is/no-image.png" alt="Image placeholder" />';
                          }
                          ?>
                        </a>
                      </div>
                      <div class="resource__content">
                        <header class="resource__header">
                          <h3 class="resource__title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                          <div class="resource__meta"><?php the_time( 'F jS, Y' )?> by <a href="<?php the_field(news_website_link)?>"><?php the_field(news_article_author)?></a></div>
                        </header>
                        <div class="resource__body">
                          <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        <footer class="resource__footer">
                          <a href="<?php the_permalink()?>">Read more</a>
                        </footer>
                      </div>
                    </div>
                  </div></div></li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
        <!--.newsFeed--></div>
    <!--.catPostWrapper--></div>
<?php else:?>

<p>No related stories.</p>
<?php endif; ?>
   </ul>
 </div>
 </div>
</div>