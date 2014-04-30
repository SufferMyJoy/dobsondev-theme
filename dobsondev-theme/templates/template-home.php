<?php /* Template Name: Home Page */ ?>
<?php
/**
 * The template for displaying the home page.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');

if ( have_posts() ) while ( have_posts() ) : the_post();

  echo '<div id="home-page-content">';
  echo '<div class="entry-content">';
  the_content();
  echo '<div class="clear"></div>';
  echo '</div><!-- ENTRY CONTENT -->';
  echo '</div><!-- END POST -->';

endwhile; // end of the loop.

do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();
?>