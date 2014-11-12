<?php

	$lettertje = 'e';
	$cijfertje = 3;
	$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
	$replacedLangsteWoord = str_replace($lettertje , $cijfertje, $langsteWoord);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		<?= $replacedLangsteWoord ?>
	</p>
</body>
</html>