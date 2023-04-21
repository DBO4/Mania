<!DOCTYPE html>
<?php
    session_start();
    require 'generisiToken.php';
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

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="container">
        
        <form method="POST" action="mejlPodaci.php?id=<?php echo $_GET['id']; ?>">
        
            <div>
                <button name="btnSlanje" class="button" value="Slanje E-Maila" type="submit">Slanje E-Maila</button>
            </div>
        </form>
        <form method="POST" action="PregledMejlova.php?id=<?php echo $_GET['id']; ?>">
        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <div>
                <button name="btnPregled" class="button" value="Pregled" type="submit">Pregled mejlova</button>
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
