<?php 
	$message = false;
	try{

		$db 			= 	new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		$orderByArray	= array();
		$orderBy 		= 'ASC';
		$orderByColumn	= '';
		$orderByString	= '';
		if(isset($_GET['OrderBy'])){

			$orderByArray 		= explode('-', $_GET['OrderBy']);
			$orderByColumn 		= $orderByArray[0];
			$orderBy 			= $orderByArray[1];

			$orderByString		= 'ORDER BY ' . $orderByColumn . ' ' . $orderBy;
		}

		if ( isset( $_GET[ 'OrderBy' ] ) )
		{
			$orderBy = ( $orderByArray[ 1 ] != 'DESC') ? 'DESC' 	:	'ASC';
		}

		$queryString	=	'SELECT bieren.biernr,
									bieren.naam,
									brouwers.brnaam,
									soorten.soort,
									bieren.alcohol
								FROM bieren
									INNER JOIN brouwers
										ON bieren.brouwernr = brouwers.brouwernr
									INNER JOIN soorten
										ON bieren.soortnr	= soorten.soortnr
									' . $orderByString;
								
		$statement		= $db->prepare($queryString);

		$statement->execute();


		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[]	=	$row;
		}

		$columnsNr = $statement->columnCount();
		for ($i = 0; $i < $columnsNr ; $i++) 
		{ 
			$columnsArray[] = $statement->getColumnMeta($i);
			$columnsName[] = $columnsArray[$i]['name'];
		}

	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'Er ging iets mis: ' . $e->getMessage();
	}
 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<title>CRUD - Query sort by</title>
 		<link rel="stylesheet" href="style.css">
 	</head>
 	<body>
 		<?php if ( $message ): ?>
			<div class="modal <?= $message[ "type" ] ?>">
				<?= $message['text'] ?>
			</div>
		<?php endif ?>	
	
 		<table>
 			<thead>
 				<tr>
 					<?php foreach($columnsName as $key => $value): ?>
 						<th class="order <?= ($orderBy == 'ASC' && $value == $orderByColumn) ? 'descending' : 'ascending' ?>
 						<?= ($value == $orderByColumn) ? 'selected' : '' ?>">
 							<a href="<?= $_SERVER['PHP_SELF'] ?>?OrderBy=<?= $value ?>-<?= $orderBy ?>"><?= $value ?></a>
 						</th>
 					<?php endforeach; ?>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach($bieren as $key => $bier): ?>
 					<tr class="<?= ( ($key + 1) % 2 == 0 ) ? 'even' : '' ?>">
 						<?php foreach($bier as $value): ?>
 							<td><?= $value ?></td>
 						<?php endforeach; ?>
 					</tr>
 				<?php endforeach; ?>
 			</tbody>
 		</table>
 	</body>
 </html>