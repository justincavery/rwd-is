<?php
/*
YARPP Template: List
Description: This template returns the related posts as a comma-separated list.
Author: mitcho (Michael Yoshitaka Erlewine)
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
        <ul class="article-list"-->
<?php if (have_posts()):
	$postsArray = array();
	while (have_posts()) : the_post();
		$postsArray[] = '<li><div class="grid__column grid__column--one-third"><div class="section__column">
            <div class="resource resource--post">
              <div class="resource__image">
                <a href="'.get_permalink().'"><img src="http://placehold.it/800x460" alt="Alt Text"></a>
              </div>
              <div class="resource__content">
                <header class="resource__header">
                  <h3 class="resource__title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                  <div class="resource__meta">'.get_the_time( 'F jS, Y' ).' by <a href="'.get_the_field(news_website_link).'">'.get_the_field(news_article_author).'</a></div>
                </header>
                <div class="resource__body">
                  '.get_the_excerpt().'
                </div>
                <footer class="resource__footer">
                  <a href="'.get_permalink().'">Read more</a>
                </footer>
              </div>
            </div>
          </div></div></li>';

	endwhile;

echo implode(' '."\n",$postsArray); // print out a list of the related items, separated by commas


else:?>


          <div class="grid__column grid__column--one-third">
            //The stuff (hoping this isn't needed bucase of the flex grid)
        </div>





<p>No related posts.</p>
<?php endif; ?>
        </ul>
      </div>
      </div>
     </div>