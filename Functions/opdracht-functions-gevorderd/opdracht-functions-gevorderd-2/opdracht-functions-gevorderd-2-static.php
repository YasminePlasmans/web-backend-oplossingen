<?php 
	
	$pigHealth 	= 5;
	$maxThrows	= 8;
	
	function calculatehit($health){
		

		$hit 		= FALSE;

		$percent	= rand(0,100);
		
		if($percent >= 60){
			$hit = TRUE;
		}

		if($hit == TRUE){
			$hitmiss['isHit'] = true;
			$hitmiss['message'] = "Raak! Er zijn nog maar " . $health . " varkens over";

		}else{
			$hitmiss['isHit'] = false;
			$hitmiss['message'] = 'Mis! Nog ' . $health . ' in het team!';
		}

		return $hitmiss;
	}
	function launchbird($health, $max){
		static $throws = 0;
		static $arrayHit;
		if($max > $throws && $health > 0 ){
			$resultaat		= calculatehit($health);
			
			if($resultaat['isHit'] == true){
				--$health;
			}
			
			++$throws;
			$arrayHit[] 	= $resultaat['message'];

			launchbird($health,$max);
		}
		else{
			if($health < 1){
				$arrayHit[] = "Gewonnen!";
			}
			else{
				$arrayHit[] = "Verloren!";
			}
		}
		
		return $arrayHit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Opdracht Functions Gevorderd - Angry birds</h1>
	<ul>
		<?php
			$arrayThrows = launchbird($pigHealth,$maxThrows);
			foreach ($arrayThrows as $value): ?>		
				<li><?= $value ?> </li>
		<?php endforeach; ?>
	</ul>
</body>
</html>