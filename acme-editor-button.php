<?php
/**
 * @wordpress-plugin
 * Plugin Name:       TinyMCE Button Example
 * Description:       An example of how to register a custom button with the TinyMCE editor in WordPress.
 * Version:           1.0.0
 * Author:            Ionut Morariu
 * Author URI:        https://github.com/moraryou/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'init', 'code_button' );
function code_button() {
  if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) { return; }
  if (get_user_option('rich_editing') !== 'true') { return; }
  add_filter('mce_external_plugins', 'code_add_button');
  add_filter('mce_buttons', 'code_register_button');
}
function code_add_button( $plugin_array ) {
  $plugin_array['mycodebutton'] = $dir = plugins_url( 'uishorts/js/tinymce_buttons.js');
  return $plugin_array;
}
function code_register_button( $buttons ) {
  array_push( $buttons, 'codebutton' );
  return $buttons;
}

// path is relative to root theme
add_editor_style('assets/css/custom-editor-styles.css');
