<?php

	function autoloader( $className )
	{	
		include_once( 'classes/' . $className . '.php' );
	}

	spl_autoload_register( 'autoloader' );
	

	$animals['kermit'] 		=	new Animal( 'Kermit', 'm', 100 );
	$animals['dikkie'] 		=	new Animal( 'Dikkie', 'm', 80 );
	$animals['flipper'] 	=	new Animal( 'Flipper', 'v', 100 );

	$lions['simba']	=	new Lion( 'Simba', 'm', 80, 'Congo Lion' );
	$lions['scar']	=	new Lion( 'Scar', 'm', 100, 'Kenia Lion' );

	$zebras['zeke']	=	new Zebra( 'Zeke', 'm', 80, 'Quagga' );
	$zebras['Zana']	=	new Zebra( 'Zana', 'f', 100, 'Selous' );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing classes: extends</title>
    </head>
    <body>
        
		<h1>Instanties van de Animal class</h1>

		<?php foreach ($animals as $animal): ?>
			<p><?= $animal->getName() ?> is van het geslacht <?= $animal->getGender() ?> en heeft momenteel <?= $animal->getHealth() ?> levenspunten. Speciale move: <?= $animal->doSpecialMove() ?>.</p>
		<?php endforeach ?>
     
		<h1>Instanties van de Lion class</h1>

		<?php foreach ($lions as $lion): ?>
			<p>De speciale move van <?= $lion->getName() ?>  (soort: <?= $lion->getSpecies() ?> ): <?= $lion->doSpecialMove() ?></p>
		<?php endforeach ?>

		<h1>Instanties van de Zebra class</h1>

		<?php foreach ($zebras as $zebra): ?>
			<p>De speciale move van <?= $zebra->getName() ?>  (soort: <?= $zebra->getSpecies() ?> ): <?= $zebra->doSpecialMove() ?></p>
		<?php endforeach ?>

    </body>
</html>