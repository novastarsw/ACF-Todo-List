<?php

/**
* Plugin Name: ACF TODO List
* Plugin URI: 
* Description: This is a plugin to get the todolist information using 3'th party API integration.
* Version: 1.0.0
* Author: 
* Author URI:
* Text Domain:
* Domain Path:
*/



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ACF_TODOLIST_PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'ACF_TODOLIST_PLUGIN_PATH', plugin_dir_path(__FILE__));


final class ACF_TODO_LIST_PLUGIN {
    protected static $_instance = null;
    public $version = '1.0.0';

    public function __construct() {
        $this->add_hooks();
    }
    
    public function install() {
    }

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
          self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public static function get_options() {
        $options  = (array) get_option( 'todoList', array() );
        return $options;
    }

    public function add_hooks() {
        add_action( 'admin_menu', array($this, 'acf_todolist_menu') );
        add_action( 'admin_init', array($this, 'admin_init'));
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts_front_end'));
    }
    
    public function acf_todolist_menu() {
        add_menu_page(  'ACF TodoList', __( 'ACF Todo List', 'todoList' ), 'moderate_comments', __FILE__, array($this, 'acf_todolist_setting_page') );
    }

    public function acf_todolist_setting_page() {
        require_once( ACF_TODOLIST_PLUGIN_PATH . '/settings/acf-todo-list.php' );
    }
    
    public function admin_init() {
        register_setting( 'acf_todolist_setings', 'todoList', array( $this, 'refresh_acf_todo_list' ) );
    }

    public function refresh_acf_todo_list($settings) {
        $data = self::get_options();
    }

    public function enqueue_scripts_front_end() {
        wp_enqueue_style( 'acf-todolist', ACF_TODOLIST_PLUGIN_URL . "/assets/style.css", array(), $this->version);
    }
}

$plugin = ACF_TODO_LIST_PLUGIN::instance();

register_activation_hook( __FILE__, array( $plugin, 'install' ) );
