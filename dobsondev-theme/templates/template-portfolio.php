<?php /* Template Name: Portfolio Page */ ?>
<?php
/**
 * The template for displaying all posts.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

get_header();
do_action('dobsondev_before_content');
get_template_part( 'loop', 'page' );
do_action('dobsondev_menu');
do_action('dobsondev_after_content');
get_footer();
?>