<?php
$host = "localhost";
$dbname = "e-mail";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Konektovan";
} catch (PDOException $e) {
    echo "Konekcija nije uspjela: " . $e->getMessage();
}
?>
