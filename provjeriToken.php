<?php

if (!isset($_SESSION['csrf_token'])) {
    die('Nije moguće pristupiti stranici bez valjanog tokena!');
}

// provjeravamo postoji li token u zahtjevu
if (isset($_POST['csrf_token'])) {
    // provjeravamo podudara li se token iz sjednice sa tokenom u zahtjevu
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
      // tokeni se podudaraju - nastavljamo sa obradom zahtjeva
      //echo "Dobra";
    } else {
      echo 'Tokeni se ne podudaraju';
    }
  } else {
    echo 'zahtjev nema token'; 
  }
?>
