<?php
	
	$fruit = 'kokosnoot';
	$fruitLength = strlen($fruit);
	$fruitO = strpos($fruit, 'o');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht-string-extra-functions</title>
</head>
<body>
	<p>
		<?= $fruitLength ?>
	</p>
	<p>
		<?= $fruitO ?>
	</p>
</body>
</html>