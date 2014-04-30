<?php
/**
 * Template the displays the default WordPress comments.
 *
 *
 * @package     DobsonDev Theme
 * @author      Alex Dobson - http://dobsondev.com/
 */

if ( post_password_required() ) {
  return;
}

?>
<div id="comments">
  <h2> Comments </h2>

<!-- You can start editing here. -->
  <ul class="commentlist">
  <?php
    /*
    array(
      'walker'            => null,
      'max_depth'         => '',
      'style'             => 'ul',
      'callback'          => null,
      'end-callback'      => null,
      'type'              => 'all',
      'reply_text'        => 'Reply',
      'page'              => '',
      'per_page'          => '',
      'avatar_size'       => 32,
      'reverse_top_level' => null,
      'reverse_children'  => '',
      'format'            => 'html5', //or xhtml if no HTML5 theme support
      'short_ping'        => false    // @since 3.6,
      'echo'              => true     // boolean, default is true
    );
    */
    wp_list_comments(array('avatar_size' => '64',
      'reply_text' => 'Reply'));
  ?>
  </ul>
  <?php
  comment_form(array('title_reply' => 'Leave Your Comment',
    'must_log_in' => null,
    'logged_in_as' => null,
    'comment_notes_after' => null,
    'fields' => apply_filters( 'comment_form_default_fields', array(
      'author' =>
        '<table><tr><td>' .
        '<label for="author">' . __( 'Name', 'domainreference' ) . ' * </label></td>' .
        '<td><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '"' . $aria_req . ' /></td></tr>',
      'email' =>
        '<tr><td><label for="email">' . __( 'Email', 'domainreference' ) . ' * </label></td>' .
        '<td><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '"' . $aria_req . ' /></td></tr></table>'))
    ));
  ?>
</div>