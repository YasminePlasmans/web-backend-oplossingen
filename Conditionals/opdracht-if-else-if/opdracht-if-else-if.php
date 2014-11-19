<?php
	
	$getal = 52;
	$getalLigtTussen = "Dit getal ligt tussen 0 en 10";

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

	$getalStr = "Het getal" . ' ' . $getal . ' ' . $getalLigtTussen;
	$getalStrRev = strrev($getalStr);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Opdracht-if-else-if</title>
</head>
<body>
	<h1>Opdracht if-else-if</h1>
	<p><?= $getalStrRev ?></p>
</body>
</html>