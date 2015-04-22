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

    $artikelsOverzichtQuery = 'SELECT *
                                FROM artikels';
    $artikelsArray = $databaseWrapper->query( $artikelsOverzichtQuery);

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
            ul{
                list-style: circle;
            }
            .activeArtikel{
                background-color: lightgrey;
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
         </div>

         <h1>Overzicht van artikels</h1>
        <a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>

        <?php foreach($artikelsArray as $key => $artikel): ?>
            <?php if($artikel['is_archived'] == 0): ?>
            <div class="<?= ($artikel['is_active'] == 1) ? 'activeArtikel' : '' ?>">
                <h2><?= $artikel['titel'] ?></h2>
                <ul>
                    <li>Artikel: <?= $artikel['artikel'] ?></li>
                    <li>Kernwoorden: <?= $artikel['kernwoorden'] ?></li>
                    <li>Datum: <?= $artikel['datum'] ?></li>
                </ul>
                <a href="<?= HOST ?>artikel-update-form.php?artikel=<?= $artikel['id'] ?>">Artikel wijzigen</a>
                <a href="<?= HOST ?>artikel-activeren.php?artikel=<?= $artikel['id'] ?>">Artikel <?= ($artikel['is_active'] == 1) ? 'deactiveren' : 'activeren' ?></a>
                <a href="<?= HOST ?>artikel-archiveren.php?artikel=<?= $artikel['id'] ?>">Artikel verwijderen</a>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>

    </body>
</html>