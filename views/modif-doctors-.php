<?php
session_start();



require_once ('../controllers/controller-modif-doctor.php');

include('templates/header.php');
?>
<a href="table-list.php">Retour</a>
<p class="fs-2 text-center m-5">MODIFICATION DOCTEUR</p>


<form action="#" method="POST" novalidate>
    <div class="row justify-content-center m-0 p-0 ">
        <div class="col-lg-6">
            <div class="row justify-content-center m-0 p-0 pt-2 rounded roundColor">
                <div class="col-lg-5 p-1 rounded">
                    <label for="nameDoctor">Nom</label><span class="ms-2 text-danger"><?= isset($error['nameDoctor']) ? $error['nameDoctor'] : '' ?></span>
                    <input id="nameDoctor" name="nameDoctor" class="tailleInput " type="text" value="<?= $infodoctors[0]['doctors_name']?>">

                    <label for="firstnameDoctor" class="mt-2">Prénom</label><span class="ms-2 text-danger"><?= isset($error['firstnameDoctor']) ? $error['firstnameDoctor'] : '' ?></span>
                    <input id="firstnameDoctor" name="firstnameDoctor" class="tailleInput" type="text" value="<?= $infodoctors[0]['doctors_lastname']?>">
                
                    <label for="mobileDoctor">Mobile</label><span class="ms-2 text-danger"><?= isset($error['mobileDoctor']) ? $error['mobileDoctor'] : '' ?></span>
                    <input id="mobileDoctor" name="mobileDoctor" class="tailleInput" type="tel" value="<?= $infodoctors[0]['doctors_phonenumber']?>">

                    <label for="mailDoctor" class="mt-2">Mail</label><span class="ms-2 text-danger"><?= isset($error['mailDoctor']) ? $error['mailDoctor'] : '' ?></span>
                    <input name="mailDoctor" id="mailDoctor" class="tailleInput" type="email" value="<?= $infodoctors[0]['doctors_mail']?>">
                    
                    <label for="select" class="mt-3" for="select">Domaine</label><span class="ms-2 text-danger"><?= isset($errors['select']) ? $errors['select'] : '' ?></span>
                    <br>
                    <select class="mt-3" name="select" id="select">
                        <option value="">-- veuillez selectionner une option</option>
                        <?php foreach($specialitiesArray as $key => $value){ ?>
                        <option value="<?= $value['medicalspecialities_id'] ?>" <?= $value['medicalspecialities_id'] == $infodoctors[0]['medicalspecialities_id'] ?  'selected': '' ?> ><?= $value['medicalspecialities_name']?></option>
                        <?php } ?>
                    </select>
                    
                
            </div>


            <div class="row justify-content-center m-0 p-0">
                <div class="col-lg-3  m-4">
                    <input type="hidden" name="doctorsId" value="<?= $infodoctors[0]['doctors_id']?>">
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