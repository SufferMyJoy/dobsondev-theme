<?php
  // Simplicity is key.
  wp_footer();
?>
</body>

<?php
  // Google Analytics
  $optionsframework_settings = get_option('optionsframework');
  // Gets the unique option id
  $option_name = $optionsframework_settings['id'];
  $options = get_option($option_name);

  echo $options["analytics_textarea"];
?>

</html>