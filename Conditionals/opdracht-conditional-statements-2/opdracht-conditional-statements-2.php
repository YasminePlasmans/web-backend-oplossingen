<?php
	
	$number = 2;
	$day = 'unknown day';

	if ($number == 1){
		$day = 'monday';
	}
	if ($number == 2){
		$day = 'tuesday';
	}
	if ($number == 3){
		$day = 'wednesday';
	}
	if ($number == 4){
		$day = 'thursday';
	}
	if ($number == 5){
		$day = 'friday';
	}
	if ($number == 6){
		$day = 'saturday';
	}
	if ($number == 7){
		$day = 'sunday';
	}

	$day = strtoupper($day);
	// $dayFinal = str_replace ('A' , a , $day);
	$dayLastA = strrpos($day,'A');
	$dayFinal = substr_replace($day,'a',$dayLastA,1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Conditional statements</title>
</head>
<body>
	<p>The day that corresponds to the number <?= $number ?> is: <?= $dayFinal ?></p>
</body>
</html>