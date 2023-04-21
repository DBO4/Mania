<!DOCTYPE html>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'generisiToken.php';

?>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania mejlovi</title>

        <link rel="stylesheet" type="text/css" href="Sminka\izgled.css">


        <video autoplay muted loop id="myVideo">
            <source src="Sminka\back.mp4" type="video/mp4">
        </video>
        
    </head>
    <body class="antialiased">
        <div class="container">
        <form method="POST" action="mejl.php?id=<?php echo $_GET['id']; ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <?php
                
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
                <button name="btnPosalji" class = "button" value="Posalji" type="submit">Pošalji</button>
            </div>
       
        </form>
        <button class = "button" onclick="goBack()">Nazad</button>
        </div>
    </body>
</html>
<script>
function goBack() {
  window.history.back();
}
</script>