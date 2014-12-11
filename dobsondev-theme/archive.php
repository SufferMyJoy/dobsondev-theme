<?php
/**
 * The template for displaying all posts.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');
?>

<div id="container">

  <h1> <?php _e( 'Archives' ); ?> </h1>

  <div id="content" role="main">

    <?php the_post(); ?>

    <h2>Archives by Month:</h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <h2>Archives by Subject:</h2>
    <ul>
      <?php wp_list_categories(); ?>
    </ul>

  </div><!-- #content -->
</div><!-- #container -->

<?php
do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();
?>