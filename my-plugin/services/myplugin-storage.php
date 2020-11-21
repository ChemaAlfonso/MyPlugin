<?php

class MyPluginStorage {

    private static $_instance;

    private function __construct() {}

    public static function instance() {
        if( !self::$_instance )
            self::$_instance = new MyPluginStorage();

        return self::$_instance;
    }

    public function save_to_database( $option_name, $option_value ) {
        $oldOption = get_option( $this->format_option_name( $option_name ) );
        $newOptionAdded = false;

        if( $oldOption !== false )
            $newOptionAdded = $this->update_from_database( $option_name, $option_value );
        else
            $newOptionAdded = add_option( $this->format_option_name( $option_name ), $option_value );

        return $newOptionAdded;
    }

    public function update_from_database( $option_name, $option_value, $overwritted_option = null ) {
        $updated = false;

        if( !empty( $overwritted_option ) )
            $updated = ( $this->remove_from_database( $overwritted_option ) && $this->save_to_database( $option_name, $option_value ) );
        else
            $updated = update_option( $this->format_option_name( $option_name ), $option_value );
        
        return $updated;
    }

    public function remove_from_database( $option_name ) {
        return delete_option( $this->format_option_name( $option_name ) );
    }

    public function get_from_database( $option_name ) {
        $option = get_option( $this->format_option_name( $option_name ) );

        if( $option !== false )
            $option['option_name'] = $this->reverse_format_option_name( $option['option_name'] );

        return $option;
    }

    public function get_all_from_database_raw( $option_name ) {
        global $wpdb;
        $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}options WHERE option_name LIKE '%$option_name%' ORDER BY option_name", ARRAY_A );
        
        if( is_array( $results ) ) {
            $results = array_map( function( $option ){
                $option['option_name'] = $this->reverse_format_option_name($option['option_name']);
                return $option;
            }, $results);
        }

        return $results;
    }

    private function format_option_name( $option_name ) {
        return (MYPLUGIN_SLUG . '-' . $option_name);
    }

    private function reverse_format_option_name( $option_name ) {
        return str_replace(MYPLUGIN_SLUG . '-', '', $option_name);
    }

}