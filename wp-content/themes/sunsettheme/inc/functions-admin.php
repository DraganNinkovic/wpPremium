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
  add_submenu_page('dragan_sunset', 'Sunset Sidebar Options', 'Sidebar', 'manage_options', 'dragan_sunset', 'sunset_theme_create_page');
  add_submenu_page('dragan_sunset', 'Sunset Theme Options', 'Theme Options', 'manage_options', 'dragan_sunset_theme', 'sunset_theme_support_page');
  add_submenu_page('dragan_sunset', 'Sunset Contact Form', 'Contact Form', 'manage_options', 'dragan_sunset_theme_contact', 'sunset_contact_form_page');
  add_submenu_page('dragan_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'dragan_sunset_css', 'sunset_theme_settings_page');

  // Activate Custom Settings
  add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu', 'sunset_add_admin_page');

// Setting up fields
function sunset_custom_settings(){
  // Field registration (fields in data base?)
  // Sidebar options
  // settings_fields('sunset-settings-group')
  register_setting('sunset-settings-group', 'profile_picture');
  register_setting('sunset-settings-group', 'first_name');
  register_setting('sunset-settings-group', 'last_name');
  register_setting('sunset-settings-group', 'user_description');
  register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
  register_setting('sunset-settings-group', 'facebook_handler');
  register_setting('sunset-settings-group', 'instagram_handler');

  // do_settings_sections('dragan_sunset')
  add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'dragan_sunset');

  add_settings_field('sidebar-profile-picture', 'Profile Picture', 'sunset_sidebar_profile', 'dragan_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'dragan_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'dragan_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-twitter', 'Twitter', 'sunset_sidebar_twitter', 'dragan_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-facebook', 'Facebook', 'sunset_sidebar_facebook', 'dragan_sunset', 'sunset-sidebar-options');
  add_settings_field('sidebar-instagram', 'Instagram', 'sunset_sidebar_instagram', 'dragan_sunset', 'sunset-sidebar-options');

  // Theme Support Options
  // settings_fields('sunset-theme-support')
  register_setting('sunset-theme-support', 'post_formats');
  register_setting('sunset-theme-support', 'custom_header');
  register_setting('sunset-theme-support', 'custom_background');

  // do_settings_sections('sunset-theme-support-options')
  add_settings_section('sunset-theme-support-options', 'Theme Options', 'sunset_theme_support_options', 'dragan_sunset_theme');

  add_settings_field('post-formats', 'Post Formats', 'sunset_post_formats', 'dragan_sunset_theme', 'sunset-theme-support-options');
  add_settings_field('custom_header', 'Custom Header', 'sunset_custom_header', 'dragan_sunset_theme', 'sunset-theme-support-options');
  add_settings_field('custom_background', 'Custom Background', 'sunset_custom_background', 'dragan_sunset_theme', 'sunset-theme-support-options');

  // Contact Form Options
  register_setting('sunset-contact-options', 'activate_contact');

  add_settings_section('sunset-contact-section', 'Contact Form', 'sunset_contact_section', 'dragan_sunset_theme_contact');

  add_settings_field('activate-form', 'Activate Contact Form', 'sunset_activate_contact', 'dragan_sunset_theme_contact', 'sunset-contact-section');

  // Custom CSS Options
  register_setting('sunset-custom-css-options', 'sunset_css', 'sunset_sanitize_custom_css');

  add_settings_section('sunset-custom-css-section', 'Contact CSS', 'sunset_custom_css_section_callback', 'sunset_theme_settings_page');

  add_settings_field('custom-css', 'Insert your CSS', 'sunset_custom_css_callback', 'sunset_theme_settings_page', 'sunset-custom-css-section');
}

/*
========================================
        Theme Support Options
========================================
*/

// Post Formats Callback Function ('sunset-theme-support')
// function sunset_post_formats_callback($input){
//   // var_dump($input); exit();
//   return $input;
// }

// Custom Header (custom_header)
function sunset_custom_header(){
  $options = get_option('custom_header');
  $checked = @$options == 1 ? 'checked' : '';
  $output = '<label><input type="checkbox" id="custom_header" name="custom_header" value="1"' . $checked . ' />Activate Custom Header</label><br>' ;

  echo $output;
 }

