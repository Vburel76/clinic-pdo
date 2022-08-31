<?php
session_start();
require_once('../controllers/controller-table-list.php');
?>
<?php include('templates/header.php'); ?>
<a href="dashboard.php">Retour</a>

<p class="fs-2 text-center m-5">LISTE DE PATIENTS</p>

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
                    <th scope="col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patients as $value) { ?>
                    <tr>
                        <th><?= $value['patients_id']?></th>
                        <td><?= $value['patients_lastname']?></td>
                        <td><?= $value['patients_firstname']?></td>
                        <td><?= $value['patients_phonenumber']?></td>
                        <td><?= $value['patients_mail']?></td>
                        <td><?= $value['patients_address']?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>