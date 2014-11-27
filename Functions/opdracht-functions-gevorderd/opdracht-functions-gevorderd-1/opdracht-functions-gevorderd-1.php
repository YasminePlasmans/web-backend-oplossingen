<?php 
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$needle1 	= '2';
	$needle2 	= '8';
	$needle3 	= 'a';

	function checkPercent1($haystack, $needle){

		$haystackLength	= strlen($haystack);
		$needleAmount	= substr_count($haystack,$needle);
		$needlePercent	= ($needleAmount / $haystackLength) *100;
		return $needlePercent;

	}

	function checkPercent2($needle){
		$haystack = $GLOBALS['md5HashKey'];
		$haystackLength	= strlen($haystack);
		$needleAmount	= substr_count($haystack,$needle);
		$needlePercent	= ($needleAmount / $haystackLength) *100;
		return $needlePercent;
	}

	function checkPercent3($needle){
		global $md5HashKey;
		$haystack = $md5HashKey;
		$haystackLength	= strlen($haystack);
		$needleAmount	= substr_count($haystack,$needle);
		$needlePercent	= ($needleAmount / $haystackLength) *100;
		return $needlePercent;
	}
	$first 		=	checkPercent1( $md5HashKey, $needle1 );
	$second 	=	checkPercent2( $needle2 );
	$third 		=	checkPercent3( $needle3 );	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Functions</title>
</head>
<body>
	<h1>Opdracht Functions</h1>
	<p>
		Functie 1: De needle '<?= $needle1 ?>' komt <?= $first ?>% voor in de hash key '<?= $md5HashKey ?>'
	</p>
	<p>
		Functie 2: De needle '<?= $needle2 ?>' komt <?= $second ?>% voor in de hash key '<?= $md5HashKey ?>'
	</p>
	<p>
		Functie 3: De needle '<?= $needle3 ?>' komt <?= $third ?>% voor in de hash key '<?= $md5HashKey ?>'
	</p>
</body>
</html>