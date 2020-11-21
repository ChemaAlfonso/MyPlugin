<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class MyPluginSchema {

    public function __construct() {
        if( is_admin() )
            $this->generate_admin_schemas();
        else 
            $this->generate_public_schemas();
    }

    public function generate_admin_panel() {
        add_menu_page(
            __('Panel MyPlugin',MYPLUGIN_SLUG),
            __('MyPlugin',MYPLUGIN_SLUG),
            'administrator',
            'myplugin',
            array($this, 'create_admin_panel'),
            'dashicons-megaphone',
            14
        );
    }

    public function create_admin_panel() {
        require_once MYPLUGIN_PATH . 'template-parts/admin/admin-panel.php';
    }

    private function generate_admin_schemas() {
        $this->add_admin_menus();
    }

    private function generate_public_schemas() {
    }

    private function add_admin_menus() {
        add_action('admin_menu', array($this, 'generate_admin_panel'));
    }

}

 