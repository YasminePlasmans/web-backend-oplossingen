<?php 

	$support 	= array('Leona', 'Soraka', 'Sona', 'Thresh');
	$adc		= array('Vayne', 'Kalista', 'Caitlyn', 'Lucian');
	$fighter	= array('Darius', 'Aatrox', 'Tryndamere', 'Diana');
	$mage		= array('Karthus', 'Ziggs', 'Lissandra', 'Lux');
	$champions 	= array('Support' => $support, 'ADC' => $adc, 'Fighter' => $fighter, 'Mage' => $mage);

	function drukArrayAf($array){
		$container	= array();
		foreach ($array as $key => $value) {
			
			if(is_array($value) == TRUE){
				$container[] = drukArrayAf($value);
			}else{
				$container[] = 'De champions of [' . $key . '] are: ' . $value;
			}

		}
		return $container;
	}
	var_dump(drukArrayAf($champions));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Functions 2</title>
</head>
<body>
	<h1>Opdracht Functions 2</h1>
	
</body>
</html>