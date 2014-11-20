<?php
	
	$getal 				= 45;
	/* $getalLigtTussen 	= "Dit getal ligt tussen 0 en 10";

	if($getal >= 1 && $getal <= 10){
		$getalLigtTussen = "ligt tussen 1 en 10";
	}
	elseif($getal >= 11 && $getal <= 20){
		$getalLigtTussen = "ligt tussen 10 en 20";
	}
	elseif($getal >= 21 && $getal <= 30){
		$getalLigtTussen = "ligt tussen 20 en 30";
	}
	elseif($getal >= 31 && $getal <= 40){
		$getalLigtTussen = "ligt tussen 30 en 40";
	}
	elseif($getal >= 41 && $getal <= 50){
		$getalLigtTussen = "ligt tussen 40 en 50";
	}
	elseif($getal >= 51 && $getal <= 60){
		$getalLigtTussen = "ligt tussen 50 en 60";
	}
	elseif($getal >= 61 && $getal <= 70){
		$getalLigtTussen = "ligt tussen 60 en 70";
	}
	elseif($getal >= 71 && $getal <= 80){
		$getalLigtTussen = "ligt tussen 70 en 80";
	}
	elseif($getal >= 81 && $getal <= 90){
		$getalLigtTussen = "ligt tussen 80 en 90";
	}
	elseif($getal >= 91 && $getal <= 100){
		$getalLigtTussen = "ligt tussen 90 en 100";
	}
	else{
		$getalLigtTussen = "ligt niet tussen 1 en 100";
	}

	$getalStr 		= "Het getal" . ' ' . $getal . ' ' . $getalLigtTussen;
	$getalStrRev 	= strrev($getalStr);
	*/

	$ondergrens = 0;
	$bovengrens =0;

	if($getal >= 0 && $getal < 10){
		$ondergrens = 0 ;
		$bovengrens = 10 ;
	}
	elseif($getal >= 10 && $getal < 20){
		$ondergrens = 10;
		$bovengrens = 20;
	}
	elseif($getal >= 20 && $getal < 30){
		$ondergrens = 20;
		$bovengrens = 30;
	}
	elseif($getal >= 30 && $getal < 40){
		$ondergrens = 30;
		$bovengrens = 40;
	}
	elseif($getal >= 40 && $getal < 50){
		$ondergrens = 40;
		$bovengrens = 50;
	}
	elseif($getal >= 50 && $getal < 60){
		$ondergrens = 50;
		$bovengrens = 60;
	}
	elseif($getal >= 60 && $getal < 70){
		$ondergrens = 60;
		$bovengrens = 70;
	}
	elseif($getal >= 70 && $getal < 80){
		$ondergrens = 70;
		$bovengrens = 80;
	}
	elseif($getal >= 80 && $getal < 90){
		$ondergrens = 80;
		$bovengrens = 90;
	}
	elseif($getal >= 90 && $getal < 100){
		$ondergrens = 90;
		$bovengrens = 100;
	}
	else{
		$ondergrens = false;
		$bovengrens = false;
	}
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
	<title>Opdracht-if-else-if</title>
</head>
<body>
	<h1>Opdracht if-else-if</h1>
	<!--
	<p><?= $getalStrRev ?></p>
	-->
	<p>
		<?= $antwoord ?>
	</p>
</body>
</html>