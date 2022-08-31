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
                    <th scope="col">mail</th>
                    <th scope="col">spécialitée</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($doctors as $value) { ?>
                    <tr>
                        <th><?= $value['doctors_id']?></th>
                        <td><?= $value['doctors_name']?></td>
                        <td><?= $value['doctors_lastname']?></td>
                        <td><?= $value['doctors_phonenumber']?></td>
                        <td><?= $value['doctors_mail']?></td>
                        <td><?= $value['medicalspecialities_name']?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>