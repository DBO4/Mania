<!DOCTYPE html>

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
        <?php
        session_start();
        require_once 'provjeriToken.php';

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
        echo '<tr><th>ID</th><th>Korisnički ID</th><th>Naslov</th></th><th>Tekst</th></tr>';
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

        </div>
    </body>
</html>
