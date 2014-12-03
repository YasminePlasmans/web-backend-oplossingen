<?php 

	$arrayHans['Bedrag']	= 100000;
	$arrayHans['MaxJaren']	= 10;
	$arrayHans['Procent']	= 8;
	$arrayHans['Counter']	= 0;
	$arrayHans['Historiek'] = array();

	$arrayJan['Bedrag']		= 600000;
	$arrayJan['MaxJaren']	= 15;
	$arrayJan['Procent']	= 9;
	$arrayJan['Counter']	= 0;
	$arrayJan['Historiek'] 	= array();



	function bereken($array){

		if($array['Counter'] < $array['MaxJaren']){

			$array['Bedrag'] = floor($array['Bedrag'] + ($array['Bedrag'] * ($array['Procent'] / 100) ) );

			$array['Counter'] = ++$array['Counter'];

			$array['Historiek'][$array['Counter']] = $array['Bedrag'];

			bereken($array);

			return bereken($array);
		}
		return $array;
	}
	$arrayHansBerekend = bereken($arrayHans);
	$arrayJanBerekend = bereken($arrayJan);
 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Functions Recursive</title>
    </head>
    <body>
    	<h1>Recursive Functions</h1>
    	<h3>Hans</h3>
        <ul>
        	<?php foreach($arrayHansBerekend['Historiek'] as $key => $value): ?>
        		<li>
        		Na <?= $key ?> jaar heeft Hans <?= $value ?> euro.
        		</li>
        	<?php endforeach; ?>
        </ul>
        <h3>Jan</h3>
         <ul>
        	<?php foreach($arrayJanBerekend['Historiek'] as $key => $value): ?>
        		<li>
        		Na <?= $key ?> jaar heeft Jan <?= $value ?> euro.
        		</li>
        	<?php endforeach; ?>
        </ul>
    </body>
</html>