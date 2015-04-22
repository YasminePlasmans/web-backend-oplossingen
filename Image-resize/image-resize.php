<?php
	session_start();
	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing file resize</title>
        <style>
            html
            {
                font-family:sans-serif;
            }


            .modal
            {
                margin:5px 0px;
                padding:5px;
                border-radius:5px;
            }
            
            .success
            {
                color:#468847;
                background-color:#dff0d8;
                border:1px solid #d6e9c6;
            }
            
            .error
            {
                color:#b94a48;
                background-color:#f2dede;
                border:1px solid #eed3d7;
            }
            
            .warning
            {
                color:#3a87ad;
                background-color:#d9edf7;
                border:1px solid #bce8f1;
            }

            label img
            {
                max-width:500px;
                display:block;
            }

        </style>
    </head>
    <body>

    <h1>Gegevens</h1>

    <form action="<?= HOST ?>image-resize-process.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="profilePicture">
                    profielfoto
                    <img src="img/christinamanchenko7.jpg" alt="">
                    <img src="img/christinamanchenko7_croppedImage.jpg" alt="">
					<img src="img/christinamanchenko7_croppedImage_thumb.jpg" alt="">

                </label>

                <input type="file" id="profilePicture" name="profilePicture">
            </li>
        </ul>
        <input type="submit" value="Wijzigen" name="submit">
    </form>

    
    </body>
</html>