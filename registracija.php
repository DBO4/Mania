<?php
    require 'Tokenizacija.php';
?>


<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mania meni</title>

        <link rel="stylesheet" type="text/css" href="Sminka\izgled.css">


        <video autoplay muted loop id="myVideo">
            <source src="Sminka\back.mp4" type="video/mp4">
        </video>

        <!-- Styles -->
        
    </head>

<div class="container">
<form method="post" action="unesiPodatkeZaKorisnika.php" onsubmit="return validateForm()">
 <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
  <div>
        <label for="ime">Ime:</label> 
        <input type="text" id="ime" name="ime" maxlength="100" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" maxlength="100" required>
    </div>
    <div>
        <label for="sifra">Šifra:</label>
        <input type="password" id="sifra" name="sifra" maxlength="100" required>
    </div>
    <div>
        <label for="potvSifre">Ponovi šifru:</label>
        <input type="password" id="potvSifre" name="potvSifre" maxlength="100" required>
    </div>
    <div>
        <label for="jeAdmin">Admin?:</label>
        <input type="checkbox" id="jeAdmin" name="jeAdmin">
    </div>
  
  <button class="button" type="submit">Registracija</button>
  <button class = "button" onclick="goBack()">Nazad</button>
</form>

</div>


<script>
function goBack() {
  window.history.back();
}
</script>