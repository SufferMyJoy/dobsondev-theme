<?php
/**
 * The loop that displays all posts.
 *
 * This can be overridden in child themes with loop-archive.php.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

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

?>