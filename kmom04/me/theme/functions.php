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
