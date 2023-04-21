<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'provjeriToken.php';
require 'generisiToken.php';

?>