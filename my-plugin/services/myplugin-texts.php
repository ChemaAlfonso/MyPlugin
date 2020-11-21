<?php

class MyPluginTexts {

    private static $_instance;
    private $texts;

    private function __construct() {
        $this->create_texts();
    }

    public static function instance() {
        if( !self::$_instance )
            self::$_instance = new MyPluginTexts();

        return self::$_instance;
    }

    public function get_text( $text_id ) {
        if( empty( $this->texts[$text_id] ) ) return '';

        return $this->texts[$text_id];
    }

    private function create_texts() {
        $this->texts = [
            // Shared
            'general_data_usage' => __("Datos de uso: ", MYPLUGIN_SLUG ),
            'yes'                => __('Si', MYPLUGIN_SLUG),
            'remove'             => __("Eliminar", MYPLUGIN_SLUG ),
            'add'                => __("Añadir", MYPLUGIN_SLUG ),

        ];
    }

}