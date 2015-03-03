<?php 

	session_start();

	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

	if ( isset( $_GET['session'] ) )
	{
		if( $_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location:' . BASE_URL);
		}
	}
	$listArray	=	array();
	$message 	= "";
	$notDone	= 0;
	$done 		= 0;


	if ( isset( $_POST['submit'] ) ) 
	{

		if ( $_POST['todo'] == '' ) 
		{

			$message 	=	'Please give in some information.';

		}
		else
		{
			$_SESSION['toDos'][] = array($_POST['todo'] => 'notDone');
	
		}

	}

	if( isset( $_POST['toggle'] ) )
	{
		$toggle	=	intval($_POST['toggle']);
		$name 	= 	key($_SESSION['toDos'][$toggle]);
		if($_SESSION['toDos'][$toggle][$name] == 'notDone'){
			$_SESSION['toDos'][$toggle][$name] = 'done';

		}
		elseif($_SESSION['toDos'][$toggle][$name] == 'done'){
			$_SESSION['toDos'][$toggle][$name] = 'notDone';
		}
	}
	if( isset( $_POST['delete'] ) )
	{
		$delete = intval($_POST['delete']);
		$nameDelete 	= 	key($_SESSION['toDos'][$delete]);
		if($_SESSION['toDos'][$delete][$nameDelete] == 'notDone'){

			unset($_SESSION['toDos'][$delete]);
		
		}
		elseif($_SESSION['toDos'][$delete][$nameDelete] == 'done'){

			unset($_SESSION['toDos'][$delete]);
		
		}
		
	}
	if(isset($_SESSION['toDos'])){
		foreach ($_SESSION['toDos'] as $key => $toDos) {
			foreach ($toDos as $key => $value) {
				if($value == 'notDone'){
					++$notDone;
				}
				if($value == 'done'){
					++$done;
				}
			}
		}
	}
	
	$listArray	= $_SESSION;

?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>
 	</title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<div class="container">
 	<?php if( $message != '' ): ?>

 		<div class="faultMessage"> <?= $message ?> </div>
 		
 	<?php endif; ?>

 	<h1>Todo List</h1>
 	<?php if ( $notDone != 0 || $done != 0) : ?>
 		<div class="todoList">
 			<?php if ( $notDone !== 0 ): ?>
 				
 					<h3>Still todo!</h3>
 						<ul>
 							<?php foreach ($listArray['toDos'] as $key => $toDos): ?>
 								<?php foreach ($toDos as $name => $value): ?>
 									<?php if( $value == 'notDone' ): ?>
 										<li>
 																
 											<form action="<?= BASE_URL ?>" method="POST">
									
 												<button title="toggle" name="toggle" value="<?= $key ?>" class="toggle notDone"><?= $name ?></button>
 												<button title="delete" name="delete" value="<?= $key ?>" class="delete">Delete</button>
									
 											</form>
								
 										</li>
 									<?php endif; ?>
 								<?php endforeach; ?>
 							<?php endforeach; ?>
 						</ul>
 					
 			<?php else: ?>
		
 				<p>Good job, all work is done!</p>
		
 			<?php endif; ?>
 		</div>
 		
 		<div class="done">
 			<?php if ( $done !== 0 ) :  ?>
 				
 					<h3>Done!</h3>
 						<ul>
 							<?php foreach ($listArray['toDos'] as $key => $toDos): ?>
 								<?php foreach ($toDos as $name => $value): ?>
 									<?php if( $value == 'done' ): ?>
 										<li>
 																
 											<form action="<?= BASE_URL ?>" method="POST">
									
 												<button title="toggle" name="toggle" value="<?= $key ?>" class="toggle notDone"><?= $name ?></button>
 												<button title="delete" name="delete" value="<?= $key ?>" class="delete">Delete</button>
									
 											</form>
								
 										</li>
 									<?php endif; ?>
 								<?php endforeach; ?>
 							<?php endforeach; ?>
 						</ul>
 					
 			<?php else: ?>
		
 				<p>Chop chop, you got work to!</p>
		
 			<?php endif; ?>

 	<?php else: ?>
 		<p>No work to do or still have to add?</p>
 	<?php endif; ?>

 		<div class="addTodo">
 		
 			<h2>Add a Todo</h2>

 			<form action="<?= BASE_URL ?>" method="POST">

 				<ul>
 					<li>
 						<label for="todoTask">Description</label>
 						<input type="text" name="todo" id="todo">
 					</li>

 					<li class="submitBtn">
 						<input type="submit" name="submit" value="Add to list" id="submit">
 					</li>
 					<li>
 						<a class="reset" href="<?= BASE_URL ?>?session=destroy">Maak lijstje leeg</a>
 					</li>
 				</ul>
 			</form>

 		</div>
</div>
 </body>
 </html>