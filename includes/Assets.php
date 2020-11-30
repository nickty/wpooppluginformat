<?php 

namespace Aco\Webs; 


class Assets {
    function __construct() {
        //for front end
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']); 

        //for backend
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function get_scripts() {
        return [
            'aco-script' => [
                'src' => ACO_WEB_ASSETS . '/js/frontend.js', 
                'version' => filemtime(ACO_WEB_PATH . '/assets/js/frontend.js'),
            ] 
        ]; 
    }

    public function get_styles() {
        return [
            'aco-style' => [
                'src' => ACO_WEB_ASSETS . '/css/frontend.css',
                'version' => filemtime(ACO_WEB_PATH . '/assets/css/frontend.css'),
            ], 
            'aco-admin-style' => [
                'src' => ACO_WEB_ASSETS . '/css/admin.css',
                'version' => filemtime(ACO_WEB_PATH . '/assets/css/admin.css'),
            ]  
        ]; 
    }

    public function enqueue_assets(){

        $scripts = $this->get_scripts(); 

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false; 
            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        $styles = $this->get_styles(); 
        
        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false; 
            wp_register_style( $handle, $style['src'], $deps, $style['version']);
        }
    }
}