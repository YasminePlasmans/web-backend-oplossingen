<?php 
	$getal 		= 7;
	$getal1		= 1;
	$getal2		= 2;
	function berekensom($getal1,$getal2){
		$getalSom 	= $getal1 + $getal2;
		return $getalSom;
	}
	function berekenproduct($getal1,$getal2){
		$getalProduct	= $getal1 * $getal2;
		return $getalProduct;
	}
	function isEven($getal){
		if($getal %2 == 0){
			$getalEven 		= TRUE;
		}
		else{
			$getalEven		= FALSE;
		}
		return $getalEven;
	}

	$woord		= 'Willekeurig';
	function woordfunction($woord){
		$woordArray[] = strtoupper($woord);
		$woordArray[] = strlen($woord);
		return $woordArray;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Functions</title>
</head>
<body>
	<h1>Opdracht Functions</h1>
	<p>
		De som van <?= $getal1 ?> en <?= $getal2 ?>
		is: <?= berekensom($getal1,$getal2); ?>.
	</p>
	<p>
		Het product van <?= $getal1 ?> en <?= $getal2 ?>
		is: <?= berekenproduct($getal1,$getal2); ?>.
	</p>
	<p>
		Het getal <?= $getal ?> is: 
		<?php 
			if(isEven($getal) == true){
				echo 'even';
			}
			else{
				echo 'oneven';
			} 
		?>.
	</p>
	<p>
		<ul>
			<?php foreach(woordfunction($woord) as $value): ?>
				<li>
					<?= $value ?>
				</li>
			<?php endforeach ?>	
		</ul>
	</p>
</body>
</html>