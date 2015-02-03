<?php 
	if (isset( $_GET['logout'])){
		setcookie('authenticated', '', time() -360);
		header('location: opdracht-cookies-2.php');

	}
	$loginTxt		= file_get_contents("login.txt");

	$loginArray 	= explode(',',$loginTxt);

	$loginSubmit	= false;
	$login 			= false;

	$message		= '';

	if( !isset($_COOKIE['authenticated'])){
		if (isset( $_POST['submit'] ) ) {
	
			$loginSubmit	= true;
	           
			if($_POST['username'] == $loginArray[0] && $_POST['password'] == $loginArray[1]){
	               
                $cookieTime =   ( isset( $_POST[ 'rememberMe' ] ) ? ( time() + 3600) : time() + 10 );
                   
				setcookie('authenticated', true , $cookieTime);
				header('location: opdracht-cookies-2.php');

			}else{
				$message = 'Username and/or password are wrong. Please try again';
			}
		}
	}else{
		$message 	= $loginArray[0] . ', You are logged in. Welcome back!';
		$login 		= true;
	}

 ?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Opdracht Cookies</title>
    	<style>
    		li{
    			list-style: none;
    		}
    		label{
    			display: block;
    		}
            label.checkbox{
                display: inline-block;
            }
    	</style>
    </head>
    <body>
        <h1>Inloggen</h1>

        <?php if($message): ?>
        	<?= $message ?>
        <?php endif; ?>

        <?php if(!$login): ?>
    		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    			<ul>
    			    <li>
    			    	<label for="username">Username</label>
    			    	<input type="text" name="username" value="" id="username">
    			    </li>
    			    <li>
    			    	<label for="password">Passwords</label>
    			    	<input type="password" name="password" value="" id="password">
    			    </li>
                    <li>
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox">Keep me logged in</label>
                        
                    </li>
    			    <li>
    			    	<input type="submit" name="submit" value="Submit">
    			    </li>
    			</ul>
    		</form>
    	<?php else: ?>
    		<a href="opdracht-cookies-2.php?logout=true">Log out</a>
    	<?php endif; ?>
    </body>
</html>