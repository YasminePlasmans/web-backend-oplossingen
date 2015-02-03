<?php

	include( 'classes/Percent.php' );

	$getal	=	new Percent( 100000 , 100 );

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing classes begin</title>
    </head>
    <body>
        
        <table>
        	<tr>
        		<td>Absoluut</td>
        		<td><?= $getal->absolute ?></td>
        	</tr>
        	<tr>
        		<td>Relatief</td>
        		<td><?= $getal->relative ?></td>
        	</tr>
        	<tr>
        		<td>Geheel getal</td>
        		<td><?= $getal->hundred ?></td>
        	</tr>
        	<tr>
        		<td>Nominaal</td>
        		<td><?= $getal->nominal ?></td>
        	</tr>
        </table>

    </body>
</html>