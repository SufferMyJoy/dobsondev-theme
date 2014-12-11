<?php
/**
 * The template for displaying search results.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');
?>

<div class="entry-content">
   <h1> <?php _e( 'Search Results for "' . get_search_query() . '"' ); ?> </h1>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <div id="post-<?php the_ID(); ?>" class="search-results">

      <a class="search-results-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <div class="search-results-date"> <?php the_date(); ?> </div>
      <div class="search-results-excerpt"><?php the_excerpt(); ?> </div>
      <div class="clear"></div>

   </div><!-- END POST -->

<?php endwhile; // end of the loop. ?>

</div><!-- ENTRY CONTENT -->

<?php
do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();
?>