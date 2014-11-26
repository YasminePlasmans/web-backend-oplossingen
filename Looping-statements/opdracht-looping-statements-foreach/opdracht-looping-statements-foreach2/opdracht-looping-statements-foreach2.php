<?php 

	$tekst 				= file_get_contents("text-file.txt");
	$tekstLowercase		= strtolower($tekst);
	$counterArray		= count_chars($tekstLowercase,1);

	for($karakterNumber = 65; $karakterNumber <= 90; ++$karakterNumber){
		if(isset($counterArray[$karakterNumber])){
			$karakter = chr($karakterNumber);
			$alphabetArray[$karakter] = $karakterNumber[$karakter];
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
</body>
</html>