// Custom Background (custom_background)
 function sunset_custom_background(){
   $options = get_option('custom_background');
   $checked = @$options == 1 ? 'checked' : '';
   $output = '<label><input type="checkbox" id="custom_background" name="custom_background" value="1"' . $checked . ' />Activate Custom Background</label><br>' ;

   echo $output;
  }

// Post formats (all)
function sunset_post_formats(){
  $options = get_option('post_formats');
  $formats = array(
                'aside',
                'galery',
                'link',
                'quote',
                'status',
                'video',
                'audio',
                'chat'
              );
  $output = '';
  foreach ($formats as $format) {
    $checked = @$options[$format] == 1 ? 'checked' : '';
    $output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1"' . $checked . ' />' . $format . '</label><br>' ;
  }
  echo $output;

 }

// Theme Options
function sunset_theme_support_options(){
  echo "Activate and Deactivate specific Theme Support Options";
}

function sunset_theme_support_page(){
  require_once(get_template_directory() . '/inc/templates/sunset-theme-support.php');
}

/*
========================================
        Contact Form Options
========================================
*/

function sunset_contact_form_page(){
  require_once(get_template_directory() . '/inc/templates/sunset-contact-form.php');
}

function sunset_contact_section(){
  echo "Activate and Deactivate the Built-in Contact Form";
}

function sunset_activate_contact(){
  $options = get_option('activate_contact');
  $checked = @$options == 1 ? 'checked' : '';
  $output = '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1"' . $checked . ' /></label><br>';
  echo $output;
}

 /*
 ========================================
            Sidebar Options
 ========================================
 */

// Settings section (sunset-sidebar-options)
function sunset_sidebar_options(){
  echo 'Customize your Sidebar Information';
}

// Profile Picture (sidebar-profile-picture)
function sunset_sidebar_profile(){
  $picture = esc_attr(get_option('profile_picture'));
  if (empty($picture)) {
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" />
          <input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture . '"/>';
  }else{
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" />
          <input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture . '"/>
          <input type="button" class="button button-secondary" value="Remove Profile Picture" id="remove-button" />';
  }

}

// Full Name (sidebar-name)
function sunset_sidebar_name(){
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"/>
        <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name"/>';
}

// Description (sidebar-description)
function sunset_sidebar_description(){
  $user_description = esc_attr(get_option('user_description'));
  echo '<input type="text" name="user_description" value="' . $user_description . '" placeholder="Description"/>';
}

// Social networks (sidebar-twitter, sidebar-facebook, sidebar-instagram)
// Twitter (sidebar-twitter)
function sunset_sidebar_twitter(){
  $twitter = esc_attr(get_option('twitter_handler'));
  echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter"/>
        <p class="description">Please write your twitter info without @ symbol</p>';
}

// Facebook (sidebar-facebook)
function sunset_sidebar_facebook(){
  $facebook = esc_attr(get_option('facebook_handler'));
  echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook"/>';
}

// Instagram (sidebar-instagram)
function sunset_sidebar_instagram(){
  $instagram = esc_attr(get_option('instagram_handler'));
  echo '<input type="text" name="instagram_handler" value="' . $instagram . '" placeholder="Instagram"/>';
}

// Sanitization settings
function sunset_sanitize_twitter_handler($input){
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}

// Sunset Sidebar Options (Sidebar)
function sunset_theme_create_page(){
  require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

 /*
 ========================================
              Custom CSS
 ========================================
 */

 function sunset_custom_css_section_callback(){
   echo "Customize Sunset Theme with your own CSS";
 }

 function sunset_custom_css_callback(){
   $css = get_option('sunset_css');
   $css = empty($css) ? '/* Sunset Theme Custom CSS */' : $css;
   $output = '<div id="customCss">' . $css . '</div>
              <textarea id="sunset_css" name="sunset_css" style="display:none;visibility:hidden;">' . $css . '</textarea>' ;

   echo $output;
  }

  function sunset_sanitize_custom_css($input){
    $output = esc_textarea($input);
    return $output;
  }

// Sunset CSS Options (Custom CSS)
function sunset_theme_settings_page(){
  require_once(get_template_directory() . '/inc/templates/sunset-custom-css.php');
}
