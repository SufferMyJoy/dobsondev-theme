<?php
/**
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 *
 * Layout Hooks:
 *
 * dobsondev_header         // header tag and logo/header text
 * dobsondev_before_content // Opening content wrapper
 * dobsondev_menu           // Creates the menu
 * dobsondev_after_content  // Closing content wrapper
 * dobsondev_footer         // Footer
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */

/*-----------------------------------------------------------------------------------*/
/* Register Scripts
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_scripts)) {
  function dobsondev_scripts() {
    wp_enqueue_style( 'dobsondev-style', get_stylesheet_uri() );
    wp_enqueue_script("jquery");
    wp_enqueue_script( 'mobile-menu-script', get_template_directory_uri() . '/js/mobile-menu.js');
  }
  add_action( 'wp_enqueue_scripts', 'dobsondev_scripts', 1);
}


/*-----------------------------------------------------------------------------------*/
/* Creates the DobsonDev Sidebar
/*-----------------------------------------------------------------------------------*/
function dobsondev_create_sidebar() {
  register_sidebar( array(
    'name' => 'DobsonDev Sidebar',
    'id' => 'dobsondev_theme_sidebar',
    'before_widget' => '<div id="widget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3 id="widget-title">',
    'after_title' => '</h3>')
  );
}
add_action( 'widgets_init', 'dobsondev_create_sidebar' );


/*-----------------------------------------------------------------------------------*/
/* Header Start - Creates Header
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_header_start)) {
  function dobsondev_header_start() {
    echo '<div id="header">';
  }
  add_action( 'dobsondev_header', 'dobsondev_header_start', 1 );
}


/*-----------------------------------------------------------------------------------*/
/* Header Logo - Creates Header Logo
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_header_logo)) {
  function dobsondev_header_logo() {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    $options = get_option($option_name);

    if (!empty($options['logo_uploader'])) {
      echo '<a id="site-logo" href="' . get_site_url() . '">';
      echo '<img src="' . $options['logo_uploader'] . '" alt="' . get_bloginfo( 'name' ) . '"/>';
      echo '</a>';
    }
    else {
      echo '<a id="site-logo" href="' . get_site_url() . '">';
      echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
      echo '<div class="clear"></div>';
      echo '</a>';
    }
  }
  add_action( 'dobsondev_header', 'dobsondev_header_logo', 2 );
}


/*-----------------------------------------------------------------------------------*/
/* Mobile Menu - Creates the Mobile version of the Menu
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_header_mobile_menu)) {
  // Registers the mobile menu
  register_nav_menu( 'mobile', 'Mobile Menu' );

  function dobsondev_header_mobile_menu() {
    echo '<div id="mobile-menu-wrapper">';
    echo '<h2 id="toggle-mobile-menu" class="hidden">Show Menu (+)</h2>';
    wp_nav_menu( array( 'container_class' => 'mobile-menu', 'theme_location' => 'mobile' ));
    echo '</div><!-- END MOBILE MENU -->';
  }
  add_action( 'dobsondev_header', 'dobsondev_header_mobile_menu', 3 );
}


/*-----------------------------------------------------------------------------------*/
/* Header End - Ends Header
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_header_end)) {
  function dobsondev_header_end() {
    echo '</div><!-- END HEADER -->';
    echo '<div class="clear"></div>';
  }
  add_action( 'dobsondev_header', 'dobsondev_header_end', 4 );
}


/*-----------------------------------------------------------------------------------*/
/* Before Content - Creates Content Wrapper
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_content_wrap_start)) {
  function dobsondev_content_wrap_start() {
    echo '<a id="top"></a>';
    echo '<div id="page-wrap">';
    echo '<div id="content-wrap">';
  }
  add_action( 'dobsondev_before_content', 'dobsondev_content_wrap_start', 1 );
}


/*-----------------------------------------------------------------------------------*/
/* Menu - Creates Primary WordPress Menu for this Theme
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dosondev_menu)) {
  // Registers the primary menu
  register_nav_menu( 'primary', 'Primary Menu' );

  function dobsondev_menu() {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    $options = get_option($option_name);

    echo '</div><!-- END CONTENT WRAP -->';
    echo '<div id="main-menu">';
    wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'primary' ));
    echo '<div id="social-media">';
    if (!empty($options['twitter_url'])) {
      echo '<a href="' . $options['twitter_url'] . '">';
      echo '<img class="social-icon" src="' . get_template_directory_uri() . '/resources/twitter.png" />';
      echo '</a>';
    }
    if (!empty($options['linkedin_url'])) {
      echo '<a href="' . $options['linkedin_url'] . '">';
      echo '<img class="social-icon" src="' . get_template_directory_uri() . '/resources/linkedin.png" />';
      echo '</a>';
    }
    if (!empty($options['github_url'])) {
      echo '<a href="' . $options['github_url'] . '">';
      echo '<img class="social-icon" src="' . get_template_directory_uri() . '/resources/github.png" />';
      echo '</a>';
    }
    echo '</div><!-- END SOCIAL MEDIA -->';
    dynamic_sidebar( 'dobsondev_theme_sidebar' );
    echo '</div><!-- END MAIN MENU -->';
  }
  add_action( 'dobsondev_menu', 'dobsondev_menu', 1 );
}


/*-----------------------------------------------------------------------------------*/
/* After Content - Ends Content Wrapper
/*-----------------------------------------------------------------------------------*/

if (!function_exists(dobsondev_content_wrap_end)) {
  function dobsondev_content_wrap_end() {
    echo '</div><!-- END PAGE WRAP -->';
  }
  add_action( 'dobsondev_after_content', 'dobsondev_content_wrap_end', 2 );
}


/*-----------------------------------------------------------------------------------*/
/* Modifies the Excerpt More Tag
/*-----------------------------------------------------------------------------------*/

function new_excerpt_more($more) {
  global $post;
  return '&nbsp; <a class="moretag" href="'. get_permalink($post->ID) . '">[Read More...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*-----------------------------------------------------------------------------------*/
/* Options Framework Options Panel
/*-----------------------------------------------------------------------------------*/

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/options-framework/' );
require_once dirname( __FILE__ ) . '/options-framework/options-framework.php';

// Overwrites the default filter for the textarea option to allow scripts (for analytics)
function optionscheck_change_santiziation() {
  remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
  add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
  global $allowedposttags;
  $custom_allowedtags["embed"] = array(
    "src" => array(),
    "type" => array(),
    "allowfullscreen" => array(),
    "allowscriptaccess" => array(),
    "height" => array(),
    "width" => array()
  );
  $custom_allowedtags["script"] = array();
  $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
  $output = wp_kses( $input, $custom_allowedtags);
  return $output;
}
add_action('admin_init','optionscheck_change_santiziation', 100);

?>