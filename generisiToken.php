<?php
$token = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['csrf_token'] = $token;
  ?> 
