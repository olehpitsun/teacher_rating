<?php
//require_once ( 'detectmobilebrowser.php' );
session_start ();

    require_once ( 'config.php' );
    require ( 'core/Bootstrap.php' );

    new Bootstrap();

    function __autoload( $class ) {
        $file = "core/$class.php";

        if ( file_exists( $file ) ) {
            require_once ( $file );
        }
}
?>	