<?php
	$voornaam = 'Yasmine';
	$familienaam = 'Plasmans';
	$volledigeNaam = $voornaam .' '. $familienaam;
	$stringLengte = strlen($volledigeNaam);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		<?= $volledigeNaam ?>
	</p>
	<p>
		<?= $stringLengte  ?>
	</p>
</body>
</html>