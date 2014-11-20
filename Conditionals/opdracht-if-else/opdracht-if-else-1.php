<?php

	$jaartal = 2400;
	$schrikkeljaar = false;

	if( ( $jaartal %4 == 0 && $jaartal %100 != 0) || $jaartal %400 == 0){
		$schrikkeljaar = true;
	}

	// Tekst opstellen
	$schrikkelTekst = '';
	if($schrikkeljaar == true){
		$schrikkelTekst = 'een';
	}
	else{
		$schrikkelTekst = 'geen';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht if-else</title>
</head>
<body>
	<h1>Opdracht if-else</h1>
	<p><?= $jaartal ?> is <?= $schrikkelTekst ?> schrikkeljaar</p>
</body>
</html>