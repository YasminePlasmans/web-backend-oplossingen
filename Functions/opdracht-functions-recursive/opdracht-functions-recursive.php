<?php 

	$geldHans	= 100000;
	$maxJaar	= 10;
	$procent	= 8;

	function bereken($geld,$jaren,$procent){
		static $counter = 1;
		static $array 	= array();
		if($counter <= $jaren){
			$geld = floor($geld + ($geld * ($procent / 100) ) );
			$array[$counter] = $geld;
			++$counter;
			bereken($geld,$jaren,$procent);
		}
		return $array;

	}
	$arrayHans = bereken($geldHans,$maxJaar,$procent);
 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Functions Recursive</title>
    </head>
    <body>
    	<h1>Recursive Functions</h1>
        <ul>
        	<?php foreach($arrayHans as $key => $value): ?>
        		<li>
        		Na <?= $key ?> jaar heeft Hans <?= $value ?> euro.
        		</li>
        	<?php endforeach; ?>
        </ul>
    </body>
</html>