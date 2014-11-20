<?php

	$dieren			= array('Hond','Kat','Muis','Mier','Worm','Vogel');
	sort($dieren);
	var_dump($dieren);
	$zoogdieren		= array('Dolfijn', 'Olifant', 'Beer');
	$dierenLijst 	= array_merge($dieren, $zoogdieren);
	sort($dierenLijst);
	var_dump($dierenLijst);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Array Functions 2</title>
</head>
<body>
	<h1>Opdracht Array Functions 2</h1>
	
</body>
</html>