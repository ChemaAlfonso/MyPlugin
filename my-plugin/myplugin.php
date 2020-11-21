<?php

/**
 * @link              https://www.chemaalfonso.com/
 * @since             1.0.0
 * @package           MyPlugin
 *
 * @wordpress-plugin
 * Plugin Name:       MyPlugin
 * Plugin URI:        https://www.chemaalfonso.com/
 * Description:       Plugin creator boilerplate.
 * Version:           1.0.0
 * Author:            Chema Alfonso
 * Author URI:        https://www.chemaalfonso.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       myplugin
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once plugin_dir_path( __FILE__ ) . '/config.php';

class MyPlugin {

    public function __construct() {
        $this->init();
    }

    private function init() {

        // Enable activator & deactivator
        require_once MYPLUGIN_PATH . 'includes/myplugin-activator.php';
        $activator = new MyPluginActivator();

        // Enable languages
        require_once MYPLUGIN_PATH . 'includes/myplugin-localer.php';
        $localer = new MyPluginLocaler();

        // Enable loader
        require_once MYPLUGIN_PATH . 'includes/myplugin-loader.php';
        $loader = new MyPluginLoader();
        
        // Enable data schemas
        require_once MYPLUGIN_PATH . 'includes/myplugin-schema.php';
        $schema = new MyPluginSchema();
    }

}

 $myplugin = new MyPlugin();
