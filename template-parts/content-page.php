<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>
<div class="entry grid">
  <div class="grid__row">
    <div class="grid__column  grid__column--five-sixths">
      <article id="post-<?php the_ID(); ?>" class="entry__body">
       <h1 class="page-header__title"><?php the_title()?></h1>
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwd-is' ),
				'after'  => '</div>',
			) );
		?>
</article><!-- #post-## -->

</div>

<div class="grid__column grid__column--one-sixth">
          <aside class="entry__sidebar">
            <nav class="nav nav--sidebar-menu" data-app="nav--sidebar-menu">
              <h3 class="nav__title"><?php if ( 0 == $post->post_parent ) {
                  the_title();
              } else {
                  $parents = get_post_ancestors( $post->ID );
                  echo apply_filters( "the_title", get_the_title( end ( $parents ) ) );
              }?></h3>
              <?php if(is_page()){
              $ancestors = get_post_ancestors($post);

              if (count($ancestors) == 0) {
                  $children = wp_list_pages("sort_column=post_date&title_li=&child_of=".$post->ID."&echo=0&depth=1");
                   // echo 'test0';                   echo get_the_title( $ID );
              }elseif (count($ancestors) == 1) {
                  $parent = $ancestors[0];
                  $children = wp_list_pages("sort_column=menu_order&title_li=&child_of=" .$parent. "&echo=0");
                  //echo 'test1';
               }elseif (count($ancestors) == 2) {
                  $parent = $ancestors[1];
                  $children = wp_list_pages("sort_column=menu_order&title_li=&child_of=" .$parent. "&echo=0");
                  //echo 'test2';
               }elseif (count($ancestors) == 3) {
                  $parent = $ancestors[2];
                  $children = wp_list_pages("sort_column=menu_order&title_li=&child_of=" . $parent. "&echo=0");
                  //echo 'test3';
              // }elseif (count($ancestors) == 4) {
              //     $parent = $ancestors[3];
              //     $children = wp_list_pages("sort_column=menu_order&title_li=&child_of=" . $parent . "&echo=0");
              //     //echo 'test4';
              }
                ?>

                  <?php if($children){ ?>
                  <ul class="nav__items">
                  <?php echo $children; ?>
                  </ul>
                  <?php }  }?>
            </nav>
          </aside>
        </div>
      </div>
      <?php related_posts(array(
        'template' => 'yarpp-template-resources.php',
        'post_type' => array('resource'), // return only resource post types
        'exclude' => array(39), // exclude 39? Exclude any news posts
        'weight' => array( // how are you going to weight the related items?
         'tax' => array( // weight by taxonomy
          'resource_tags' => 2)) // and weight by the "tag" taxonomy
        ), $ID, true);?>

        <?php related_posts();?>
    </div>
</div>

