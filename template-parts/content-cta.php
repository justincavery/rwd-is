<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>
      <article id="post-<?php the_ID(); ?>" class="entry__body">
       <h1 class="page-header__title"><?php the_title()?></h1>
		<?php
			the_content();
      ?>

      <?php the_field(page_cta);?>

</article><!-- #post-## -->