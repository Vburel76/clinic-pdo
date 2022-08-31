<?php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
   exit; 
}


session_unset();
session_destroy();
