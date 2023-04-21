<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    require 'generisiToken.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="Sminka\izgled.css">


  <video autoplay muted loop id="myVideo">
      <source src="Sminka\back.mp4" type="video/mp4">
  </video>
</head>

<div class="container">
  <form method="post" action="pregledajPrijavu.php">
  <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <div>
          <label for="email">Email:</label> 
          <input type="text" id="email" name="email" maxlength="100" required>
      </div>
      <div>
          <label for="sifra">Šifra:</label>
          <input type="password" id="sifra" name="sifra" maxlength="100" required>
      </div>
    
    <button class="button" type="submit">Prijavi se</button>
    <button class = "button" onclick="goBack()">Nazad</button>
  </form>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>