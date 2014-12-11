<?php
/**
 * The template for displaying 404 page (page not found).
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');
?>

  <div id="404">
    <h1><?php _e( '404' ); ?></h1>
    <hr />

    <div class="entry-content">
      <p>
        <?php _e( 'Your Page is in another Castle... Sorry about that...' ); ?>
      </p>
      <div class="clear"></div>
    </div><!-- ENTRY CONTENT -->
  </div><!-- END POST -->

<?php
do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();