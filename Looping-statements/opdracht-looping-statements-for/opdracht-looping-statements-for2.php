<?php

	$maxTafels = 10;
	$maxProduct = 10;
	$tafel = 0;
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht Looping Statements While 2</title>
<style>
	table{
		width:500px;
		height: 500px;
	}
	td{
		text-align: center;
	}
	td.oneven{
		background-color:lightgreen;
	}
</style>
</head>
<body>

	<table>
		<?php for($tafel = 0; $tafel <= $maxTafels; $tafel++): ?>
			<tr>
				<?php 
					for($product = 1; $product <= $maxProduct; $product++): ?>
						<td class="<?= ( ( $tafel * $product ) %2 != 0 ) ? 'oneven' :'' ?>" >
							<?= $tafel * $product ?>
						</td>
				<?php 
					endfor; 
				?>	
			</tr>			
		<?php 
			endfor;
		?>
	</table>

</body>
</html>