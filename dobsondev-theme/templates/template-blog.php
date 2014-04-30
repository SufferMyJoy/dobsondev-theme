<?php /* Template Name: Blog Page */ ?>
<?php
/**
 * The template for displaying all posts.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');

$args = array( 'numberposts' => -1);
$posts= get_posts( $args );
if ($posts) {
   foreach ( $posts as $post ) {
      setup_postdata($post);
      echo '<div class="blog-post-title">';
      the_title();
      echo '</div><!-- END BLOG POST TITLE -->';
      echo '<div class="blog-post-date">';
      the_date();
      echo '</div><!-- END BLOG POST DATE -->';
      echo '<div class="blog-post-excerpt">';
      the_excerpt();
      echo '<hr />';
      echo '</div><!-- END BLOG POST EXCERPT -->';
   }
}

do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();
?>