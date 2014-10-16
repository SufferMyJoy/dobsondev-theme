<?php
/**
 * The loop that displays a single post.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */
?>

<!-- For Facebook Share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- For Pocket Share -->
<script type="text/javascript">
!function(d,i) {
  if(!d.getElementById(i)){
    var j = d.createElement("script");
    j.id = i;
    j.src = "https://widgets.getpocket.com/v1/j/btn.js?v=1";
    var w = d.getElementById(i);
    d.body.appendChild(j);
  }
}(document,"pocket-btn-js");
</script>

<?php
  $post = get_post();
  $post_id = get_the_ID();
  setup_postdata($post);
  echo '<div style="display: none;">';
  echo get_the_post_thumbnail();
  echo '</div>';

  echo '<div id="post-title">';
  the_title();
  echo '</div>';
  echo '<div id="post-date">';
  the_date();
  echo '</div>';
  echo '<div id="post-content">';
  echo '<input type="hidden" id="hidden-post-id" value="' . $post_id . '" />';

  echo '<div id="post-social-share">';
     echo "<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-via=\"_AlexDobson\" data-url=\"" . wp_get_shortlink() . "\" data-counturl=\"" . curPageURL() . "\" data-lang=\"en\">Tweet</a>";
     echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"https://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>";
     echo "<br />";
     echo "<div style=\"padding-bottom: 5px;\" class=\"fb-share-button\" data-href=\"" .
           curPageURL() . "\" data-type=\"button_count\"></div> <br />";
     echo "<script src=\"//platform.linkedin.com/in.js\" type=\"text/javascript\"> lang: en_US </script>" .
           "<script type=\"IN/Share\" data-url=\"" .
           curPageURL() . "\" data-counter=\"right\"></script>";
     echo '<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en"></a>';
     echo '<br /> <br />';
  echo '</div>';

  the_content();
  echo '<hr />';
  echo '</div>';

  comments_template();

  function curPageURL() {
     $pageURL = 'http';
     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }
     return $pageURL;
  }
?>