<?php

/*
@package sunsettheme

    ====================================
          Admin Enqueue Functions
    ====================================
 */
function sunset_load_admin_scripts($hook){
  // hook varijabla je stranica na kojoj se trenutno nalazimo

  wp_register_style('raleway-admin' ,'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
  // register css admin section
  wp_register_style('sunset_admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all');

  // register js admin section
  wp_register_script('sunset-admin-script', get_template_directory_uri() . '/js/sunset.admin.js', array('jquery'), '1.0.0', true);

  $pages = array(
    'toplevel_page_dragan_sunset',
    'sunset_page_dragan_sunset_css',
    'sunset_page_dragan_sunset_theme',
    'sunset_page_dragan_sunset_theme_contact'
  );

  //if('toplevel_page_dragan_sunset' == $hook){
  if(in_array($hook, $pages) && 'sunset_page_dragan_sunset_css' != $hook){

    wp_enqueue_style('raleway-admin');
    wp_enqueue_style('sunset_admin');

  }else if('toplevel_page_dragan_sunset' == $hook){

    wp_enqueue_media();

    wp_enqueue_script('sunset-admin-script');

  }else if('sunset_page_dragan_sunset_css' == $hook){

    wp_enqueue_style('raleway-admin');
    wp_enqueue_style('sunset_admin');

    wp_enqueue_style('ace', get_template_directory_uri() . '/css/sunset.ace.css', array(), '1.0.0', 'all');
    wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true);
    wp_enqueue_script('sunset-custom-css-script', get_template_directory_uri() . '/js/sunset.custom_css.js', array('jquery'), '1.0.0', true);

  }else{
    return;
  }
}
add_action('admin_enqueue_scripts', 'sunset_load_admin_scripts');

/*
====================================
      FrontEnd Enqueue Functions
====================================
 */
function sunset_load_scripts(){
  wp_enqueue_style('bootstrap' ,'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '1.0.0', 'all');
  wp_enqueue_style('sunset' , get_template_directory_uri() . '/css/sunset.css', array(), '1.0.0', 'all');
  wp_enqueue_style('raleway' ,'https://fonts.googleapis.com/css?family=Raleway:200,300,500');

  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js', false, null, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap' ,'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'sunset_load_scripts');
