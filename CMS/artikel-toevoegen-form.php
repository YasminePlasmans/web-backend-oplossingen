<?php

    session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register( 'my_autoloader' );

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
    $message    =   false;

    if ( Message::hasMessage() )
    {
        $message = Message::getMessage();

        Message::remove();
    }


    $db = new PDO('mysql:host=localhost;dbname=opdracht_cms', 'root', 'root'); // Connectie maken

    $databaseWrapper    =   new Database( $db );

    $user = new User( $databaseWrapper );

    if ( !$user->validate() )
    {
        new Message( "U moet eerst inloggen", "error" );
        relocate("oplossing-security-login-login-form.php");
    }

    $cookieArray    = explode('#@#', $_COOKIE['authenticate']);
    $email          = $cookieArray[0];
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing Security login</title>
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
            .float a{
                float: left;
                padding: 15px;
            }
            .float p{
                float: left;
            }
            h1{
                clear: both;
            }
            label{
                display: block;
            }
            ul{
                list-style: none;
            }
            li{
                padding:10px 0 10px 0;
            }
            input, textarea{
                width: 500px;
                height:50px;
            }
            textarea{
                resize:none;
            }
        </style>
    </head>
    <body>

         <?php if ( $message ): ?>
             <div class="modal <?= $message['type'] ?>">
                 <?= $message['text'] ?>
             </div>
         <?php endif ?>
         <div class="float">
             <a href="<?= HOST ?>oplossing-security-login-dashboard.php">Ga terug naar dashboard</a>
             <p>Ingelogd als <?= $email ?></p>
             <a href="<?= HOST ?>oplossing-security-login-logout-process.php">Uitloggen</a>
             <a href="<?= HOST ?>artikels-overzicht.php">Ga terug naar overzicht</a>
         </div>

         <h1>Overzicht van artikels</h1>
         <form action="<?= HOST ?>artikel-toevoegen-process.php" method="post">
            <ul>
                <li>
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" value="">
                </li>
                <li>
                    <label for="artikel">Artikel</label>
                    <textarea name="artikel"></textarea>
                </li>
                <li>
                    <label for="kernwoorden">Kernwoorden</label>
                    <input type="text" name="kernwoorden" value="">
                </li>
                <li>
                    <label for="datum">Datum (dd-mm-jjjj)</label>
                    <input type="text" name="datum" value="">
                </li>
                <li>
                    <input type="submit" name="nieuw-artikel" value="Voeg het artikel toe">
                </li>
            </ul>
        </form>
    </body>
</html>