<?php
/*
 * Plugin Name: Kit Carousel
 * Plugin URI: https://github.com/Diana-Kaba/wp-my-themes
 * Description: Simple carousel
 * Version: 1.0
 * Author: Diana Kaba
 * Author URI: https://github.com/Diana-Kaba
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Setup
define('KC_PLUGIN_URL', __FILE__);

// Includes
include 'includes/front/enqueue.php';
include 'process/kc_show_carousel.php';
include 'includes/admin/admin.php';

// Hooks
add_action('wp_enqueue_scripts', 'kc_enqueue_scripts', 100);
add_filter('the_content', 'kc_show_carousel');
add_action('admin_menu', 'kc_create_menu');

// Shortcodes
function kc_show_carousel_shortcode($atts)
{
    return kc_show_carousel($content);
}
add_shortcode('kc_show_carousel', 'kc_show_carousel_shortcode');
