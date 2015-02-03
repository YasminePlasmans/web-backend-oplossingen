<?php 
	setlocale( LC_ALL, 'nld_nld' );
	$vanaf	= mktime(22,35,25,01,21,1904);
	$datum	=	strftime('%d %B %Y, %H:%M:%S %p', $vanaf);

 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Date</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <script src="js/main.js"></script>
        <h1>Opdracht Date</h1>
        <p>De timestamp van 22:35:25 21 januari 1904 is: <?= $vanaf ?></p>
        <p>De timestamp omgezet naar een datum: <?= $datum ?></p>
    </body>
</html>