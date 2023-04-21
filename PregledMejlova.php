<!DOCTYPE html>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require 'provjeriToken.php';

?>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania meni</title>

        <link rel="stylesheet" type="text/css" href="Sminka\izgled.css">


        <video autoplay muted loop id="myVideo">
            <source src="Sminka\back.mp4" type="video/mp4">
        </video>

        
    </head>
    <body class="antialiased">
        <div class="container">
        <?php


        // Uspostavljamo konekciju sa bazom podataka
        $uid = $_GET['id'];    
        require_once 'baza.php';
        $stmt = $pdo->prepare('SELECT * FROM users WHERE Id = :id');
        $stmt->execute(['id' => $uid]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['Is_admin'] == 1) {
            $upit = 'SELECT * FROM emails;';
            $stmt1 = $pdo->prepare($upit);
            $stmt1->execute();
        }
        else {
            $upit = 'SELECT * FROM emails WHERE User_id = :id';
            $stmt1 = $pdo->prepare($upit);
            $stmt1->execute(['id' => $uid]);
        }      
        $emailovi = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        // Prikazujemo prijavljene korisnike u HTML tabeli
        echo '<table>';
        echo '<tr><th>ID</th><th>Korisnički ID</th><th>Naslov</th></th><th>Tekst</th><th></th></tr>';
        foreach ($emailovi as $email) {
            echo '<tr>';
            echo '<td>' . $email['Id'] . '</td>';
            echo '<td>' . $email['User_id'] . '</td>';
            echo '<td>' . $email['Naslov'] . '</td>';
            echo '<td>' . $email['Tekst'] . '</td>';
            echo '<td><a href="brisiMejl.php?id=' . $email['Id'] . '&uid='.$uid.'">Obriši</a></td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <button class = "button" onclick="goBack()">Nazad</button>
        </div>

    </body>
</html>
<script>
function goBack() {
  window.history.back();
}
</script>
