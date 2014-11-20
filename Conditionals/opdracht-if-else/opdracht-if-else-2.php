<?php

	$seconden 	= 221108521;
	$minuten 	= floor($seconden / 60);
	$uren 		= floor($minuten / 60);
	$dagen 		= floor($uren / 24);
	$weken 		= floor($dagen / 7);
	$maanden 	= floor($dagen / 31);
	$jaren 		= floor($maanden / 12);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht if else 2</title>
</head>
<body>
	<h1>Opdracht if else 2</h1>
	<p>in <?= $seconden ?> seconden:</p>
	<ul>
		<li>Minuten: 	<?= $minuten ?>	</li>
		<li>Uren: 		<?= $uren ?>	</li>
		<li>Dagen:		<?= $dagen ?>	</li>
		<li>Weken: 		<?= $weken ?>	</li>
		<li>Maanden: 	<?= $maanden ?>	</li>
		<li>Jaren: 		<?= $jaren ?>	</li>
	</ul>
</body>
</html>