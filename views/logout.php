<?php
session_start();

require_once('../controllers/controller-logout.php');
?>

<?php
include('templates/header.php');
?>
<header class="myHeader bg-light">
    <h1 class="text-center ">Clinique</h1>
</header>

<p>Bien Déconnecté</p>

<a href="connection.php" class="btn btn-danger">Retour</a>

