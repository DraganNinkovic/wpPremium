<?php

/*

@package sunsettheme

    ====================================
                Admin Page
    ====================================

 */

function sunset_add_admin_page(){
  // Susnset Admin Page
  add_menu_page('Sunset Theme Option', 'Sunset', 'manage_options', 'dragan_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110);

  // Sunset Admin Subpages
  add_submenu_page('dragan_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'dragan_sunset', 'sunset_theme_create_page');
  add_submenu_page('dragan_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'dragan_sunset_css', 'sunset_theme_settings_page');

  // Activate Custom Settings
  add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings(){
  register_setting('sunset-settings-group', 'first_name');
  add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'dragan_sunset');
  add_settings_field('sidebar-name', 'First Name', 'sunset_sidebar_name', 'dragan_sunset', 'sunset-sidebar-options');
}

function sunset_sidebar_options(){

}

function sunset_sidebar_name(){
  
}

function sunset_theme_create_page(){
  require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page(){
  echo "<h1>Sunset Custom CSS</h1>";
}
