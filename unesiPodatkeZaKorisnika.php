<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once 'provjeriToken.php';

// Uključivanje datoteke koja sadrži PDO konekciju 
require_once 'baza.php';

// Provjera da li su podaci poslani POST metodom
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Priprema podataka za unos u bazu
  $ime = trim($_POST['ime']);
  $email = trim($_POST['email']);
  $sifra = trim($_POST['sifra']);
  $sifraHash = password_hash($_POST['sifra'], PASSWORD_DEFAULT); // heširanje lozinke
  $jeAdmin = isset($_POST['jeAdmin']) ? 1 : 0;

  // Provjera da li je email već registrovan
  $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch();

  if ($user) {
    // Ako je email već registrovan, vraćamo korisnika na stranicu za registraciju s porukom
    header('Location: registracija.php?error=Email je već registriran');
    exit();
  } else {
    // Ako email nije registriran, dodajemo novog korisnika u bazu
    $stmt = $pdo->prepare('INSERT INTO users (Name, Email, Password, Is_Admin) VALUES (:ime, :email, :sifraHash, :jeAdmin)');
    $stmt->execute(['ime' => $ime, 'email' => $email, 'sifraHash' => $sifraHash, 'jeAdmin' => $jeAdmin]);

    // Preusmjeravamo korisnika na stranicu za prijavu s porukom
    header('Location: prijava.php?success=Registracija je uspješna');
    exit();
  }
}
?>
