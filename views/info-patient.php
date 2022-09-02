<?php
session_start();

require_once('../controllers/controller-info-patient.php');
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';
?>
<?php include('templates/header.php'); ?>

<a href="table-list.php">Retour</a>

<p class="fs-2 text-center m-5">Nom du patient</p>

<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 text-center">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Adresse</th>

                </tr>
            </thead>
            <tbody class="p-5">
                <?php
                foreach ($patient as $value) { ?>
                    <tr>
                        <th class="pt-3"><?= $value['patients_id'] ?></th>
                        <td class="pt-3"><?= $value['patients_lastname'] ?></td>
                        <td class="pt-3"><?= $value['patients_firstname'] ?></td>
                        <td class="pt-3"><?= $value['patients_phonenumber'] ?></td>
                        <td class="pt-3"><?= $value['patients_mail'] ?></td>
                        <td class="pt-3"><?= $value['patients_address'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>