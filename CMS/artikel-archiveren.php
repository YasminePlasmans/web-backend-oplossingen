<?php 
	session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register( 'my_autoloader' );

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
	 $db = new PDO('mysql:host=localhost;dbname=opdracht_cms', 'root', 'root'); // Connectie maken

    $databaseWrapper    =   new Database( $db );

    $selectedArtikel = $_GET['artikel'];
    $artikelsSelectedQuery = 'SELECT *
                                FROM artikels
                                WHERE id =' . $selectedArtikel;
    $artikelArray = $databaseWrapper->query( $artikelsSelectedQuery);
    $artikelID 	  = intval($artikelArray[0]['id']);

   	$artikelArchiveQuery = 'UPDATE artikels
   									SET is_archived = "1"
   									WHERE id = ' . $artikelID;
                    
   	$databaseWrapper->query( $artikelArchiveQuery);
   	relocate('artikels-overzicht.php');
?>