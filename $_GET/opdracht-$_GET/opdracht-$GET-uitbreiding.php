<?php 
	
	$articles	=	array(
							array(
								'Title' 			=> 'Daar is de eerste sneeuw',
								'Date'				=> '3/12/14',
								'Content'			=> 'Een dag nadat de weerkundige winter van start ging, dwarrelden gisteravond de eerste sneeuwvlokjes naar 
														beneden in Vlaanderen. Ook aan de andere kant van het land zag het hier en daar mooi wit met plaatselijk een 
														laagje van 2 tot 4 cm. Van een perfecte timing gesproken.
														Afgelopen nacht zijn de strooidiensten voor het eerst in het hele land uitgerukt. Ze hebben zo\'n 300 ton 
														zout gestrooid. Dat was vooral nodig in Limburg, Vlaams-Brabant en Antwerpen, maar ook in delen van Oost- en 
														West-Vlaanderen werd preventief gestrooid. In Vlaanderen is er voor het eerst sneeuw gevallen. "Vooral in het 
														oosten van Vlaanderen is er gestrooid, dus in Limburg, Vlaams-Brabant en de provincie Antwerpen. In totaal 
														werd daarbij zo\'n 300 ton gestrooid. Dat werd allemaal gisteravond en vannacht gedaan, zodat voor de 
														ochtendspits alle wegen er goed bij liggen", aldus Ilse Luypaerts van het agentschap Wegen en Verkeer in het 
														VRT-radionieuws. "In Oost- en West-Vlaanderen was er geen neerslag voorspeld. Uiteraard hebben wij ook daar 
														de situatie in de gaten gehouden en hebben wij een aantal kritieke punten zoals bruggen en op- en afritten 
														gestrooid." De strooidiensten reden vorige week al een eerste keer uit.',
								'Image'				=> 'eerste_sneeuw.jpg',
								'ImageDescription'	=>	'De eerste sneeuw van het jaar',
								'Content50Chars'	=>	''
								),
							array(
								'Title' 			=> '"Mevrouw, vanaf nu loopt een wandelpad door uw huis"',
								'Date'				=> '3/12/14',
								'Content'			=> 'Een verdwenen wandelweggetje in Aarschot dat al eeuwen door niemand gemist wordt, moet in ere hersteld worden.
														Dat heeft de rechter beslist. Eén probleem: op de plek waar de boeren in de jaren 1800 naar hun velden 
														baggerden, staat nu al dertig jaar een huis. "Mevrouw, vanaf nu loopt er een wandelweg door uw woning."Was 
														het niet 1 december maar 1 april geweest, Marleen Van der Borght (58) zou nog steeds in een deuk liggen van 
														de brief die ze van de gemeente Aarschot kreeg. Want een wandelpad uit 1841 dat precies door haar voordeur 
														naar binnen loopt en aan de achterdeur weer naar buiten gaat, moet in ere hersteld worden. Maar het is dus 
														géén aprilgrap. Geen krampen van het lachen, wel slapeloze nachten dus bij de bewoners in en rond de Guido 
														Gezellelaan in Aarschot. "In beroep heeft ons stadsbestuur een zaak bij de rechtbank in eerste aanleg 
														verloren over een buurtweg die hier tweehonderd jaar geleden lag. Wij zijn meteen tot aangelanden 
														gebombardeerd en volgens de brief van de gemeente moeten alle hinderlijke bouwsels verwijderd worden en de 
														weg weer openbaar worden gesteld", vertelt Marleen Van der Borght (58). "In ons geval betekent dat de woning
														waarin mijn man Richard en ik al 30 jaar wonen, afbreken en vertrekken. We kunnen wel nog een procedure 
														starten om de wandelpad te verleggen tot naast onze woning of aan de rechter vragen om de weg helemaal te 
														schrappen. Dat zal ook gebeuren, maar wat we ook doen, het zal ons geld kosten. En voor wat? Een paadje dat 
														hier blijkbaar eeuwen geleden gebruikt werd en dat ooit eens op één of ander plan is gekribbeld. Want niemand 
														had er tot nog toe al van gehoord. Onze bouwvergunning: allemaal tiptop in orde. Dertig jaar lang. En nu dit."',
								'Image'				=> 'weg_door_huis.jpg',
								'ImageDescription'	=> 'Het huis van mevrouw Van Der Borght',
								'Content50Chars'	=>	''
								),
							array(
								'Title' 			=> 'Waarom zonnepanelen beter op het westen gericht worden',
								'Date'				=> '3/12/14',
								'Content'			=> 'Wie zonnepanelen aanschaft voor zijn woning, krijgt meestal het advies die op het zuiden te richten. Iets wat 
														ook logisch lijkt, want zo wordt gedurende de hele dag het meeste zonlicht opgevangen. Maar: de energie wordt
														dan gegenereerd op uren dat ze niet nodig is, zo zeggen Amerikaanse onderzoekers. Wanneer de zonnepanelen 
														westwaarts gericht worden en dus vooral in de namiddag zonlicht opvangen, neemt de totale productie weliswaar
														af, maar wordt er wel meer elektriciteit gegenereerd tijdens de uren waarin die waardevoller is. Dat idee 
														lijkt maar moeilijk aan te slaan. Een studie van het softwarebedrijf Opower bij 110.000 gezinnen in 
														Californië wees uit dat de meeste zonnepanelen zuidwaarts gericht zijn. Op het eerste zicht lijkt dat niet 
														onlogisch. De panelen worden zo maximaal benut. De piekproductie vindt echter \'s middags plaats, en niet in 
														de namiddag wanneer ze nuttiger zou zijn. Op dat moment kijken meer mensen tv, schakelen ze de verlichting 
														aan of wordt de vaatwasser aangezet. En wanneer de vraag naar elektriciteit piekt, ligt de prijs hoger. De 
														studie toonde aan dat woningen met zonnepanelen in vergelijking met andere huizen minder dan de helft aan 
														netstroom verbruiken. Maar vanaf 16 uur tot de ochtend verbruiken ze er meer, wat de piek - rond 17 uur - 
														nog verhoogt. Door ze op het westen te richten, produceren zonnepanelen vanaf 17 uur 55 procent van hun 
														piekvermogen. Voor een 10 kilowattsysteem betekent dat 5,5 kW stroom. Gericht op het zuiden produceren ze 15 
														procent van hun vermogen, of slechts 1,5 kW, wanneer dat het meest nodig is. Het probleem hierbij, los van 
														de oriëntatie van het dak, is dat de meeste eigenaars betaald worden per aantal kilowattuur stroom die hun 
														panelen produceren. Voor de hogere waarde tijdens piekuren, worden ze niet vergoed.',
								'Image'				=> 'zonnepanelen.jpg',
								'ImageDescription'	=>	'Zonnepanelen',
								'Content50Chars'	=>	''
								)

		);

	foreach ($articles as $key => $value) {
		$articles[$key]['Content50Chars'] = substr($articles[$key]['Content'], 0,100) . '...';
	}

	$singleArticle			= FALSE;
	$noneExistingArticle	= FALSE;

	if ( isset ($_GET['id']) )
	{
		$id = $_GET['id'];

		if ( array_key_exists($id , $articles) )
		{
			$articles 			= 	array($articles[$id]);
			$singleArticle	=	TRUE;
		}
		else
		{
			$noneExistingArticle	=	TRUE;
		}		
	}

	$search = false;
	$needle = '';
	$inArray = false;

	if ( isset($_POST['search'])){
		$search = true;
	}
	if($search == true){
		$needle = $_POST['searchNeedle'];
		foreach($articles as $key => $value){
			if( strpos($articles[$key]['Content'], $needle) !== false){
				$inArray = true;
			}
		}
	}
	
	var_dump($inArray);
 ?>
 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">

         <?php if(!$singleArticle): ?>
         	<title>Overzicht artikels</title>
         <?php elseif($noneExistingArticle): ?>
         	<title>Niet bestaand artikel</title>
         <?php else: ?>
         	<title>Artikel: <?= $articles[0]['Title'] ?></title>
         <?php endif;?>
         <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
     	<div class="title">
     		<h1>Opdracht $_GET artikels</h1>
     	</div>
     	<div class="position form">
     		<form action="" method="POST">
     			<label for="search">Zoek een artikel</label>
     			<input type="text" name="searchNeedle" id="search" />
     			<input type="submit" name="search" value="Search" id="search" />
     		</form>
     	</div>
     	<div class="position">
     		<?php if(!$noneExistingArticle): ?>
     		<?php foreach ( $articles as $key => $artikel ): ?>
	
	    	     <div class="container <?= (!$singleArticle) ? 'small' : 'big' ?>" >
	
	    	     	<h2><?= $artikel['Title'] ?></h2>
	    	     	<p class="date"><?= $artikel['Date'] ?></p>
	    	     	
	    	     	<p class="artikel"><?= (!$singleArticle)? $artikel['Content50Chars'] : $artikel['Content'] ?></p>
					
					<img class="img" src="img/<?= $artikel['Image'] ?>" alt="<?= $artikel['ImageDescription'] ?>" />
	
					<?php if ( !$singleArticle ): ?>
						<a href="opdracht-$GET.php?id=<?php echo $key ?>">Lees meer...</a>
					<?php else: ?>
						<a href="opdracht-$GET.php">Ga terug naar overzicht</a>
					<?php endif ?>
	
	    	     </div>
	    	<?php endforeach ?>
	    	<?php else:?>
	    		<p>Dit artikel bestaat niet, gelieve een ander artikel te kiezen.</p>
	    		<a href="opdracht-$GET.php">Ga terug naar overzicht</a>
	    	<?php endif; ?>
	    </div>

	</body>
 </html>