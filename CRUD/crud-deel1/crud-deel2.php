<?php
	$message = false;
	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' );
		$brouwersQueryString = 'SELECT brnaam, brouwernr
							FROM brouwers';


		$brouwersStatement = $db->prepare( $brouwersQueryString );

		$brouwersStatement->execute();

		$brouwers	= array();

		while ( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[] 	=	$row;
		}
		
		$brouwerId = 1;

		if(isset($_GET['brouwerId'])){

			$brouwerId = $_GET['brouwerId'];

		}

		$bierenQueryString	= 'SELECT naam
						FROM bieren 
						WHERE brouwernr = :brouwernr';

		$bierenStatement = $db->prepare( $bierenQueryString );

		$bierenStatement->bindValue( ':brouwernr', $brouwerId );

		$bieren	= array();

		while ( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[] 	=	$row;
		}

		$bierenKolomnamen = array_keys( $bieren[0] );
	

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

	<form action="<?= BASE_URL ?>" method="GET">
		<label for="brouwers">Selecteer brouwer</label>
		<select name="brouwersId" id="brouwers">
				<?php foreach ($brouwers as $brouwer): ?>
					<option value="<?= $brouwer['brouwernr'] ?>" <?= ($brouwer['brouwernr'] === $brouwerId) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
				<?php endforeach ?>
		</select>
		<input type="submit" value="Zoek">
	</form>
	<table>
    		<thead>
    			<tr>
    				<th>#</th>
    				<?php foreach ($bierenKolomnamen as $bierenKolomnaam): ?>
    					<th><?= $bierenKolomnaam ?></th>
    				<?php endforeach ?>
    			</tr>
    		</thead>

    		<tbody>

    			<?php foreach ( $bieren as $nummer => $bier ): ?>

    				<tr class="<?= ( ( $nummer + 1 ) % 2 !== 0 ) ? 'odd' : '' ?>">
    					<td><?= ( $nummer + 1 ) ?></td>

    					<?php foreach ($bier as $kolomValue): ?>
    						<td><?= $kolomValue ?></td>
    					<?php endforeach ?>

    				</tr>

    			<?php endforeach ?>

    		</tbody>
    	</table>
</body>
</html>