<?php

// =================================
// Load services
// =================================
function servicesWalker( $path ) {
    if ( $handle = opendir( $path ) ) {

        while ( ($entry = readdir($handle)) !== false ) {
            if( $entry != "." && $entry != ".." ) {

                if ( is_file( $path . '/' . $entry ) && pathinfo( $entry, PATHINFO_EXTENSION ) === 'php' ) {
                    require_once $path . '/' . $entry;
                } else if ( is_dir( $path . '/' . $entry ) ) {
                    servicesWalker($path . '/' . $entry);
                }

            }
        }
    
        closedir($handle);
    }
}

$servicesPath = MYPLUGIN_PATH . 'services';
servicesWalker( $servicesPath );