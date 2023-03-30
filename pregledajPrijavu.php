<?php
require_once 'baza.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $sifra = trim($_POST['sifra']);
    $sifraHash = password_hash($sifra, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('SELECT * FROM users WHERE Email = :email;');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($_POST['sifra'], $user['Password'])) {
        header('Location: Meni.php?id='.$user['Id']);
    }
    else {
        echo "Pogrešno unesena šifra.";
    }
    
}