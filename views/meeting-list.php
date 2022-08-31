<?php
session_start();
require_once('../controllers/controller-meeting-list.php');
// require_once('../models/medicalspecialities.php');

?>

<?php include('templates/header.php'); ?>
<a href="dashboard.php">Retour</a>

<p class="fs-2 text-center m-5">LISTE DES RENDEZ VOUS </p>

<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 text-center">

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                    <th scope="col">date</th>
                    <th scope="col">heure</th>
                    <th scope="col">description</th>
                    <th scope="col">nom du patient</th>
                    <th scope="col">docteur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consult as $value) { ?>
                    <tr>
                        <th><?= $value['rendezvous_id']?></th>
                        <td><?= $value['rendezvous_date']?></td>
                        <td><?= $value['rendezvous_hour']?></td>
                        <td><?= $value['rendezvous_description']?></td>
                        <td><?= $value['patients_lastname']?></td>
                        <td><?= $value['doctors_name']?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>



<?php
include('templates/footer.php');
?>