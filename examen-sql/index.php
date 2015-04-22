<?php 

	session_start();

	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');

	$password 	= '';
	$email 		= '';
	$message	= false;

	if(isset($_SESSION['login'])){
		$email		=	$_SESSION[ 'login' ][ 'email' ];
		$password	=	$_SESSION[ 'login' ][ 'password' ];
	}
	if(isset($_POST['message'])){
		$message = $_SESSION['message'];
	}

	var_dump($_SESSION);

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Login || Examen SQL</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php if ( isset($_SESSION['message']) ): ?>
			<div class="<?= $_SESSION['message'][ 'type' ] ?>">
				<?= $_SESSION['message']['text'] ?>
			</div>
		<?php endif ?>
		<h1>Welkom</h1>
		<p>Gelieve even in te loggen om verder te gaan.</p>
		<form action="login-proces.php" method="post">
			<ul>
			    <li>
			    	<label for="username">Username</label>
					<input type="text" name="username" id="username" value="" placeholder="">
			    </li>
			    <li>
			    	<label for="password">Password</label>
					<input type="password" name="password" id="password" value="" placeholder="">
				</li>
			    <li>
			    	<input type="submit" name="login" id="login" value="Login">
			    </li>
			</ul>
		</form>
	</body>
</html>