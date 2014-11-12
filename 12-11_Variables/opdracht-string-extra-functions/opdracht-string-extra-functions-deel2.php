
<?php

	$fruit = 'ananas';
	$fruitLastA = strrpos($fruit, 'a');
	$fruitCap = strtoupper($fruit);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		<?= $fruitLastA ?>
	</p>
	<p>
		<?= $fruitCap ?>
	</p>
</body>
</html>