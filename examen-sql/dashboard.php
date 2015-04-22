<?php 

	session_start();

	$user = explode('#@#', $_COOKIE['authenticate']);

	$admin = false;
	$personeelsid = $user['2'];

	if($user[1] == '1' ){
		$admin = true;
	}

	$db = new PDO('mysql:host=localhost;dbname=examen_sql', 'root', 'root'); // Connectie maken
	$gerechtenQuery	=	'SELECT * 
								FROM gerechten';
			
	$gerechtenStatement = $db->prepare( $gerechtenQuery );

	$gerechtenStatement->execute();

	$gerechten = array();

	while ( $row = $gerechtenStatement->fetch( PDO::FETCH_ASSOC ) )
	{
		$gerechten[] 	=	$row;
	}

	$menuQuery	=	'SELECT * 
						FROM menukeuzes
						WHERE personeelid = :personeelid';
	
	$menuStatement = $db->prepare( $menuQuery );
	
	$menuStatement->bindValue( ':personeelid', $personeelsid );

	$menuStatement->execute();

	$menuKeuze = array();

	while ( $row = $menuStatement->fetch( PDO::FETCH_ASSOC ) )
	{
		$menuKeuze[] 	=	$row;
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard || Examen SQL</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h1>Dashboard</h1>

		<?php if($admin): ?>
			<a href="#">Lijst met personeelsleden en hun keuzes</a> || 
		<?php endif; ?> 
		<a href="logout-proces.php">Logout</a>
		<?php if ($menuKeuze): ?>
			<h2>Huidige keuzes</h2>
			<ul>
				<?php foreach ($menuKeuze[0] as $key => $value): ?>
					<li><?= $key ?>: <?= $value ?></li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
		<h2>Kies uw menu</h2>
		<form action="menukeuze-proces.php" method="post">
			<ul>
			    <li>
			    	Hoofdgerechten:
			    	<ul>
			    	    <?php foreach ($gerechten as $gerechtID => $gerecht): ?>
			    	    	<?php if ($gerecht['type'] == 'voorgerecht'): ?>
			    	    		<li><input type="radio" name="voorgerecht" value="<?= $gerecht['name'] ?>" placeholder=""><?= $gerecht['name'] ?> </li>
			    	    	<?php endif ?>
			    	    <?php endforeach ?>
			    	</ul>
			    </li>
			    <li>
			    	Voorgerechten:
			    	<ul>
			    	    <?php foreach ($gerechten as $gerechtID => $gerecht): ?>
			    	    	<?php if ($gerecht['type'] == 'hoofdgerecht'): ?>
			    	    		<li><input type="radio" name="hoofdgerecht" value="<?= $gerecht['name'] ?>" placeholder=""> <?= $gerecht['name'] ?> </li>
			    	    	<?php endif ?>
			    	    <?php endforeach ?>
			    	</ul>
			    </li>
			    <li>
			    	Nagerechten:
			    	<ul>
			    	    <?php foreach ($gerechten as $gerechtID => $gerecht): ?>
			    	    	<?php if ($gerecht['type'] == 'nagerecht'): ?>
			    	    		<li><input type="radio" name="nagerecht" value="<?= $gerecht['name'] ?>" placeholder=""> <?= $gerecht['name'] ?> </li>
			    	    	<?php endif ?>
			    	    <?php endforeach ?>
			    	</ul>
			    </li>
			    <li><input type="submit" name="menukeuze" id="menukeuze" value="Maak uw keuze"></li>
			</ul>
		</form>
	</body>
</html>