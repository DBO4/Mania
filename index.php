<!DOCTYPE html>

<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require 'generisiToken.php';
?>

<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania mejlovi</title>

        <link rel="stylesheet" type="text/css" href="Sminka\izgled.css">


        <video autoplay muted loop id="myVideo">
            <source src="Sminka\back.mp4" type="video/mp4">
        </video>

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="container">
        <form method="POST" action="prijava.php">
            <div>
                <button name="btnPrijava" class="button" value="Prijavi se" type="submit">Prijavi se</button>
            </div>
        </form>
        <form  action="registracija.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <div>
                <button name="btnRegistracija" class ="button" value="Registruj se" type="submit">Registruj se</button>
            </div>
        </form>
        </div>
    </body>
</html>

