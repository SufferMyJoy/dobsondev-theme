<?php
/**
 * Header for DobsonDev theme.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */
?>

<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

<title>
  <?php
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    $options = get_option($option_name);

    if ( is_front_page() ) {
      // The Home Page Title
      echo get_bloginfo('name') . ' | ' . $options['home_page_description'];
    } else if ( is_page_template( 'templates/template-blog.php' ) ) {
      // The Blog Page Title
      echo get_bloginfo('name');
      wp_title('');
      echo ' | ' . $options['blog_description'];
    } else if ( is_page_template( 'templates/template-portfolio.php' ) ) {
      // The Portfolio Page Title
      echo get_bloginfo('name');
      wp_title('');
      echo ' | ' . $options['portfolio_description'];
    } else {
      // All Other Pages Title
      wp_title('');
      echo ' | ' . get_bloginfo('name');
    }
  ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php
  do_action('dobsondev_header');
?>