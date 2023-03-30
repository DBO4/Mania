<!DOCTYPE html>
<?php

require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

// provjeri da li je korisnik poslao podatke iz forme
if ( $_SERVER['REQUEST_METHOD'] = 'POST' && isset($_GET['id']) ) {
    $id = $_GET['id'];

    // provjeri da li je korisničko ime i lozinka ispravni
    //if ($username == 'korisnik' && $password == 'lozinka') {
        // postavi podatke za payload
        $payload = [
            'id' => $id,
            'exp' => time() + (60 * 60) // token vrijedi jedan sat
        ];

        // postavi ključ za potpisivanje tokena
        $key = 'tajni_kljuc';

        // postavi podatke za header
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        // generiraj JWT token
        $jwt = JWT::encode($payload, $key, 'HS256', null, $header);

        // spremanje tokena u session
       
        $_SESSION['jwt'] = $jwt;
        
        session_start();
        // preusmjeri korisnika na početnu stranicu
        //header('Location: index.php');
        //exit;
    } else {
        echo 'Pogrešno korisničko ime ili lozinka.';
    }
    


?>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania meni</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <form method="POST" action="mejlPodaci.php?id=<?php echo $_GET['id']; ?>">
            <div>
                <button name="btnSlanje" value="Slanje E-Maila" type="submit">Slanje E-Maila</button>
            </div>
        </form>
        <form method="POST" action="PregledMejlova.php?id=<?php echo $_GET['id']; ?>">
            <div>
                <button name="btnPregled" value="Pregled" type="submit">Pregled mejlova</button>
            </div>
        </form>
        </div>
    </body>
</html>
