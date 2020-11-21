<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class MyPluginLoader {

    public function __construct() {
        $this->init();
    }

    private function load_admin_dependencies() {
        $this->register_plugin_scripts();
        $this->register_plugin_styles();
    }

    private function load_public_dependencies() {
        $this->register_plugin_scripts();
        $this->register_plugin_styles();
    }

    private function register_plugin_scripts() {
        wp_enqueue_script('mypluginscripts', MYPLUGIN_SCRIPTS_URL . 'app.js', array(), false, true);
    }

    private function register_plugin_styles() {
        wp_enqueue_style('mypluginstyles', MYPLUGIN_STYLES_URL . 'style.css');
    }

    private function load_services() {
        require_once MYPLUGIN_PATH . 'services/services-index.php';
    }

    private function init() {
        if( is_admin() )
            $this->load_admin_dependencies();
        else 
            $this->load_public_dependencies();
            
        $this->load_services();
    }

}

 