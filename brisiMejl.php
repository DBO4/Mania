<?php
session_start();
require_once 'provjeriToken.php';

require_once 'baza.php';
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eid = $_GET['id'];
    $uid = $_GET['uid'];
    $stmt = $pdo->prepare("DELETE FROM emails WHERE id = ?");
    $stmt->execute([$eid]);
    header('Location: Meni.php?id='.$uid);
    
//}