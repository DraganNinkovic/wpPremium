<?php

/*
@package sunsettheme

    ====================================
          Remove Generator Version
    ====================================
 */

// Remove ver string from js and css
function sunset_remove_wp_version_strings($source){
  global $wp_version;
  parse_str(parse_url($source, PHP_URL_QUERY), $query);
  if(!empty($query['ver']) && $query['ver'] === $wp_version){
    $source = remove_query_arg('ver', $source);
  }
  return $source;
}
add_filter('script_loader_src', 'sunset_remove_wp_version_strings');
add_filter('style_loader_src', 'sunset_remove_wp_version_strings');

// Remove meta tag from header
function sunset_remove_meta_version(){
  return '';
}
add_filter('the_generator', 'sunset_remove_meta_version');
