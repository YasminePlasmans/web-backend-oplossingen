<?php 

	session_start();

	$password 	= '';
	$email 		= '';
	$message	= false;

	if(isset($_SESSION['registration'])){
		$email		=	$_SESSION[ 'registration' ][ 'email' ];
		$password	=	$_SESSION[ 'registration' ][ 'password' ];
	}
	if(isset($_POST['register'])){
		$message = $_SESSION['message'];
	}
	var_dump($_SESSION);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php if ( isset($_SESSION['message']) ): ?>
			<div class="fout <?= $_SESSION['message'][ "type" ] ?>">
				<?= $_SESSION['message']['text'] ?>
			</div>
		<?php endif ?>
		<form action="registratie-proces.php" method="POST">
		<ul>
		    <li>
		    	<label for="email">E-mail</label>
				<input type="text" name="email" value="<?= $email ?>" placeholder="">
			</li>
		    <li>
		    	<label for="password">Password</label>
				<input type="<?= ($password != '') ? 'text' : 'password' ?>" name="password" value="<?= $password ?>" placeholder="">
				<input type="submit" name="generatePassword" value="Genereer een paswoord">
			</li>
			<li>
				<input type="submit" name="register" value="registreer">
			</li>
		</ul>
			
			
		</form>
	</body>
</html>