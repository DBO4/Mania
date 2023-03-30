<?php
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

// provjeri da li je korisnik poslao podatke iz forme
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // provjeri da li je korisničko ime i lozinka ispravni
    //if ($username == 'korisnik' && $password == 'lozinka') {
        // postavi podatke za payload
        $payload = [
            'username' => $username,
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
    /*} else {
        echo 'Pogrešno korisničko ime ili lozinka.';
    }*/
}
?>



<form method="post" action="pregledajPrijavu.php">
  <div>
        <label for="email">Email:</label> 
        <input type="text" id="email" name="email" maxlength="100" required>
    </div>
    <div>
        <label for="sifra">Šifra:</label>
        <input type="password" id="sifra" name="sifra" maxlength="100" required>
    </div>
  
  <button type="submit">Prijavi se</button>
</form>