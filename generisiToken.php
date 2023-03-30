<?php
function generisiToken($payload, $key, $expiration_time) {
    // Učitaj biblioteku za generiranje JWT tokena
    require_once 'vendor/autoload.php';    

    $key = 'tajni_kljuc';

    // Postavi podatke za header
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];

    // Postavi podatke za payload
    $payload = [];

    // Generiraj JWT token
    $jwt = JWT::encode($payload, $key, 'HS256', null, $header);

    // Ispiši JWT token
    $_SESSION['jwt'] = $jwt;
    return $jwt;

  }
  ?> 
