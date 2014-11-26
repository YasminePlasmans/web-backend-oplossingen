<?php 
	
	$tekst = file_get_contents("text-file.txt");
	$tekstChars = str_split($tekst);
	rsort($tekstChars);
	$tekstCharsReverse = array_reverse($tekstChars);
	$arrayUnique = count(array_unique($tekstChars));
	echo 'Er zijn ' . $arrayUnique . ' unieke characters in de array';
	$arrayCount = "";
	foreach (array_count_values($tekstCharsReverse) as $i => $val) {
   		//echo "There were" . $val . "instance(s) of " . $i . " in the string.";
   		$arrayCount[$i] = $val;
	}
	var_dump($arrayCount);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>