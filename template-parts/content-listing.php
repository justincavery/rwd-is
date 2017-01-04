<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<div class="content content--divider">
        <div class="section section--highlighted section--no-padding">
            <div class="intro">
                <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail('thumbnail', array('class' => 'intro__image')); ?>
                    <?php } else { ?>
                        <!--  What, no image? -->
                    <?php }?>
                <div class="intro__body">
                    <?php the_field(page_introduction);?>
                </div>
            </div>
        </div>


<div class="entry grid">
  <div class="grid__row">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if(the_content() != ''){ ?>
            <div class="post__body">
             <?php the_content(); ?>
            </div>
     <?php }  ?>
       <div class="flex-grid">
		<?php
    $args = array(
        'post_parent' => $post->ID,
        'post_type' => 'page',
        'orderby' => 'title',
        'posts_per_page' => -1,
        'order' => 'ASC'    );

    $child_query = new WP_Query( $args );
    ?>



    <?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
        <div class="resource resource--basic">
          <a href="<?php the_permalink(); ?>" class="resource__link">
            <header class="resource__header">
            <h2 class="resource__title"><?php the_title(); ?></h2>
            </header>
            <div class="resource__body">
            <?php if (the_field(page_introduction) != 0 ) {
            the_field(page_introduction);
            $excerpt = wp_trim_words( get_field('page-introduction' ), $num_characters = 200, $more = '...' );
          }
          ?>
        </div>
        <footer class="resource__footer">
            Read More
        </footer>
    </a>
  </div>

    <?php endwhile; ?>

    <?php
    wp_reset_postdata();?>
	</div><!-- end grid -->

</article><!-- #post-## -->
</div>
</div>
</div>