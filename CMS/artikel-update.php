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

    $updatedId 			= $_POST['id'];
  	$updatedTitel			= $_POST['titel'];
  	$updatedArtikel 		= $_POST['artikel'];
  	$updatedKernwoorden 	= $_POST['kernwoorden'];
  	$updatedDatum			= $_POST['datum'];

    $artikelUpdate = 'UPDATE artikels
   						SET  	titel 		= :titel,
   								artikel 	= :artikel,
   								kernwoorden = :kernwoorden,
   								datum 		= :datum
   						WHERE id = ' . $updatedId;

   	$updatePlaceholders	=	array( 	':titel' => $updatedTitel,
									':artikel' => $updatedArtikel,
									':kernwoorden' => $updatedKernwoorden,
									':datum' => $updatedDatum);

   	$databaseWrapper->query( $artikelUpdate,$updatePlaceholders);
   	var_dump('test');
   	relocate('artikels-overzicht.php');

 ?>