<?php
include('templates/header.php');
?>

<p class="fs-2 text-center m-5">IDENTIFICATION</p>

<div class="row justify-content-center m-0 p-0 ">
    <div class="col-lg-3 border border-dark p-5 rounded  ">
        <label>Identifiant</label>
        <input class="tailleInput " type="text">

        <label class="mt-4">Mot de passe</label>
        <input class="tailleInput" type="password">

        <div class="row justify-content-center m-0 p-0">
            <div class="col-lg-11  mt-3 ">
                <p class="text-danger text-center fontStyle">erreur de connection</p>
                <a type="button" class="btn fontColor btnSize">Connection</a>
            </div>
        </div>
    </div>

    <a class="text-center m-3" href="#">Mot de passe oublié</a>


</div>





<?php
include('templates/footer.php');
?>