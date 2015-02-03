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

	

	$listArray 	= 	array();
	$message	= '';

		
	if ( isset( $_POST['submit'] ) ) 
	{

		if ( $_POST['todo'] == '' ) 
		{

			$message 	=	'Please give in some information.';

		}
		else
		{
			$_SESSION['todoNotDone'][] = $_POST['todo'];
		}

	}
	
	if ( isset( $_POST['toggle'] ) )
	{

		$toggleValue 	=	$_POST['toggle'];

		if( isset( $_SESSION['todoNotDone'][$toggleValue] ) )
		{

			$_SESSION['todoDone'][] = $_SESSION['todoNotDone'][$toggleValue];
			unset( $_SESSION['todoNotDone'][$toggleValue] );

		}
		elseif ( isset( $_SESSION['todoDone'][$toggleValue] ) ) 
		{
			
			$_SESSION['todoNotDone'][] = $_SESSION['todoDone'][$toggleValue];
			unset( $_SESSION['todoDone'][$toggleValue] );

		}

	}

	if( isset( $_POST['delete'] ) )
	{
		$deleteValue		= $_POST['delete'];

		if( isset( $_SESSION['todoNotDone'][$deleteValue] ) )
		{

			unset( $_SESSION['todoNotDone'][$deleteValue] );

		}
		if( isset( $_SESSION['todoDone'][$deleteValue] ) )
		{

			unset( $_SESSION['todoDone'][$deleteValue] );

		}
	}
	if ( isset( $_SESSION['todoNotDone'] ) )
	{
		if (count( $_SESSION['todoNotDone'] ) == 0) 
		{
				unset( $_SESSION['todoNotDone'] );
		}
	}
	if ( isset( $_SESSION['todoDone'] ) )
	{
		if ( count( $_SESSION['todoDone'] ) == 0) 
		{
				unset( $_SESSION['todoDone'] );
		}
	}

	$listArray	= $_SESSION;
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>ToDo</title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<div class="container">
 		
 		<?php 
 			if( $message != '' ):
 		?>
 				<div class="faultMessage">
 					<?= $message ?>
 				</div>
 		
 		<?php endif; ?>

 		<h1>Todo List</h1>

 		<?php if ( isset($listArray['todoNotDone']) ||  (isset($listArray['todoDone'] ) ) ): ?>	

 			<div class="todoList">

 				<h3>Still todo!</h3>

 				<?php if(isset( $listArray['todoNotDone'] ) ): ?>

 					<ul>
 					
 						<?php foreach ($listArray['todoNotDone'] as $key => $value): ?>
	
 							<li>
 									
 									<form action="<?= BASE_URL ?>" method="POST">
	
 										<button title="toggle" name="toggle" value="<?= $key ?>" class="toggle notDone"><?= $value ?></button>
 										<button title="delete" name="delete" value="<?= $key ?>" class="delete">Delete</button>
	
 									</form>
	
 							</li>
						<?php endforeach; ?>
 					</ul>
					
 				<?php else: ?>

 					<p>Good job, all work is done!</p>

 				 <?php endif; ?>
 			</div>

 			<div class="done">

 				<h3>All done!</h3>

 				<?php if(isset( $listArray['todoDone'] ) ): ?>

 					<ul>
 					
 						<?php foreach ($listArray['todoDone'] as $key => $value): ?>
	
 							<li>
 									
 									<form action="<?= BASE_URL ?>" method="POST">
	
 										<button title="toggle" name="toggle" value="<?= $key ?>" class="toggle done"><?= $value ?></button>
 										<button title="delete" name="delete" value="<?= $key ?>" class="delete">Delete</button>
	
 									</form>								
	
 							</li>
						<?php endforeach; ?>
 					</ul>

 				<?php else: ?>

 					<p>Chop chop, you got work to!</p>

 				<?php endif; ?>
 			</div>

 			<div class="addTodo">

 		<?php else: ?>

 			<p>No work to do or still have to add?</p>

 		<?php endif; ?>
	
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