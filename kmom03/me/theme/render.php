<?php
/**
 * Render content to theme.
 *
 */

// Extract $tard into separate variables
extract($tard);

//Functions
include(__DIR__ . '/functions.php');
//main template
include(__DIR__ . '/index.tpl.php');