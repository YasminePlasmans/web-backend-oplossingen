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
		<?php while($tafel <= $maxTafels): ?>
			<tr>
				<?php 
					$product = 1;
					while($product <= $maxProduct): ?>
						<td class="<?= ( ( $tafel * $product ) %2 != 0 ) ? 'oneven' : '' ?>" >
							<?= $tafel * $product ?>
						</td>
				<?php 
					++$product;
					endwhile; 
				?>	
			</tr>			
		<?php 
			++$tafel;
			endwhile;
		?>
	</table>

</body>
</html>