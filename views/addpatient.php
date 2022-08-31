<?php
session_start();



require_once '../controllers/controller-addpatient.php';

include('templates/header.php');
?>
<a href="dashboard.php">Retour</a>
<p class="fs-2 text-center m-5">NOUVEAU PATIENT</p>


<form action="#" method="POST" novalidate>
    <div class="row justify-content-center m-0 p-0 ">
        <div class="col-lg-6">
            <div class="row justify-content-center m-0 p-0 pt-2 rounded roundColor">
                <div class="col-lg-5 p-1 rounded">
                    <label for="firstname">Nom</label><span class="ms-2 text-danger"><?= isset($error['firstname']) ? $error['firstname'] : '' ?>
                </span>
                    <input id="firstname" name="firstname" class="tailleInput " type="text" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">

                    <label for="lastname" class="mt-2">Prénom</label><span class="ms-2 text-danger"><?= isset($error['lastname']) ? $error['lastname'] : '' ?></span>
                    <input id="lastname" name="lastname" class="tailleInput" type="text" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                

                
                    <label for="mobile">Mobile</label><span class="ms-2 text-danger"><?= isset($error['mobile']) ? $error['mobile'] : '' ?></span>
                    <input id="mobile" name="mobile" class="tailleInput" type="tel" value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>">

                    <label for="mail" class="mt-2">Mail</label><span class="ms-2 text-danger"><?= isset($error['mail']) ? $error['mail'] : '' ?></span>
                    <input name="mail" id="mail" class="tailleInput" type="email" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                    
                     <label for="adresse" class="">Adresse</label><span class="ms-2 text-danger"><?= isset($error['adresse']) ? $error['adresse'] : '' ?></span>
                     <input id="adresse" name="adresse" class="tailleInput" type="text" value="<?= isset($_POST['adresse']) ? $_POST['adresse'] : '' ?>">
                    
                
            </div>


            <div class="row justify-content-center m-0 p-0">
                <div class="col-lg-3  m-4">
                    <input type="submit" class="btn fontColor btnSize" value="valider">
                </div>
            </div>
        </div>
    </div>

    </div>
</form>




<?php
include('templates/footer.php');
?>