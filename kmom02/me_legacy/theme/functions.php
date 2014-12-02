<?php
/**
 * Theme functions. 
 *
 */

// Set title and add page specific subtitle
function get_title($title) {
  global $tard;
  return $title . (isset($tard['title_append']) ? $tard['title_append'] : null);
}

//Modify navigation
function modifyNavbar($items) {
  $ref = isset($items[substr($_SERVER['SCRIPT_NAME'], 1, -4)]) ? substr($_SERVER['SCRIPT_NAME'], 1, -4) : null;
  if($ref) {
    $items[$ref]['class'] .= 'selected'; 
  }
  return $items;
}

