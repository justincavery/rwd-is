<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RWD.IS
 */

get_header(); ?>

<div class="content">

		<div class="post">
			<header class="post__header">
				<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
				<p class="post__meta">Last updated on  <?php the_modified_date( 'j F Y' ); ?></p>
			</header>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-resource', get_post_format() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</div>

      <?php
  	          $sites = get_posts(array(
  	            'post_type' => 'example',
  	            'meta_query' => array(
  	              array(
  	                'key' => 'example_site_plugins', // name of custom field
  	                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
  	                'compare' => 'LIKE'
  	              )
  	            )
  	          ));
  	          ?>
  	          <?php if( $sites ): ?>
  	          <div class="section section--highlighted grid">
  	            <div class="grid__row">
  	              <div class="grid__column grid__column--full">
  	                <div class="section__column">
  	                  <header class="section__header">
  	                    <h2 class="section-heading"><span class="icon icon--articles"></span> Sites that use <?php the_title(); ?></h2>
  	                  </header>
  	                </div>
  	              </div>
  	            </div>
  	            <ul class="grid__row flex-grid article-list">
  	            <?php foreach( $sites as $site ): ?>
                <li>
  	                <div class="section__column">
  	                  <div class="resource resource--post">
  	                    <div class="resource__image">
  	                      <a href="<?php echo get_permalink( $site->ID ); ?>"><img  src=""
  	            srcset="<?php echo get_the_post_thumbnail_url( $site->ID, 'medium'); ?> 300w,
  	            <?php echo get_the_post_thumbnail_url( $site->ID, 'large'); ?> 768w,
  	            <?php echo get_the_post_thumbnail_url( $site->ID, 'full'); ?> 1200w"
  	            size="(min-width:64em) 33vw,
  	                  (min-width:48em) 50vw,
  	                  100vw"
  	            alt="<?php echo get_the_post_thumbnail_caption( $site->ID ); ?>" /></a>
  	                    </div>
  	                    <div class="resource__content">
  	                      <header class="resource__header">
  	                        <h3 class="resource__title"><a href="<?php echo get_permalink( $site->ID ); ?>"><?php echo get_the_title( $site->ID ); ?></a></h3>
  	                        <date class="resource__meta"><?php echo get_the_time( $site->ID, 'F jS, Y'); ?></date>
  	                      </header>
  	                      <footer class="resource__footer">
  	                        <a href="<?php echo get_the_permalink( $site->ID ); ?>">View Site</a>
  	                      </footer>
  	                    </div>
  	                  </div>
  	                </div>
                </li>
  	            <?php endforeach; ?>
  	            </ul>
              </div>
  	          <?php endif; ?>
  						<?php
  		            $example_plugins = get_posts(array(
  		              'post_type' => 'example',
                    'posts_per_page' => '3',
  		              'meta_query' => array(
  		                array(
  		                  'key' => 'example_site_frameworks', // name of custom field
  		                  'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
  		                  'compare' => 'LIKE'
  		                )
  		              )
  		            ));

  		            ?>

  		            <?php if( $example_plugins ): ?>
  		              <div class="section section--highlighted grid">
                      <div class="grid__row">
                        <div class="grid__column grid__column--full">
                          <div class="section__column">
                            <header class="section__header">
                              <h2 class="section-heading"><span class="icon icon--articles"></span>Sites that use <?php the_title(); ?></h2>
                            </header>
                          </div>
                        </div>
                      </div>
                      <ul class="grid__row flex-grid article-list">
  		              <?php foreach( $example_plugins as $example_plugin ): ?>
  		                              <li>
                                        <div class="section__column">
                                          <div class="resource resource--post">
                                            <div class="resource__image">
                                              <a href="<?php echo get_permalink( $example_plugin->ID  ); ?>"><img  src=""
                                    srcset="<?php echo get_the_post_thumbnail_url( $example_plugin->ID , 'medium'); ?> 300w,
                                    <?php echo get_the_post_thumbnail_url( $example_plugin->ID , 'large'); ?> 768w,
                                    <?php echo get_the_post_thumbnail_url( $example_plugin->ID , 'full'); ?> 1200w"
                                    size="(min-width:64em) 33vw,
                                          (min-width:48em) 50vw,
                                          100vw"
                                    alt="<?php echo get_the_post_thumbnail_caption( $site->ID ); ?>" /></a>
                                            </div>
                                            <div class="resource__content">
                                              <header class="resource__header">
                                                <h3 class="resource__title"><a href="<?php echo get_permalink( $example_plugin->ID  ); ?>"><?php echo get_the_title( $example_plugin->ID  ); ?></a></h3>
                                                <date class="resource__meta"><?php echo get_the_time( $example_plugin->ID , 'F jS, Y'); ?></date>
                                              </header>
                                              <footer class="resource__footer">
                                                <a href="<?php echo get_the_permalink( $example_plugin->ID  ); ?>">Views Site <?php echo get_the_title( $example_plugin->ID ); ?></a>
                                              </footer>
                                            </div>
                                          </div>
                                        </div>
                                    </li>
  		              <?php endforeach; ?>
  		              </ul>
                  </div>
  		            <?php endif; ?>

                   <?php related_posts(array(
                    'template' => 'yarpp-template-resources.php',
                    'post_type' => array('resource'),
                    'exclude' => array(39),
                    'weight' => array(
                      'tax' => array(
                        'resource_tags' => 2))
                    ), $ID, true);?>
</div>
<?php
get_footer();
