<!DOCTYPE html>

<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania mejlovi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <form method="POST" action="mejl.php?id=<?php echo $_GET['id']; ?>">
            <?php
                session_start();
                require_once 'provjeriToken.php';
                // nastavak koda
            
                $uid = $_GET['id'];    
                require_once 'baza.php';
                $stmt = $pdo->prepare('SELECT * FROM users WHERE Id = :id');
                $stmt->execute(['id' => $uid]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    echo '
                    <div>
                        <label for="ime">Ime:</label> 
                        <input type="text" id="ime" value ="'.htmlspecialchars($user['Name']).'"  name="ime" maxlength="100" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" value ="'.htmlspecialchars($user['Email']).'" name="email" maxlength="100" required>
                    </div>';
                }
                else {
                    echo "Nešto se zbrkalo!";
                }
                ?>
            
            <div>
                <label for="naslov">Naslov:</label>
                <input type="text" id="naslov" name="naslov" maxlength="300" required>
            </div>
            <div>
                <label for="tekst">Tekst:</label>
                <textarea id="tekst" name="tekst" maxlength="3000" required></textarea>
            </div>
            <div>
                <button name="btnPosalji" value="Posalji" type="submit">Pošalji</button>
            </div>
       
        </form>
        
        </div>
    </body>
</html>