<?php
session_start();
require_once '../controllers/controller-meeting.php';
include('templates/header.php');
?>



<a href="dashboard.php">Retour</a>
<p class="fs-2 text-center m-5">NOUVEAU RENDEZ VOUS</p>



<form action="#" method="POST" novalidate>
    <div class="row justify-content-center m-0 p-0 ">
        <div class="col-lg-6">
            <div class="row justify-content-center m-0 p-0 pt-2 rounded roundColor">
                <div class="col-lg-5 p-1 rounded">
                    <label for="myDate">Date</label><span class="ms-2 text-danger"><?= isset($errors['myDate']) ? $errors['myDate'] : '' ?>
                    </span>
                    <input id="myDate" name="myDate" class="tailleInput " type="date" value="<?= isset($_POST['myDate']) ? $_POST['myDate'] : '' ?>">

                    <label for="myHour" class="mt-2">heure</label><span class="ms-2 text-danger"><?= isset($errors['myHour']) ? $errors['myHour'] : '' ?></span>
                    <input id="myHour" name="myHour" class="tailleInput" type="time" value="<?= isset($_POST['myHour']) ? $_POST['myHour'] : '' ?>">



                    <label for="motif">motif</label><span class="ms-2 text-danger"><?= isset($errors['motif']) ? $errors['motif'] : '' ?></span>
                    <input id="motif" name="motif" class="tailleInput" type="text" value="<?= isset($_POST['motif']) ? $_POST['motif'] : '' ?>">


                    <label class="mt-3" for="myPatient">Patient:</label>
                    <br>
                    <select class="selectPatient" name="selectPatient" id="selectPatient">
                        <option value="">--Choix du patient--</option>
                        <?php foreach ($patientsArray as $key => $value) { ?>
                            <option value="<?= $value['patients_id'] ?>"><?= $value['patients_lastname'] ?></option>
                        <?php } ?>
                    </select>

                    <label class="mt-3" for="">Docteur:</label>
                    <br>
                    <select class="selectPatient" name="selectDocteur" id="selectDocteur">
                        <option class="" value="">--Choix du Docteur--</option>
                        <?php foreach ($doctorsArray as $key => $value) { ?>
                            <option value="<?= $value['doctors_id'] ?>"><?= $value['doctors_name'] ?></option>
                        <?php } ?>
                    </select>

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