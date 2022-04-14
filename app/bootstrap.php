<?php

namespace Starter;

/**
 * Load Project classes with PSR-4 autoloader
 */
try {
    spl_autoload_register( function ( $class )
    {
        $prefix = __NAMESPACE__ . '\\';
        $base_dir = STARTER_PLUGIN_PATH . 'app/';

        $len = strlen( $prefix );

        if ( strncmp( $prefix, $class, $len ) !== 0 ) {
            return;
        }

        $relative_class = substr( $class, $len );
        $file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

        if ( file_exists( $file ) ) {
            require $file;
        }
    } );
} catch ( \Exception $e ) {
    echo $e->getMessage()."\n";
}
