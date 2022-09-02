<?php
session_start();
require_once('../controllers/controller-doctor-list.php');
require_once('../models/medicalspecialities.php');

?>
<?php include('templates/header.php'); ?>
<a href="dashboard.php">Retour</a>

<p class="fs-2 text-center m-5">LISTE DE DOCTEUR</p>

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
                    <th scope="col">Spécialitée</th>
                    <th scope="col">Info</th>
                    <th scope="col">modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($doctors as $value) { ?>
                    <tr>
                        <th class="pt-3"><?= $value['doctors_id']?></th>
                        <td class="pt-3"><?= $value['doctors_name']?></td>
                        <td class="pt-3"><?= $value['doctors_lastname']?></td>
                        <td class="pt-3"><?= $value['doctors_phonenumber']?></td>
                        <td class="pt-3"><?= $value['doctors_mail']?></td>
                        <td class="pt-3"><?= $value['medicalspecialities_name']?></td>
                        <td><a href="info-doctor.php?doctors=<?= $value['doctors_id']?>" class="btn btn-primary">+ info</a></td>
                        <td><a href="modif-doctors-.php?doctors=<?= $value['doctors_id']?>" class="btn btn-secondary">modification</a></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>