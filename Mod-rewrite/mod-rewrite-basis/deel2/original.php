<?php

	$baseName = '/' . basename(__FILE__) . '/';

	$root = preg_replace($baseName, '', __FILE__);

	$htaccess = file_get_contents($root .'/.htaccess');
	var_dump($_GET);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Het originele bestand.</h1>
	<p><?php echo $root ?></p>
</body>
</html>