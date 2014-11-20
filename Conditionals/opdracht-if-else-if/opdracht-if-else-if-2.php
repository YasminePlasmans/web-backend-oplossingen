<?php
	
	$getal 				= 405;
	$ondergrens			= floor($getal / 10) * 10;
	$bovengrens			= $ondergrens + 10;

	$antwoord			= "";

	if ($ondergrens !== false){
		$antwoord = 'Het getal ' . $getal . ' ligt tussen ' . $ondergrens . ' en ' . $bovengrens;
 	}
	else{
		$antwoord = 'Het getal ' . $getal . ' is ongeldig.';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Opdracht If-else-if Zonder if-else</title>
</head>
<body>
	<h1>Opdracht If-else-if Zonder if-else</h1>
	<p>
		<?= $antwoord ?>
	</p>
</body>
</html>