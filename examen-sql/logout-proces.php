<?php

	session_start();

	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    $_SESSION[ 'message' ][ 'type' ] = 'success';
    $_SESSION[ 'message' ][ 'text' ] = 'Bedankt voor uw bezoek! Tot nog eens!';

	setcookie( "authenticate", "", 0);

	relocate( 'index.php' );

?>