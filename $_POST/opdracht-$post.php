<?php 
		$password	= 'azerty';
		$username	= 'YasminePl';
		$clicked	= false;
		$result		= false;

		if(isset( $_POST ['submit'] ) ){
			$clicked	= true;
		}

		if($clicked == true && $username == $_POST['username'] && $password == $_POST['password']){
			$message	= 'Welcome';
			$result		= true;
		}else{
			$message	= 'Some of the provided info is wrong, please check again';
		}
 ?>


 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Opdracht $post</title>
         <link rel="stylesheet" href="css/style.css">
     </head>
     <body>
     	<div class="container">
     		<h1>Log in</h1>
     	    <form action="" method="POST">                          
     	       <ul>
     	           <li>
     	               <label for="username">Gebruikersnaam</label>
     	               <input type="text" id="username" name="username" />
     	           </li>
     	           <li>
     	               <label for="password">Paswoord</label>
     	               <input type="password" id="password" name="password" />
     	           </li>
     	       </ul>
     	       <input type="submit" name="submit" value="Verzend" />
     	    </form>
     	    <?php if($clicked == true): ?>
     	    	<p class="<?= ($username == $_POST['username'] && $password == $_POST['password'])? 'correct' : 'wrong' ?>"><?= $message ?></p>
     		<?php endif; ?>
        </div>
     </body>
 </html>