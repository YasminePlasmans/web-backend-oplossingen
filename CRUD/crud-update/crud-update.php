<?php 

	$message	=	false;

	try
	{
		// Connectie maken
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		// Delete query
		if(isset($_POST['delete'])){
			$brouwernummer = $_POST['delete'];

		}
		if(isset($_POST['confirm'])){
			$deleteQuery		= 'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';
			$deleteStatement	= $db-> prepare($deleteQuery);
			$deleteStatement->bindValue(':brouwernr',$_POST['confirm']);

			$isDeleted	= $deleteStatement->execute();

			if($isDeleted == true){
				$message['type']	=	'success';
				$message['text']	=	'De rij is successvol verwijderd';
			}
			else{
				$message['type']	=	'error';
				$message['text']	=	'De rij kon niet worden verwijderd';
			}
		}

		//Prepare
		$queryString	= 'SELECT *
							FROM brouwers';

		$statement = $db->prepare($queryString);
		

		// Uitvoeren en in array steken
		$statement->execute();
		$columnsNr = $statement->columnCount();
		for ($i = 0; $i < $columnsNr ; $i++) 
		{ 
			$columnsArray[] = $statement->getColumnMeta($i);
			$columnsName[] = $columnsArray[$i]['name'];
		}

		$rownumber = 0;
		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[]	=	$row;
			$brouwers[$rownumber]['brouwernr'] = intval($brouwers[$rownumber]['brouwernr']);
			$rownumber++;
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
		<style>
			td{
				padding:5px;
			}
			thead{
				padding: 10px;
				background-color: darkgrey;
			}
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

			.delete-button, .update-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}
		</style>
	<title>Crud Delete</title>
	</head>
	<body>
		<?php if($message != false): ?>
			<div class="modal <?= $message['type'] ?>">
				<?= $message['text'] ?>
			</div>
		<?php endif; ?>
		<h1>Overzicht van bieren</h1>
		<div>
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<?php if(isset($_POST['delete'])): ?>
					<div>
						Bent u zeker dat u de brouwer met nr: <?= $brouwernummer ?> will verwijderen?
						<button type="submit" name="confirm" value="<?= $brouwernummer ?>">Ja</button>
						<button type="submit">Nee</button>
					</div>
				<?php endif; ?>

				<table>
					<thead>
						<tr>
							<?php foreach ($columnsName as $value): ?>
								<th><?= $value ?></th>
							<?php endforeach; ?>
								<th></th>
								<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($brouwers as $key => $brouwer): ?>
							<tr class="<?= ( $key %2 == 0) ? 'even' : '' ?>">	
								<?php foreach ($brouwer as $brouwerskey => $value): ?>
									<td><?= $value ?></td>
								<?php endforeach; ?>
								<td>
									<button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
										<img src="icon-delete.png" alt="Delete">
									</button>
								</td>
								<td>
									<button type="submit" name="update" value="<?= $brouwer['brouwernr'] ?>" class="update-button">
										<img src="icon-edit.png" alt="Update">
									</button>
								</td>
							</tr>					
						<?php endforeach; ?>
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>