<?php
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
// Postavi ključ za potpisivanje tokena
$key = 'tajni_kljuc';

//session_start();
// Dohvati JWT token
$jwt = $_SESSION['jwt'];

try {
    // Provjeri i dekodiraj JWT token
    $payload = JWT::decode($jwt, new Key($key,'HS256'), ['HS256']);

    // Ispiši korisničko ime
    //echo 'Korisnik: ' ;
} catch (Exception $e) {
    // Token nije valjan ili je istekao
    echo 'Neuspješna autentifikacija'.JWT::decode($jwt, $key, ['HS256']);
}
?>
