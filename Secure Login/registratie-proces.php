<?php 
	session_start();
	function generatePassword($length)
	{
    	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    	$count = mb_strlen($chars);
	
    	for ($i = 0, $generatedPassword = ''; $i < $length; $i++) 
    	{
    	    $index = rand(0, $count - 1);
    	    $generatedPassword .= substr($chars, $index, 1);
    	}
	
    	return $generatedPassword;
	}
	
	if ( isset( $_POST[ 'generatePassword' ] ) )
	{
		$generatedPassword	=	generatePassword( 10 );

		$_SESSION[ 'registration' ][ 'email' ]		=	$_POST[ 'email' ];
		$_SESSION[ 'registration' ][ 'password' ]	=	$generatedPassword;

		header( 'location:registratie.php');
	}
	elseif(isset($_POST['register']))
	{
		$email 		=	$_POST[ 'email' ];
		$password 	=	$_POST['password'];
		
		$_SESSION[ 'registration' ][ 'email' ]		=	$email;
		$_SESSION[ 'registration' ][ 'password' ]	=	$password;

		if($password == ''){
			$_SESSION[ 'message' ][ 'type' ]		=	'error';
			$_SESSION[ 'message' ][ 'text' ]		=	'Please give in a password.';
			header('location:registratie.php' );
		}
		// email validation

		$emailValid	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if ( !$emailValid )
		{
			$_SESSION[ 'message' ][ 'type' ]		=	'error';
			$_SESSION[ 'message' ][ 'text' ]		=	'This is an invalid e-mail, please give in a valid e-mail!';
			header('location:registratie.php' );
		}
		else{
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=phpoefening029', 'root', 'root' );
	
				$emailQuery	=	'SELECT *
									FROM users
									WHERE email = :email';

				$emailstatement	 = $db->prepare($emailQuery);

				$emailstatement->bindValue(':email', $email);

				$emailstatement->execute();

				$emailOccurance = $emailstatement->fetch( PDO::FETCH_ASSOC );

				if($emailOccurance){
					$_SESSION[ 'message' ][ 'type' ]		=	'error';
					$_SESSION[ 'message' ][ 'text' ]		=	'This emailaddress already exists, please choose another email.';
					header('location:registratie.php' );
				}
				else
				{
					// Create salt

					$password 	=	$_POST['password'];
					$salt	= uniqid(mt_rand(), true);
					$saltedPassword	= $salt . $password;
					$hashedPassword =  hash('sha521' , $saltedPassword, false);

					$registrationQuery = 'INSERT INTO users (email, salt, password,lastlogin)
											VALUES (:email, :salt, :password,NOW())';

					$registrationStatement = $db->prepare($registrationQuery);

					$registrationStatement->bindValue(':email', $email);
					$registrationStatement->bindValue(':salt', $salt);
					$registrationStatement->bindValue(':password', $hashedPassword);

					$registrationStatement->execute();

					setcookie('login', $email . ',' . $hashedPassword, time() + 2592000);

					unset($_SESSION['message']);
					unset($_SESSION['registration']);
					header('location: dashboard.php');

				}
	
			}
			catch ( PDOException $e )
			{
				$_SESSION[ 'message' ][ 'type' ]		=	'error';
				$_SESSION[ 'message' ][ 'text' ]	=	'De connectie is niet gelukt.';
			}
		}
	}
?>