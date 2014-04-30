<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title"><?php the_title(); ?></h2>

    <div class="entry-content">
      <?php the_content(); ?>
      <div class="clear"></div>
    </div><!-- ENTRY CONTENT -->
  </div><!-- END POST -->

<?php endwhile; // end of the loop. ?>