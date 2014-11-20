<?php

	$getallen			= array(1,2,3,4,5);

	$getallenProduct 	= array_product($getallen);

	foreach ($getallen as $value) {
		if($value %2 != 0){
			$getallenOneven[] = $value;
		}
	}

	$getallenOmgekeerd	= array(5,4,3,2,1);

	$getallenOpgeteld	= array();
	foreach ($getallen as $key => $value) {
  		$getal1	=	$value;
  		$getal2	=	$getallenOmgekeerd[$key];
  		$getallenOpgeteld[] = $getal1 + $getal2;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Arrays basis extra</title>
</head>
<body>
	<h1>Opdracht Arrays basis extra</h1>
	<p>
	Het product van de getallen is: <?= $getallenProduct ?>
	</p>
	<h2>Oneven getallen</h2>
	<ul>
		<?php
			foreach($getallenOneven as $value){
				echo '<li>' . $value . '</li>';
			}
		?>
	</ul>
	<h2>Opgetelde getallen</h2>
	<ul>
		<?php
			foreach($getallenOpgeteld as $value){
				echo '<li>' . $value . '</li>';
			}
		?>
	</ul>
</body>
</html>