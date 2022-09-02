<?php
session_start();

require_once('../controllers/controller-info-doctor.php');
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/doctor.php';
?>
<?php include('templates/header.php'); ?>

<a href="doctor-list.php">Retour</a>

<p class="fs-2 text-center m-5">INFO SUR DOCTEUR</p>

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
                    <th scope="col">spécialitée</th>

                </tr>
            </thead>
            <tbody class="p-5">
                <?php
                foreach ($doctor as $value) { ?>
                    <tr>
                        <th class="pt-3"><?= $value['doctors_id'] ?></th>
                        <td class="pt-3"><?= $value['doctors_name'] ?></td>
                        <td class="pt-3"><?= $value['doctors_lastname'] ?></td>
                        <td class="pt-3"><?= $value['doctors_phonenumber'] ?></td>
                        <td class="pt-3"><?= $value['doctors_mail'] ?></td>
                        <td class="pt-3"><?= $value['medicalspecialities_name'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>