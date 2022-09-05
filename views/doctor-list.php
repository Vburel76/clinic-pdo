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
                    <th scope="col">supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($doctors as $value) { ?>
                    <tr>
                        <th class="pt-3"><?= $value['doctors_id'] ?></th>
                        <td class="pt-3"><?= $value['doctors_name'] ?></td>
                        <td class="pt-3"><?= $value['doctors_lastname'] ?></td>
                        <td class="pt-3"><?= $value['doctors_phonenumber'] ?></td>
                        <td class="pt-3"><?= $value['doctors_mail'] ?></td>
                        <td class="pt-3"><?= $value['medicalspecialities_name'] ?></td>
                        <td><a href="info-doctor.php?doctors=<?= $value['doctors_id'] ?>" class="btn btn-primary">+ info</a></td>
                        <td><a href="modif-doctors-.php?doctors=<?= $value['doctors_id'] ?>" class="btn btn-secondary">modification</a></td>

                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#doctors-<?= $value['doctors_id'] ?>">Supprimer</button>
                        </td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <?php
        foreach ($doctors as $value) { ?>

            <!-- Modal -->
            <div class="modal fade" id="doctors-<?= $value['doctors_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimez ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non</button>
                           
                                <button type="button" class="btn btn-primary" name="delete" value="<?= $value['doctors_id'] ?>" onclick="document.location='doctor-list.php?doctors_id=<?= $value['doctors_id'] ?>&doctor_mail=<?= $value['doctors_mail']?>'">oui</button>
                           

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>



<?php
include('templates/footer.php');
?>