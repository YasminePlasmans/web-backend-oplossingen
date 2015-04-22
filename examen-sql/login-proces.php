<?php 
	
	session_start();
	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    var_dump($_SESSION);
    
    function relocate( $url )
    {
        header('location: ' . $url );
    }

	if ( isset( $_POST[ 'login' ] ) )
    {
        $username      =   $_POST[ 'username' ];
        $password   =   $_POST[ 'password' ];

        if ( $username !== '' && $password !== '' )
        {

            $db = new PDO('mysql:host=localhost;dbname=examen_sql', 'root', 'root'); // Connectie maken

            $userExists	=	false;

			$checkQuery	=	'SELECT * 
								FROM personeelsleden
								WHERE username = :username';
			
			$loginStatement = $db->prepare( $checkQuery );

			$loginStatement->bindValue( ':username', $username );

			$loginStatement->execute();

			$login = array();

			while ( $row = $loginStatement->fetch( PDO::FETCH_ASSOC ) )
			{
				$login[] 	=	$row;
			}
			
			if($login){
				$userExists = true;
			}
			if ( $userExists === true && $password === $login[0]['password'] )
			{
				$userLoggedIn = true;
			}
           if ( $userLoggedIn )
            {

                $timeToLive	=	60 * 60 * 24 * 30; // 30 dagen;
                $cookieValue 	=	$username . '#@#' . $login[0]['usertype'] . '#@#' . $login[0]['personeelsid'] ;
                setcookie( "authenticate", $cookieValue, time() + $timeToLive );

                $_SESSION[ 'message' ][ 'type' ] = 'success';
                $_SESSION[ 'message' ][ 'text' ] = 'Welkom in de applicatie!';
                relocate( 'dashboard.php' );
            }
            else
            {
                $_SESSION[ 'message' ][ 'type' ] = 'error';
                $_SESSION[ 'message' ][ 'text' ] = 'Er ging iets mis tijdens het inloggen, probeer opnieuw';
                relocate( 'index.php' );
            }
        }
        else
        {
             $_SESSION[ 'message' ][ 'type' ] = 'error';
             $_SESSION[ 'message' ][ 'text' ] = 'Vul een e-mailadres of een paswoord in';
            relocate( 'index.php' );
        }
    }

?>