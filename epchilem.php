<?php
/*
     Plugin Name: Epchilem
     Plugin URI: http://google.com
     Description: Test Plugin
     Author: Ailiniyazi Maimaiti
     Author URL: http://google.com
     Version 0.0.1
     Text Domain: Epchilem
     License: GPLv2
*/

function register_session()
{
     if (!session_id())
          session_start();
}

add_action('init', 'register_session');

/** Enqueue files */
function insert_convert_file()
{
     $uls = $_SESSION['uls'];
     if ($uls && $uls == 'ul') {
     wp_register_script('to_usy', plugins_url('/epchilem/scripts/to_uly.js'), array(), false, true);
          wp_enqueue_script('to_uly');    
     } else if ($uls && $uls == 'us') {
          wp_register_script('to_usy', plugins_url('/epchilem/scripts/to_usy.js'), array(), false, true);
          wp_enqueue_script('to_usy');
     }

     wp_register_script('to_uly', plugins_url('/epchilem/scripts/to_uly.js'), array(), false, true);
     wp_enqueue_script('to_uly');
}
add_action('wp_enqueue_scripts', 'insert_convert_file');

/** include files */
