<?php
session_start();
include('templates/header.php');
?>

    
        <!-- <a class="nav-link fs-3" href="login.php">Login</a> -->
    


<p class="fs-2 text-center m-5">BIENVENUE</p>

<div class="row justify-content-center m-0 p-0">
    <div class="col-lg-6 col-12 text-center p-5 m-3 rounded roundColor  ">
        <a type="button" href="addpatient.php" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5 ">Ajouter patient</a>
        <a type="button" href="#" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5">Gestion des patients</a>
        <a type="button" href="#" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5">Ajouter RDV</a>
        <a type="button" href="#" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5">Gestion RDV</a>
        <a type="button" href="#" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5">Ajouter spétialiste</a>
        <a type="button" href="#" class="btn btn-primary p-4 btnTaille m-2 fontColor fs-5">Gestion des spétialistes</a>
    </div>
    
    <div class="row justify-content-center ">

    <div class="col-lg-3 p-2  ">
        <?php if (isset($_SESSION['user'])) { ?>
        <a type="button" class=" btn btn-primary nav-link fs-3 text-center fontColor p-4 text-light" href="logout.php">Logout</a>
    <?php } ?>
    </div>
</div>

</div>



<?php
include('templates/footer.php');
?>