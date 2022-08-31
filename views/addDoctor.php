<?php
session_start();
require_once '../controllers/controller-adddoctor.php';
include('templates/header.php');
?>



<a href="dashboard.php">Retour</a>
<p class="fs-2 text-center m-5">NOUVEAU DOCTEUR</p>



<form action="#" method="POST" novalidate>
    <div class="row justify-content-center m-0 p-0 ">
        <div class="col-lg-6">
            <div class="row justify-content-center m-0 p-0 pt-2 rounded roundColor">
                <div class="col-lg-5 p-1 rounded">
                    <label for="firstname">Nom</label><span class="ms-2 text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?>
                    </span>
                    <input id="firstname" name="firstname" class="tailleInput " type="text" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">

                    <label for="lastname" class="mt-2">Prénom</label><span class="ms-2 text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                    <input id="lastname" name="lastname" class="tailleInput" type="text" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">



                    <label for="mobile">Numéro</label><span class="ms-2 text-danger"><?= isset($errors['mobile']) ? $errors['mobile'] : '' ?></span>
                    <input id="mobile" name="mobile" class="tailleInput" type="tel" value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>">

                    <label for="mail" class="mt-2">Email</label><span class="ms-2 text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                    <input name="mail" id="mail" class="tailleInput" type="email" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">

                    <label for="password" class="">Mot de passe</label><span class="ms-2 text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                    <input id="password" name="password" class="tailleInput" type="text" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">

                    <label for="confirmPassword" class="">Confirme le mot de passe</label><span class="ms-2 text-danger"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></span>
                    <input id="confirmPassword" name="confirmPassword" class="tailleInput" type="text" value="<?= isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '' ?>">


                    <label for="select" class="mt-3" for="select">Domaine</label><span class="ms-2 text-danger"><?= isset($errors['select']) ? $errors['select'] : '' ?></span>
                    <br>
                    <select class="mt-3" name="select" id="select">
                        <option value="">-- Choix --</option>
                        <?php foreach($specialitiesArray as $key => $value){ ?>
                        <option value="<?= $value['medicalspecialities_id'] ?>"><?= $value['medicalspecialities_name']?></option>
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