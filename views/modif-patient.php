<?php
session_start();



require_once ('../controllers/controller-modif-patient.php');

include('templates/header.php');
?>
<a href="table-list.php">Retour</a>
<p class="fs-2 text-center m-5">MODIF PATIENT</p>


<form action="#" method="POST" novalidate>
    <div class="row justify-content-center m-0 p-0 ">
        <div class="col-lg-6">
            <div class="row justify-content-center m-0 p-0 pt-2 rounded roundColor">
                <div class="col-lg-5 p-1 rounded">
                    <label for="lastname">Nom</label><span class="ms-2 text-danger"><?= isset($error['lastname']) ? $error['lastname'] : '' ?></span>
                    <input id="lastname" name="lastname" class="tailleInput " type="text" value="<?= $infoPatient[0]['patients_lastname']?>">

                    <label for="firstname" class="mt-2">Prénom</label><span class="ms-2 text-danger"><?= isset($error['firstname']) ? $error['firstname'] : '' ?></span>
                    <input id="firstname" name="firstname" class="tailleInput" type="text" value="<?= $infoPatient[0]['patients_firstname']?>">
                
                    <label for="mobile">Mobile</label><span class="ms-2 text-danger"><?= isset($error['mobile']) ? $error['mobile'] : '' ?></span>
                    <input id="mobile" name="mobile" class="tailleInput" type="tel" value="<?= $infoPatient[0]['patients_phonenumber']?>">

                    <label for="mail" class="mt-2">Mail</label><span class="ms-2 text-danger"><?= isset($error['mail']) ? $error['mail'] : '' ?></span>
                    <input name="mail" id="mail" class="tailleInput" type="email" value="<?= $infoPatient[0]['patients_mail']?>">
                    
                     <label for="adresse" class="">Adresse</label><span class="ms-2 text-danger"><?= isset($error['adresse']) ? $error['adresse'] : '' ?></span>
                     <input id="adresse" name="adresse" class="tailleInput" type="text" value="<?= $infoPatient[0]['patients_address']?>">
                    
                
            </div>


            <div class="row justify-content-center m-0 p-0">
                <div class="col-lg-3  m-4">
                    <input type="hidden" name="patientId" value="<?= $infoPatient[0]['patients_id']?>">
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