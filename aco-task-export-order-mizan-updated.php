<?php 
  /**
   * Plugin Name: Mizan test plugin updated 
   * Description: It's a test plugin for job
   * Plugin URI: mizan.com
   * Author: Mizanur Rahman
   * Author URI: nickty.com
   * Version: 1.0
   * License: GPL2 or later
   * License URI: https//testsite.com
   */
  
   if(!defined ('ABSPATH')){
       exit; 
   }

   require_once __DIR__ . '/vendor/autoload.php'; 

  final class Aco_Webs {

    const version = '1.0'; 


     private function __construct(){
        $this->define_constants(); 

        register_activation_hook( __FILE__, [$this, 'active'] );

        add_action( 'plugins_loaded', [$this, 'init_plugin']); 

      }

      public static function init(){
        static $instance = false; 

        if(! $instance ){
            $instance = new self(); 
        }

        return $instance; 
      }

      public function define_constants() {
        define('ACO_WEB_VERSION', self::version); 
        define('ACO_WEB_FILE', __FILE__);
        define('ACO_WEB_PATH', __DIR__);
        define('ACO_WEB_URL', plugins_url( '', ACO_WEB_FILE ));
        define('ACO_WEB_ASSETS', ACO_WEB_URL . '/assets');    
    }

     /**
       * Things will run upon activation
       */
      public function activate(){
        $installed =  get_option('aco_web_installed', time()); 

        if(! $installed){
            update_option( 'aco_web_installed', time() );
        }
        
        update_option( 'aco_web_version', ACO_WEB_VERSION); 
      }

      /**
       * initialize plugin
       */
      public function init_plugin(){

        new Aco\Webs\Assets(); 

        if (is_admin()) {
            new Aco\Webs\Admin\Menu();
        } 
       
         
    }


  }

  function aco_webs() {
      return Aco_Webs::init(); 
  }

  aco_webs(); 