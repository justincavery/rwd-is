<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWD.IS
 */

?>

<div class="post">
   <header class="post__header">
            <?php the_title( '<h2 class="post__title">', '</h2>' ); ?>
            <p class="post__meta">By <strong><?php the_author(); ?></strong>, <?php the_time( 'j F Y' ); ?> posted in <a href="#"><?php the_category( ' ' ); ?></a></p>
        </header>
        <article id="post-<?php the_ID(); ?>" class="post__body">
            <?php the_excerpt();?>
        <p><a class="btn" href="<?php the_permalink();?>">Read more</a></p>

</article><!-- #post-## -->
</div>