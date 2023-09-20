<?php
/*
 * Plugin Name:       Wp Action Demo
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rezwanul Haque
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       wad
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
   exit;
}
function wad_load_my_plugin_translation()
{
   load_plugin_textdomain('your-plugin-textdomain', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'wad_load_my_plugin_translation');

//?Register a custom menu page.
function wad_menu_page()
{
   add_menu_page(
      __('Wad Menu Title', 'wad'),
      __('Wad items', 'wad'),
      'manage_options',
      'wad_custompage',
      'wad_custom_menu_page',
      'dashicons-plugins-checked'
   );
}
add_action('admin_menu', 'wad_menu_page');


// wad  Display a custom menu page

function wad_custom_menu_page()
{
   esc_html_e('Wad Admin Page Test', 'wad');
}

// Redirect user to plugin options page

add_action('activated_plugin', 'wad_redirect_plugin_page');

function wad_redirect_plugin_page($plugin)
{
   if (plugin_basename(__FILE__) == $plugin) {
      wp_redirect(admin_url('admin.php?page=wad_custompage'));
      die();
   }
}
