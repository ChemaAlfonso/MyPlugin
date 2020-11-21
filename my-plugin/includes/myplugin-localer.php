<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class MyPluginLocaler {

    public function __construct() {
        $this->setLocale();
    }

    private function setLocale() {
        load_plugin_textdomain( MYPLUGIN_SLUG, false, MYPLUGIN_PATH . 'languages/' );
    }

}

 