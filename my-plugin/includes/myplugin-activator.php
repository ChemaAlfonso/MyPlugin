<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class MyPluginActivator {

    public function __construct() {
        $this->load_activator();
        $this->load_deactivator();
    }

    private function load_activator() {
        register_activation_hook( __FILE__, array( $this, 'activate_myplugin') );
    }

    private function load_deactivator() {
        register_deactivation_hook( __FILE__, array( $this, 'deactivate_myplugin') );
    }

    public function activate_myplugin() {}

    public function deactivate_myplugin() {}

}

 