<?php
/**
 * Plugin Name: Fake Content Generator
 * Plugin URI: https://github.com/HoseinPirhadi/Fake-Content-Generator
 * Description: Generates fake posts or products for testing themes and sites.
 * Version: 1.0
 * Author: Hosein Pirhadi
 * Text Domain: fake-content-generator
 * Domain Path: /languages
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('FCG_VERSION', '1.0.0');
define('FCG_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FCG_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include Faker using Composer Autoload
require_once FCG_PLUGIN_DIR . 'vendor/autoload.php';

// Load plugin classes
require_once FCG_PLUGIN_DIR . 'includes/providers/class-persian-text-provider.php';
require_once FCG_PLUGIN_DIR . 'includes/class-fcg-image-handler.php';
require_once FCG_PLUGIN_DIR . 'includes/class-fcg-generator.php';
require_once FCG_PLUGIN_DIR . 'includes/class-fcg-admin.php';

// Directly initialize the plugin without using Singleton class
function fcg_init() {
    // Load language files
    load_plugin_textdomain('fake-content-generator', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    // Check the panel language
    if (get_locale() === 'fa_IR' || get_locale() === 'fa') {
        // If the language is Persian, do nothing special
    } else {
        // If the language is English or any other language, switch to English
        switch_to_locale('en_US');
    }

    $admin = new FCG_Admin();
    add_action('admin_menu', array($admin, 'add_admin_menu'));

    // Add rtl or ltr class to the body
    add_filter('body_class', function($classes) {
        return (is_rtl() ? array_merge($classes, ['rtl']) : array_merge($classes, ['ltr']));
    });
}

// Directly call the initialization function
add_action('plugins_loaded', 'fcg_init'); 
