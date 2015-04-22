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

    if(isset($_POST['nieuw-artikel'])){

    	$titel = $_POST['titel'];
    	$artikel = $_POST['artikel'];
    	$kernwoorden = $_POST['kernwoorden'];

    	$db = new PDO('mysql:host=localhost;dbname=opdracht_cms', 'root', 'root'); // Connectie maken
    	$databaseWrapper    =   new Database( $db );
    		$artikelQuery	=	'INSERT INTO artikels( titel, 
															artikel, 
															kernwoorden,
															datum) 
											VALUES ( :titel,
														:artikel, 
														:kernwoorden,
														NOW())';
	
			$artikelPlaceholders	=	array( ':titel' => $titel,
												':artikel' => $artikel,
												':kernwoorden' => $kernwoorden
												);

			$databaseWrapper->query( $artikelQuery, $artikelPlaceholders );

			$artikelSelectQuery	= 'SELECT titel, artikel, kernwoorden
									FROM artikels';

			$result = $databaseWrapper->query( $artikelSelectQuery);

			$lastResult = max(array_keys($result));

			if($result[$lastResult]['titel'] == $titel && $result[$lastResult]['artikel'] == $artikel && $result[$lastResult]['kernwoorden'] == $kernwoorden ){
				
				new Message("Het artikel werd succesvol toegevoegd.","success");
				relocate( 'artikels-overzicht.php' );
			}
			else{
				new Message( "Er ging iets mis tijdens het toevoegen, probeer opnieuw", "error" );
				relocate('artikel-toevoegen-form.php');
			}
	
    }

?>