<?php

namespace Aco\Webs\Admin;

class Menu{
    function __construct(){
        add_action( 'admin_menu', [$this, 'admin_menu'] ); 
    }

    public function admin_menu(){
        $parent_slug = 'aco-webs';
        $capability = 'manage_options'; 

        $hook = add_menu_page( __('AcoWebs', 'aco-webs'), __('AcoWebs', 'aco-webs'), $capability, $parent_slug, [$this, 'plugin_page'], 'dashicons-images-alt2' );
        add_submenu_page( $parent_slug, __('Orders', 'aco-webs'), __('All Ordres', 'aco-webs'), $capability, $parent_slug, [$this, 'plugin_page']);
        add_submenu_page( $parent_slug, __('Settings', 'aco-webs'), __('Settings', 'aco-webs'), $capability, 'aco-webs-settings', [$this, 'eco_webs_settings_page']);

        add_action( 'admin_head-' . $hook, [$this, 'enqueue_assets']);


    }

    public function plugin_page(){
        echo "hello"; 
    }

    public function eco_webs_settings_page(){
        echo "<h2>Settings Page</h2>";
    }

    public function enqueue_assets(){
        wp_enqueue_style( 'aco-admin-style' ); 
    }
}