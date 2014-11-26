<?php

	$arrayNummer = '';
	for($nummer = 1; $nummer <= 100; $nummer++){
		$arrayNummer[] = $nummer;
	}
	var_dump( join($arrayNummer, ', '));
	
	$arrayCijfer = '';
	for($cijfer = 1; $cijfer <= 100; $cijfer++){
		if($cijfer %3 == 0 && $cijfer > 40 && $cijfer < 80){
			$arrayCijfer[] = $cijfer;
		}
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