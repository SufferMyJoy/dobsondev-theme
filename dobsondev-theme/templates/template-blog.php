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

$args = array(
   'posts_per_page'   => -1,
   'offset'           => 0,
   'category'         => '',
   'orderby'          => 'post_date',
   'order'            => 'DESC',
   'include'          => '',
   'exclude'          => '',
   'meta_key'         => '',
   'meta_value'       => '',
   'post_type'        => 'post',
   'post_mime_type'   => '',
   'post_parent'      => '',
   'post_status'      => 'publish',
   'suppress_filters' => true );
$posts = get_posts( $args );

if ($posts) {
   foreach ( $posts as $post ) {
      setup_postdata($post);
      echo '<div class="blog-post-title">';
      echo '<a href="' . get_the_permalink() . '">';
      the_title();
      echo '</a>';
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