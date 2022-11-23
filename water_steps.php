<?php
/*
Plugin Name: Этапы поверки
Description: Блок с этапами поверки и слайдер для мобильных
Version: 1.0
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;

/**************
 * Константы
 **************/
define( 'WATER_STEPS_PLUGIN_DB_VERSION', '1.1' );
define( 'WATER_STEPS_PLUGIN_NAME',       'water_steps' );
define( 'WATER_STEPS_PLUGIN_NAME_RU',    'Этапы поверки' );
define( 'WATER_STEPS_DB_TABLE_NAME',     $wpdb->prefix . WATER_STEPS_PLUGIN_NAME );
define( 'WATER_STEPS_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'WATER_STEPS_PLUGIN_ADMIN_URL',  admin_url('?page=' . WATER_STEPS_PLUGIN_NAME) );

/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$water_main_class = new WaterSteps( __FILE__ );


/**************
 * Run
 **************/

// Правила активации:
// register_activation_hook() должен вызываться из основного файла плагина, из того где расположена директива Plugin Name
register_activation_hook(__FILE__, array($water_main_class, 'activate'));

function steps_plugin_load_scripts()
{    
  wp_enqueue_script('init_steps_slider', '/wp-content/plugins/water_steps/static/js/init_steps_slider.js', array('slick'), NULL, true);
} 
add_action('wp_enqueue_scripts', 'steps_plugin_load_scripts', 10);