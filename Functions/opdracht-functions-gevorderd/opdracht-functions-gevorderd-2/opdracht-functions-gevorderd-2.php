<?php 
	
	$pigHealth 		= 5;
	$maxThrows		= 8;
	$throws 		= 0;
	function calculatehit(){
		global $pigHealth;

		$hit 		= FALSE;

		$percent	= rand(0,100);
		
		if($percent >= 60){
			$hit = TRUE;
			--$pigHealth;
		}

		if($hit == TRUE){
			$hitmiss = "Raak! Er zijn nog maar " . $pigHealth . " varkens over";
		}else{
			$hitmiss = 'Mis! Nog ' . $pigHealth . ' in het team!';
		}

		return $hitmiss;
	}
	function launchbird(){
		global $maxThrows;
		global $throws;
		global $pigHealth;
		static $arrayHit;
		if($maxThrows > $throws && $pigHealth > 0 ){
			$resultaat		= calculatehit();
			++$throws;
			$arrayHit[] 	= $resultaat;
			launchbird( );
		}
		else{
			if($pigHealth == 0){
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
			$arrayThrows = launchbird();
			foreach ($arrayThrows as $value): ?>		
				<li><?= $value ?> </li>
		<?php endforeach; ?>
	</ul>
</body>
</html>