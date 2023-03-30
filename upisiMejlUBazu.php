<?php
session_start();
require_once 'provjeriToken.php';

$uid = $_GET['id'];
$tekst = $_GET['tekst'];
$naslov = $_GET['naslov'];
require_once 'baza.php';
 $stmt = $pdo->prepare('INSERT INTO emails (user_id, naslov, tekst) VALUES (:user_id, :naslov, :tekst)');
 $stmt->execute(['user_id' => $uid, 'naslov' => $naslov, 'tekst' => $tekst]);

 echo 'Poruka je uspješno upisana!';
 header('Location: mejlPodaci.php?id='.$uid);