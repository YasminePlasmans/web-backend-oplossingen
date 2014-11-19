<?php

	$seconden = 221108521;
	$minuten = round($seconden / 60);
	$uren = round($minuten / 60);
	$dagen = round($uren / 24);
	$weken = round($dagen / 7);
	$maanden = round($dagen / 31);
	$jaren = round($maanden / 12);
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
		<li>Minuten: <?= $minuten ?></li>
		<li>Uren: <?= $uren ?></li>
		<li>Dagen: <?= $dagen ?></li>
		<li>Weken: <?= $weken ?></li>
		<li>Maanden: <?= $maanden ?></li>
		<li>Jaren: <?= $jaren ?></li>
	</ul>
</body>
</html>