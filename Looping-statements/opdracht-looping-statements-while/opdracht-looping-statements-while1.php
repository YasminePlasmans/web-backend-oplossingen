<?php

	$nummer = 1;
	$arrayNummer = '';
	while($nummer <= 100){
		$arrayNummer[] = $nummer;
		++$nummer;
	}
	var_dump( join($arrayNummer, ', '));
	
	$cijfer = 1;
	$arrayCijfer = '';
	while($cijfer <= 100){
		if($cijfer %3 == 0 && $cijfer > 40 && $cijfer < 80){
			$arrayCijfer[] = $cijfer;
		}
		$cijfer++;
	}
	var_dump(join($arrayCijfer,', '));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Looping Statements While 1</title>
</head>
<body>

</body>
</html>