<?php
/*
Plugin Name: Time to Post Title
Plugin URI: https://github.com/Diana-Kaba/wp-my-themes
Version: 1.0
 * Author: Diana Kaba
 * Author URI: https://github.com/Diana-Kaba
License: GPL2
 */

 function time_to_post_content($content)
 {
    return '<div class="time">' . __('Time of post creation: ') . get_the_time() . " " . get_the_date() . '</div>' . $content;
 }

add_filter('the_content', 'time_to_post_content');

// Shortcodes

// [time_to_post]

function time_shortcode($atts)
{
   return '<div class="time">' . __('Time of post creation: ') . get_the_time() . " " . get_the_date() . '</div>';
}

add_shortcode('time_to_post', 'time_shortcode');
