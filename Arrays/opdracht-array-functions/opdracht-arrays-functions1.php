<?php

	$dieren			= array('Hond','Kat','Muis','Mier','Worm','Vogel');
	$aantalDieren 	= count($dieren);
	$teZoekenDier 	= in_array('Hond', $dieren);
	$antwoord 		= '';

	if($teZoekenDier == true){
		$antwoord 	= 'gevonden';
	}
	else{
		$antwoord	= 'niet gevonden';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Array Functions 1</title>
</head>
<body>
	<h1>Opdracht Array Functions 1</h1>
	<p>
		Er zitten <?= $aantalDieren ?> dieren in de array.
	</p>
	<p>
		Het dier is <?= $antwoord ?>.
	</p>
</body>
</html>