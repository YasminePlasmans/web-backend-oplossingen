<?php
	$message = false;
	try{
		
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' );
		$queryString = 	'SELECT *
							FROM bieren
							INNER JOIN brouwers
							ON bieren.brouwernr = brouwers.brouwernr
							WHERE bieren.naam LIKE "DU%"
							AND brouwers.brnaam LIKE "%a%"';

		$statement	= $db->prepare($queryString);
		$statement->execute();

		$result	= array();

		while($row = $statement->fetch( PDO::FETCH_ASSOC )){
			$result[]	= $row;
		}

		$columnNames	=	array();
		$columnNames[]	=	'Beernumber';

		foreach( $result[0] as $key => $beer )
		{
			$columnNames[  ]	=	$key;
		}

	}

	catch ( PDOException $e ){
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';

	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud Deel 1</title>
	<style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
			}

			.even
			{
				background-color:lightgrey;
			}
		</style>
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
				<?php foreach ($columnNames as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($result as $key => $beer): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ($key + 1) ?></td>
					<?php foreach ($beer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			
		</tbody>

	</table>
</body>
</html>