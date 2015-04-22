<?php 

	session_start();
	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
    function relocate( $url )
    {
        header('location: ' . $url );
    }

    $personeelsidArray = explode('#@#', $_COOKIE['authenticate']);

    $personeelsid = intval($personeelsidArray[2]);

    var_dump($personeelsid);

    if ( isset( $_POST[ 'menukeuze' ] ) ) {
    	$db = new PDO('mysql:host=localhost;dbname=examen_sql', 'root', 'root'); // Connectie maken
		$menuQuery	=	'SELECT * 
								FROM menukeuzes
								WHERE personeelid = :personeelid';

		$menuStatement = $db->prepare( $menuQuery );
		
		$menuStatement->bindValue( ':personeelid', $personeelsid );
			
		$menuStatement->execute();

		$menu = array();

		while ( $row = $menuStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$menu[] 	=	$row;
		}
		if(!$menu){
			$menuInsertQuery = 'INSERT INTO menukeuzes (personeelid, starter, hoofdgerecht, dessert)
									VALUES ( :personeelid, :starter, :hoofdgerecht, :dessert)';

			$menuInsertStatement = $db->prepare( $menuInsertQuery );

			$menuInsertStatement->bindValue( ':personeelid', $personeelsid );
			$menuInsertStatement->bindValue( ':starter', $_POST[ 'voorgerecht' ] );
			$menuInsertStatement->bindValue( ':hoofdgerecht', $_POST[ 'hoofdgerecht' ] );
			$menuInsertStatement->bindValue( ':dessert', $_POST[ 'nagerecht' ] );


			$isAdded = $menuInsertStatement->execute();

			if ( $isAdded )
			{
				$message['type']	=	'success';
				$message['text']	=	'Uw keuze is bewaard.';

			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Er ging iets mis, probeer opnieuw';
			}
			relocate( 'dashboard.php' );
		}else{

			$menuUpdateQuery = 'UPDATE menukeuzes
									SET starter = :starter
										hoofdgerecht = :hoofdgerecht
										dessert = :dessert
									WHERE personeelid = :personeelid';

			$menuUpdateStatement = $db->prepare( $menuUpdateQuery );

			$menuUpdateStatement->bindValue( ':personeelid', $personeelsid );
			$menuUpdateStatement->bindValue( ':starter', $_POST[ 'voorgerecht' ] );
			$menuUpdateStatement->bindValue( ':hoofdgerecht', $_POST[ 'hoofdgerecht' ] );
			$menuUpdateStatement->bindValue( ':dessert', $_POST[ 'nagerecht' ] );

			$menuUpdateStatement->execute();

			$message['type']	=	'success';
			$message['text']	=	'Uw keuze is bewaard.';
			relocate( 'dashboard.php' );
		}
    }

?>